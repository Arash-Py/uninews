<?php

namespace App\Services\Api\V1;

use App\Models\CarFinance;
use App\Models\Config;
use App\Models\Notification as NotificationModel;
use App\Models\Park;
use App\Notifications\RequestWatchmanNotification;
use App\Services\Service;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ParkService extends Service
{
    public function model()
    {
         $this->model = Park::class;
    }

    public function calculatePrice(?Park $park)
    {
        if (!$park) {
            $price = 0;
            $parkTime = 0;
            return [
                'price' => $price,
                'parkTime' => $parkTime
            ];
        }

        $last_free_park = $park->car()->select('id', 'last_free_park')->first()->last_free_park;
        $calculationData = $this->getCalculationData();
        $startTime = Carbon::parse($park->start);
        $parkTime = Carbon::now()->diffInMinutes($startTime);
        $totalHours = (int)ceil($parkTime / 60);
        if (Carbon::now()->diffInDays($last_free_park) > 0 || is_null($last_free_park)) {
            if ($parkTime < $calculationData->free_park_time->minute) {
                return [
                    'price' => 0,
                    'parkTime' => $parkTime
                ];
            }
        }
        $price = $totalHours == 0 ? 0 : (($totalHours - 1) * $calculationData->park_per_hour_price->price + $calculationData->park_first_hour_price->price);

        return [
            'price' => $price,
            'parkTime' => $parkTime
        ];
    }

    private function getCalculationData()
    {
        $calculationData = Redis::get('park_price_calculate_data');
        if (is_null($calculationData)) {
            $calculationData = Config::select('value', 'name')->whereIn('name', ['park_first_hour_price', 'park_per_hour_price', 'free_park_time'])
                ->pluck('value', 'name')
                ->map(function ($value) {
                    return json_decode($value);
                });
            Redis::set('park_price_calculate_data', json_encode($calculationData));
        }
        return json_decode($calculationData);
    }

    public function endPark(Park $park){
        $watchman_id = Auth::guard('watchman')->check() ? Auth::user()->id : null ;
        $park->update([
            'status' => 'done',
            'price' => $this->calculatePrice($park)['price'],
            'stop' => now()
        ]);
        $park->place->update(['status' => 'available']);
        NotificationModel::where(['type' => RequestWatchmanNotification::class, 'data->place_id' => $park->place->id])->delete();

        CarFinance::create([
            'car_id' => $park->car->id,
            'type' => -1,
            'amount' => $this->calculatePrice($park)['price'],
            'pay_id' => NULL,
            'watchman_id' => $watchman_id
        ]);
    }
}
