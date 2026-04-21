<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Carbon\Carbon;


class Admin extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'surname',
        'phone',
        'photo',
        'gender',
        'email',
        'password',
        'status',
        'last_activity'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function getData(Request $request)
    {
        $query = static::query();

        if ($request->role) {
            $query = $query->role($request->role);
        }

        return $query->paginate(20)->withQueryString();
    }

    public function getOnlineAttribute()
    {
        return $this->last_activity ? Carbon::parse($this->last_activity)->timezone('Asia/Baku')->translatedFormat('F j, Y H:i') : '';
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->surname;
    }

    public function getRoleNameAttribute()
    {
        return $this->roles->first()?->name;
    }

    public function getStatusTitleAttribute()
    {
        return $this->status ? __('admin.text_active') : __('admin.text_passive');
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('super-admin');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logFillable();
    }
}
