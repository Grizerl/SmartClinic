<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * Summary of appointment
     * @return HasMany<Appointment, User>
     */
    public function appointment(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Summary of medical_record
     * @return HasMany<MedicalRecord, User>
     */
    public function medical_record(): HasMany
    {
        return $this->hasMany(MedicalRecord::class);
    }
}
