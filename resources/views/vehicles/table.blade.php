<!-- resources/views/vehicles/table.blade.php -->

<table id="data_table" class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Reg #</th>
            <th>Categorie</th>
            <th>Etudiant</th>
            <th>Nom de l'engin</th>
            <th>Numéro d'immatriculation</th>
            <th>Début Abonnement</th>
            <th>Fin Abonnement</th>
            <!--<th>Statut</th>-->
            <th>Crée le</th>
            <th class="nosort">Operation</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vehicles as $key => $vehicle)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $vehicle->registration_number }}</td>
            <td>{{ $vehicle->category ? $vehicle->category->name : 'N/A' }}</td>
            <td>{{ $vehicle->customer ? $vehicle->customer->name : 'N/A' }}</td>    
            <td>{{ $vehicle->name }}</td>
            <td>{{ $vehicle->plat_number }}</td>
            <td>{{ $vehicle->start_subscription ? \Carbon\Carbon::parse($vehicle->start_subscription)->format('d/m/Y') : 'N/A' }}</td>
            <td>{{ $vehicle->end_subscription ? \Carbon\Carbon::parse($vehicle->end_subscription)->format('d/m/Y') : 'N/A' }}</td>
            <!--<td>{{ $vehicle->status == 1 ? "Active" : "InActive" }}</td>-->
            <td>{{ $vehicle->created_at->format('d/m/Y') }}</td>
            <td>
                <div class="btn-group table-actions">
                    <a href="#" data-toggle="modal" data-target="#show{{ $key }}"><i class="ik ik-eye"></i></a>
                    <a href="{{ route('vehicles.edit', $vehicle->id) }}"><i class="ik ik-edit-2"></i></a>
                    <a href="#"  data-toggle="modal" data-target="#delete{{ $key }}"><i class="ik ik-trash-2"></i></a>
                </div>
            </td>
            <td></td>
        </tr>
        @include('vehicles.show')
        @include('vehicles.delete')
        @endforeach
    </tbody>
</table>