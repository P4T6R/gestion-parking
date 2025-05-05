<form action="{{ route('customers.store') }}" class="forms-sample" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleInputName1">Nom</label>
        <input type="text" name="name" value="{{ isset($customers) ? $customers->name : '' }}" class="form-control" id="exampleInputName1" placeholder="Nom">
        @if (isset($customers))
        <input type="hidden" name="customers_id" value="{{ $customers->id }}">
        @endif
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail3">Adresse E-mail</label>
                <input type="email" name="email" value="{{ isset($customers) ? $customers->email : '' }}" class="form-control" id="exampleInputEmail3" placeholder="Email">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail3">Numéro</label>
                <input type="tel" name="phone" value="{{ isset($customers) ? $customers->phone : '' }}" class="form-control" id="exampleInputEmail3" placeholder="Télephone">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword4">Filière</label>
        <input type="text" name="filière" value="{{ isset($customer) ? $customer->filière : '' }}" class="form-control" id="exampleInputPassword4" placeholder="filière">
    </div>

    <div class="form-group">
        <label for="exampleTextarea1">Addresse</label>
        <textarea class="form-control" name="address" id="exampleTextarea1" rows="4">{{ isset($customer) ? $customer->address : '' }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary mr-2">Soumettre</button>
    <button class="btn btn-light">Retour</button>
</form>
