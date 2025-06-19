<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;
    protected $table = "appointments";
    protected $fillable = [
        'user_id',
        'doctor_id',
        'service_id',
        'status',
        'created_at'
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
     * Summary of service
     * @return BelongsTo<Service, Appointment>
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

}
