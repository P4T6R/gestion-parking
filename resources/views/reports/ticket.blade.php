<!DOCTYPE html>
<html>
<head>
    <title>Ticket du véhicule</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        p {
            font-size: 14px;
            color: #555;
        }
        .ticket-container {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .ticket-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .ticket-details {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <div class="ticket-header">
            <h1>Ticket pour le véhicule {{ $vehicle->name }}</h1>
        </div>
        <div class="ticket-details">
            <p><strong>Numéro de plaque :</strong> {{ $vehicle->plat_number }}</p>
            <p><strong>Numéro d'enregistrement :</strong> {{ $vehicle->registration_number }}</p>
            <p><strong>Nom de l'étudiant/client :</strong> {{ $vehicle->customer->name ?? 'Non disponible' }}</p>
            <p><strong>Prix :</strong> {{ $vehicle->packing_charge ?? 'Non disponible' }} FCFA</p>
            <p><strong>Emplacement :</strong> {{ $vehicleIn->parking_number ?? 'Non disponible' }}</p>
            <p><strong>Début de l'abonnement :</strong> {{ $vehicle->start_subscription ?? 'Non disponible' }}</p>
            <p><strong>Fin de l'abonnement :</strong> {{ $vehicle->end_subscription ?? 'Non disponible' }}</p>
            <p><strong>Surface de l'aire du parking :</strong> {{ $vehicleIn->parking_area ?? 'Non disponible' }} m²</p>
        </div>
    </div>
</body>
</html>
