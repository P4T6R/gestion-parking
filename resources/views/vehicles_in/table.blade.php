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
        @foreach ($vehiclesIn as $key => $vehicleIn)
        <tr>
        <td>{{ $key + 1 }}</td>
    <td>{{ optional($vehicleIn->vehicle)->registration_number }}</td> <!-- Utilisation de la fonction optional() -->
    <td>{{ optional($vehicleIn->vehicle)->name }}</td>
    <td>{{ $vehicleIn->parking_area }}</td>
    <td>{{ $vehicleIn->parking_number }}</td>
    <td>{{ $vehicleIn->created_at->format('Y/m/d H:i A') }}</td>
    <td>{{ optional($vehicleIn->user)->name }}</td> <!-- Utilisation de la fonction optional() -->
            <td>
                <div class="table-actions">
                    <a href="#"><i class="ik ik-eye"></i></a>
                    <a href="{{ route('vehiclesIn.edit', $vehicleIn->id) }}"><i class="ik ik-edit-2"></i></a>
                    <a href="#" onclick=" confirm('Are you sure you want to delete this?');
                    document.getElementById('delete-data').submit();"><i class="ik ik-trash-2"></i></a>

                     <form id="delete-data" action="{{ route('vehiclesIn.destroy', $vehicleIn->id) }}" method="POST" class="d-none">
                        @method('Delete')
                        @csrf
                    </form>
                </div>
            </td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
