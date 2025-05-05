<form action="{{ route('categories.store') }}" class="forms-sample" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleInputName1">Nom</label>
        <input type="text" name="name" value="{{ isset($category) ? $category->name : '' }}" class="form-control" id="exampleInputName1" placeholder="Nom">
        @if (isset($category))
        <input type="hidden" name="category_id" value="{{ $category->id }}">
        @endif
    </div>
    <button type="submit" class="btn btn-primary mr-2">Soumettre</button>
    <button class="btn btn-light">Retour</button>
</form>
