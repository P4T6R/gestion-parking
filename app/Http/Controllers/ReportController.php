<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleIn;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log; // Added this line

class ReportController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all(); // Récupérer tous les véhicules
        return view('reports.index', compact('vehicles')); // Retourner la vue avec les véhicules
    }

    public function downloadTicket(Vehicle $vehicle)
    {
        // Récupérer les informations du parking pour ce véhicule
        $vehicleIn = VehicleIn::where('vehicle_id', $vehicle->id)->first();
        
        if (!$vehicleIn) {
            return redirect()->back()->with('error', 'Informations du parking non trouvées pour ce véhicule.');
        }
        
        // Logique pour générer et télécharger le ticket
        $ticketData = [
            'vehicle' => $vehicle,
            'vehicleIn' => $vehicleIn,
            'linkVehicleInData' => route('vehicleIn.table', $vehicleIn->id) // Ajout du lien pour accéder aux données de vehicleIn
            // Ajoutez d'autres données nécessaires pour le ticket
        ];

        // Vérifiez les données du véhicule pour le débogage
        Log::info($vehicle);

        // Générer le PDF ou tout autre format de ticket
        $pdf = Pdf::loadView('reports.ticket', $ticketData);
        return $pdf->download('ticket-' . $vehicle->registration_number . '.pdf');
    }

    public function show($id)
    {
        // Récupérer le véhicule
        $vehicle = Vehicle::findOrFail($id);
        
        // Récupérer les informations du parking pour ce véhicule
        $vehicleIn = VehicleIn::where('vehicle_id', $id)->first();
        
        if (!$vehicleIn) {
            return redirect()->back()->with('error', 'Informations du parking non trouvées pour ce véhicule.');
        }
        
        // Générer l'URL pour la route nommée avec le bon paramètre
        $url = route('vehicleIn.table', $vehicleIn->id);

        // Autres logiques de contrôleur
        return view('reports.show', compact('url', 'vehicle', 'vehicleIn'));
    }

    // Contrôleur pour récupérer les données et les passer à la vue
    public function showVehicleTicket($vehicleId)
    {
        // Récupérer les informations du véhicule
        $vehicle = Vehicle::find($vehicleId);
    
        // Récupérer les informations du parking pour ce véhicule
        $vehicleIn = VehicleIn::where('vehicle_id', $vehicleId)->first();
    
        // Vérifiez si les données existent
        if (!$vehicle || !$vehicleIn) {
            return redirect()->back()->with('error', 'Informations du véhicule ou du parking non trouvées.');
        }
    
        return view('reports.ticket', compact('vehicle', 'vehicleIn'));
    }

}
