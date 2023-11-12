<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\ParkStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'national_code',
        'password',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function parks(): HasMany
    {
        return $this->hasMany(Park::class);
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function scopeFindByPhone($query, $phone)
    {
        return $query->where('phone', $phone)->get();
    }

    public function CheckUserId($id): bool
    {
        return $this->id == $id;
    }


    public function points(): MorphMany
    {
        return $this->morphMany(Point::class, 'pointable');
    }

    public function lastParks(): HasManyThrough
    {
        return $this->hasManyThrough(Park::class, Car::class)
            ->where('status', ParkStatus::done)
            ->orderByDesc('id')
            ->take(3);
    }

    public function PaymentHistories(): HasManyThrough
    {
        return $this->hasManyThrough(CarFinance::class, Car::class);
    }

    public function getBalance()
    {
        return $this->cars()->select('id', 'user_id', 'balance')->where('balance', '<', 0)->sum('balance');
    }

    public function tickets(): MorphMany
    {
        return $this->morphMany(Ticket::class,'ticketable');
    }

}
