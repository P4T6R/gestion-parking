<!DOCTYPE html>
<html>
<head>
    <title>Liste des véhicules</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .vehicle-list {
            max-width: 800px;
            margin: 0 auto;
            padding: 0;
            list-style: none;
        }
        .vehicle-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .vehicle-item:nth-child(odd) {
            background-color: #f9f9f9;
        }
        .vehicle-name {
            font-size: 16px;
            color: #333;
        }
        .print-link {
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }
        .print-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Liste des véhicules</h1>
    <ul class="vehicle-list">
        @foreach ($vehicles as $vehicle)
            <li class="vehicle-item">
                <span class="vehicle-name">{{ $vehicle->name }}</span>
                <a href="{{ route('reports.ticket', $vehicle->id) }}" class="print-link">Imprimer le ticket</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
