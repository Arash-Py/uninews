<?php

namespace App\Models;

use App\Traits\HasScopeWatcher;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Activitylog\LogOptions;
use App\Enums\Web\Admin\AdminStatus;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable implements HasMedia
{
    use HasFactory, SoftDeletes, Notifiable, InteractsWithMedia ;
    //  HasScopeWatcher , LogsActivity;

    protected $guard = "admin";

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'phone',
        'national_code',
        'status',
        'role_id',
    ];

    protected $appends = [
        'full_name',
        'avatar'
    ];

    protected $hidden = [
        'password',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }


    public function getAvatarAttribute()
    {
        if ($this->hasMedia('avatars')) {
            $media = $this->getMedia('avatars');
            $last = $media->last();
            $last = $media->last();
            return $last->getFullUrl();
        } else {
            return 'https://ui-avatars.com/api/?name=' . urlencode($this->full_name) . '&color=7F9CF5&background=EBF4FF';
        }
    }

    protected $casts = [
        'status' => AdminStatus::class
    ];

    // public function role()
    // {
    //     return $this->belongsTo(Role::class, 'role_id');
    // }

    // public function abilities()
    // {
    //     return $this->role->permissions->flatten()->pluck('en_name')->unique();
    // }

    // public function assignRole($role)
    // {
    //     if (is_string($role)) {
    //         $role = Role::where('name', $role)->first()->id;
    //     }
    //     if (!$this->roles()->where('id', $role)->exists()) {
    //         $this->roles()->attach($role);
    //     } else {
    //         $this->roles()->detach($role);
    //     }
    // }

    // public function tapActivity(Activity $activity, string $eventName)
    // {
    //     $activity->event_type = $eventName;
    // }

    // public function getDescriptionForEvent(string $eventName): string
    // {
    //     switch ($eventName) {
    //         case 'created':
    //             $text = 'ایجاد شد';
    //             break;
    //         case 'updated':
    //             $text = 'ویرایش شد';
    //             break;
    //         case 'deleted':
    //             $text = 'حذف شد';
    //             break;
    //         default:
    //             $text = '';
    //             break;
    //     }
    //     return "یک ادمین توسط :causer.full_name {$text}" ;
    // }

    // public function getActivitylogOptions(): LogOptions
    // {
    //     return LogOptions::defaults();
    // }
}
