<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Appointment extends Model
{
    protected $table = "appointments";
    protected $fillable = [
        'user_id',
        'doctor_id',
        'status'
    ];

    /**
     * Summary of user
     * @return BelongsTo<User, Appointment>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Summary of doctor
     * @return BelongsTo<Doctor, Appointment>
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Summary of appointment
     * @return HasMany<Service, Appointment>
     */
    public function appointment(): HasMany
    {
        return $this->hasMany(Service::class);
    }

}
