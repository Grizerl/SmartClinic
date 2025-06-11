<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    protected $table = "services";
    protected $fillable = [
        'appointment_id',
        'name',
        'description',
        'price'
    ];

  /**
   * Summary of appointment
   * @return BelongsTo<Appointment, Service>
   */
  public function appointment(): BelongsTo
  {
    return $this->belongsTo(Appointment::class);
  }
}
