<!-- resources/views/vehicles_in/fields.blade.php -->

<form action="{{ route('vehicles.store') }}" class="forms-sample" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail3">Numéro d’enregistrement</label>
                <input type="text" name="registration_number"
                    value="{{ isset($vehicle) ? $vehicle->registration_number : '' }}" class="form-control"
                    id="exampleInputEmail3" readonly placeholder="Registration Number Auto">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputName1">Categorie</label>
                <select name="category_id" class="form-control">
                    <option value="">Choisir</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (isset($vehicle) && $vehicle->category_id == $category->id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @if (isset($vehicle))
                    <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputName1">Nom du client</label>
                <select name="customer_id" class="form-control">
                    <option value="">Choisir</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" @if (isset($vehicle) && $vehicle->customer_id == $customer->id) selected @endif>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail3">Nom du véhicule</label>
                <input type="text" name="name" value="{{ isset($vehicle) ? $vehicle->name : '' }}"
                    class="form-control" id="exampleInputEmail3" placeholder="Nom du véhicule">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail3">Numéro de plaque d’immatriculation du véhicule</label>
                <input type="text" name="plat_number" value="{{ isset($vehicle) ? $vehicle->plat_number : '' }}"
                    class="form-control" id="exampleInputEmail3" placeholder="Numéro de la plaque">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail3">Durée du stationnement</label>
                <input type="number" name="duration" value="{{ isset($vehicle) ? $vehicle->duration : '' }}"
                    class="form-control" id="exampleInputEmail3" placeholder="Durée du stationnement">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail3">Frais de stationnement</label>
                <input type="number" min="1" name="packing_charge" value="{{ isset($vehicle) ? $vehicle->packing_charge : '' }}"
                    class="form-control" id="exampleInputEmail3" placeholder="Frais de stationnement">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail3">Statut du véhicule</label>
                <select name="status" class="form-control">
                    @foreach (getVehicleStatus() as $key =>  $status)
                        <option value="{{ $key }}" @if (isset($vehicle) && $vehicle->status == $key) selected @endif>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="debut_abonnement">Début Abonnement</label>
                <input type="date" name="debut_abonnement" id="debut_abonnement" class="form-control" value="{{ old('debut_abonnement', $vehicle->start_subscription ?? '') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="fin_abonnement">Fin Abonnement</label>
                <input type="date" name="fin_abonnement" id="fin_abonnement" class="form-control" value="{{ old('fin_abonnement', $vehicle->end_subscription ?? '') }}" required>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mr-2">Soumettre</button>
    <button class="btn btn-light">Retour</button>
</form>