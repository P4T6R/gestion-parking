<table id="data_table" class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th class="nosort">Avatar</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Créer le</th>
            <th class="nosort">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key => $user)
        <tr>
            <td>{{ $key+1 }}</td>
            <td><img src="{{ getUserAvatar($user->avatar) }}" class="table-user-thumb" alt=""></td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at->format('Y/m/d') }}</td>
            <!-- Assurez-vous que les relations sont correctement définies dans vos modèles Eloquent -->
            <td>{{ optional(optional($user->vehicleOut)->vehicleIn)->vehicle->registration_number ?? 'N/A' }}</td>
            <td>{{ optional(optional($user->vehicleOut)->vehicleIn)->vehicle->name ?? 'N/A' }}</td>
            
            <td>
                <div class="table-actions">
                    <a href="#"><i class="ik ik-eye"></i></a>
                    <a href="#"><i class="ik ik-edit-2"></i></a>
                    <a href="#" data-toggle="modal" data-target="#delete{{ $key }}"><i class="ik ik-trash-2"></i></a>
                </div>
            </td>
        </tr>
        @include('admins.delete')
        @endforeach
    </tbody>
</table>
