<table id="data_table" class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Reg #</th>
            <th>Nom du Véhicule</th>
            <th>Aire de stationnement</th>
            <th>Numéro de stationnement</th>
            <th>Créer le</th>
            <th>Créer par</th>
            <th class="nosort">Opération</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vehiclesOut as $key => $vehicleOut)
        <tr>
            <td>{{ $key + 1 }}</td>
            @php
$vehicleIn = $vehicleOut->vehicleIn;
            @endphp
            <td>{{ $vehicleIn->vehicle->registration_number ?? 'N/A' }}</td>

            <td>{{$vehicleIn->vehicle->name}}</td>
            <td>{{ $vehicleOut->vehicleIn->parking_area  }}</td>
            <td>{{$vehicleOut->vehicleIn->parking_number ?? 'N/A' }}</td>
            <td>{{ $vehicleOut->created_at->format('Y/m/d H:i A') }}</td>
            <td>{{ $vehicleOut->user->name ?? 'N/A' }}</td>
            <td>
                <div class="table-actions">
                    <a href="#"><i class="ik ik-eye"></i></a>
                    <a href="{{ route('vehiclesOut.edit', $vehicleOut->id) }}"><i class="ik ik-edit-2"></i></a>
                    <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this?')) { document.getElementById('delete-data-{{ $vehicleOut->id }}').submit(); }"><i class="ik ik-trash-2"></i></a>

                    <form id="delete-data-{{ $vehicleOut->id }}" action="{{ route('vehiclesOut.destroy', $vehicleOut->id) }}" method="POST" style="display: none;">
                        @method('DELETE')
                        @csrf
                    </form>
                </div>
            </td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>