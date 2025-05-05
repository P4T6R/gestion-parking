<form action="{{ route('vehiclesOut.store') }}" class="forms-sample" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputName1">Choisir un engin</label>
                <select name="vehicleIn_id" class="form-control">
                    <option value="">Sélectionner</option>
                    @foreach ($vehiclesIn as $vehicleIn)
                        <option value="{{ $vehicleIn->id }}" @if (isset($vehiclesOut) && optional($vehiclesOut->vehicle)->id == optional($vehicleIn->vehicle)->id)
                            selected
                        @endif>
                            {{ optional($vehicleIn->vehicle)->name .' - '. optional($vehicleIn->vehicle)->registration_number }}
                        </option>
                    @endforeach
                </select>
                @if (isset($vehiclesOut))
                    <input type="hidden" name="vehiclesOut_id" value="{{ $vehiclesOut->id }}">
                @endif
            </div>
        </div>
    </div>
        {{-- <div class="col-md-4">
            <label for="exampleInputName1">Select Parking Area</label>
            <select name="parking_area" class="form-control">
                @foreach (getParkingareas() as $parking_area)
                    <option value="{{ $parking_area }}" @if (isset($vehiclesOut))
                        {{ $vehiclesOut->parking_area == $parking_area ? 'selected' : '' }}
                @endif>
                {{ $parking_area }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail3">Parking Number</label>
                <input type="text" name="parking_number" value="{{ isset($vehiclesOut) ? $vehiclesOut->parking_number : '' }}"
                    class="form-control" id="exampleInputEmail3" placeholder="Parking Number">
            </div>
        </div> --}}
    </div>

    <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
    <button class="btn btn-light">Annuler</button>
</form>
