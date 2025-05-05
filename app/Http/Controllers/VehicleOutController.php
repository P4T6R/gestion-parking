<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleOut;
use App\Http\Requests\StoreVehicleOutRequest;
use App\Http\Requests\UpdateVehicleOutRequest;
use App\Models\VehicleIn;
use Illuminate\Http\Request;

class VehicleOutController extends Controller
{

    public function index()
    {

        // $vin = VehicleOut::all();
        // foreach ($vin as $v) {
        //     dump($v->vehicleIn());
        // }
        // die;
        return view(
            'vehicles_out.index',
            ['vehiclesOut' => VehicleOut::all()]
        );
    }

    public function create()
    {
        return view('vehicles_out.create', ['vehiclesIn' =>
        VehicleIn::with('vehicle:id,name,registration_number')
            ->where('status', 0)->get(['id', 'vehicle_id'])]);
    }

    public function store(StoreVehicleOutRequest $request)
    {
        VehicleOut::updateOrCreate(['id' => $request->vehiclesOut_id], $request->all());
        VehicleIn::where('id', $request->vehicleIn_id)->update(['status' => 1]);
        return redirect()->route('vehiclesOut.index')->with('succès', 'Engin sortit avec succès!!');
    }

    public function show(VehicleOut $vehiclesOut)
    {
        return view('vehicles_out.show', compact('VehicleOut'), ['vehicles' => Vehicle::get(['id', 'name', 'registration_number'])]);
    }

    public function edit($id)
    {
        $vehiclesOut = VehicleOut::find($id);
        $vehiclesIn = VehicleIn::all(); // Assurez-vous que cette ligne récupère bien les données nécessaires

        dd($vehiclesIn);  // Ajoutez cette ligne pour déboguer

        return view('vehicles_out.fields', compact('vehiclesOut', 'vehiclesIn'));
    }

    public function update(UpdateVehicleOutRequest $request, VehicleOut $vehiclesOut)
    {
        //
    }

    public function destroy(VehicleOut $vehiclesOut)
    {
        $vehiclesOut->delete();
        return redirect()->route('vehiclesOut.index')->with('succès', 'Engin supprimé de la liste avec succès!!');
    }
}
