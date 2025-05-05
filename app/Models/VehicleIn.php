<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VehicleIn extends Model
{
    use HasFactory;

    protected $fillable = ['parking_area', 'parking_number', 'vehicle_id','created_by'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public static function booted(){

        static::creating(function($model)
        {
            $model->created_by = auth()->id();
        });
    }
}
