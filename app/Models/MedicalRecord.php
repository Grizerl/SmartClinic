<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalRecord extends Model
{
    protected $table = "medical_records";
    protected $fillable = [
        'user_id',
        'doctor_id',
        'description'
    ];

    /**
     * Summary of user
     * @return BelongsTo<User, MedicalRecord>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Summary of doctor
     * @return BelongsTo<Doctor, MedicalRecord>
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
}
