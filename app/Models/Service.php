<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;
    protected $table = "services";
    protected $fillable = [
        'name',
        'description',
        'price'
    ];


    /**
     * Summary of appoinment
     * @return HasMany<Appointment, Service>
     */
    public function appoinment(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

}
