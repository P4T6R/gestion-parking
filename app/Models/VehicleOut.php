<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\VehiclesOut;

class VehicleOut extends Model
{
    use HasFactory;

    protected $fillable = ['vehicleIn_id','created_by'];
    

    public function vehicleIn()
    {
        return $this->belongsTo(VehicleIn::class,'vehicleIn_id');
    }

    public function index()
    {
        $vehiclesOut = VehicleOut::with(['vehicleIn.vehicle', 'user'])->get();

        return view('vehicles_out.index', compact('vehiclesOut'));
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
