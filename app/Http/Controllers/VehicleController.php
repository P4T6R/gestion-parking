<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\User;

class VehicleController extends Controller
{

    public function index()
    {
       return view('vehicles.index',
       ['vehicles' =>
       Vehicle::with(['customer:id,name', 'user:id,name', 'category:id,name'])->get()]);
    }

    public function create()
    {
        return view('vehicles.create', ['categories' => Category::get(['id','name']),
        'customers' => Customer::get(['id','name'])]);
    }

    public function store(StoreVehicleRequest $request)
    {
      try {
        Vehicle::updateOrCreate(['id' => $request->vehicle_id], $request->except('vehicle_id', 'status') + ['status' => 0]);
        return redirect()->route('vehicles.index')->with('success',  $request->vehicle_id ? 'Vehicle Updated Successfully!!' : 'Engin crée avec succès!!');
      } catch (\Throwable $th) {
        return redirect()->route('vehicles.create')->with('erreur', 'Engin  ne peut pas être créé, veuillez vérifier les entrées !!!');
      }
    }

    public function show()
      {
         // Assurez-vous que la méthode with() charge la relation correcte.
        // Par exemple, si votre modèle User a une relation 'vehicleOut' qui peut être chargée.
        $users = User::with('vehicleOut.vehicleIn.vehicle')->get();

        return view('admins.table', compact('users'));
      }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'), ['categories' => Category::get(['id','name']),
        'customers' => Customer::get(['id','name'])]);
    }

    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        // Ajout des champs debut_abonnement et fin_abonnement
        $data = $request->all();
        $data['debut_abonnement'] = $request->input('debut_abonnement');
        $data['fin_abonnement'] = $request->input('fin_abonnement');

        $vehicle->update($data);

        return redirect()->route('vehiclesIn.index')->with('succès', 'Engin mise à jour avec succès!!');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('succès', 'Engin supprimé avec succès!!');
    }
    
    public function table($vehicleInId = null)
    {
        if ($vehicleInId) {
            $vehicleIn = \App\Models\VehicleIn::with('vehicle')->findOrFail($vehicleInId);
            return view('vehicles_in.table', compact('vehicleIn'));
        }
        
        // If no ID is provided, return all vehicle ins
        $vehiclesIn = \App\Models\VehicleIn::with('vehicle')->get();
        return view('vehicles_in.table', compact('vehiclesIn'));
    }
}
