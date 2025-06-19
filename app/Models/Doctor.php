<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Authenticatable
{
    use HasFactory;
    
    protected $table = "doctors";
    protected $fillable = [
        'name',
        'specialization',
        'phone',
        'email'
    ];

    /**
     * Summary of appointment
     * @return HasMany<Appointment, Doctor>
     */
    public function appointment(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Summary of medical_record
     * @return HasMany<MedicalRecord, Doctor>
     */
    public function medical_record(): HasMany
    {
        return $this->hasMany(MedicalRecord::class);
    }
}
