<form class="forms-sample" method="POST" accept="{{ route('user.store') }}">
    @csrf
    <div class="form-group">
        <label for="exampleInputName1">Nom</label>
        <input type="text" name="name" value="{{ isset($user) ? $user->name : '' }}" class="form-control" id="exampleInputName1" placeholder="Nom">
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail3">Adresse mail</label>
                <input type="email" name="email" value="{{ isset($user) ? $user->email : '' }}" class="form-control" id="exampleInputEmail3" placeholder="Email">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleSelectGender">Genre</label>
                <select class="form-control" id="exampleSelectGender">
                    <option>Homme</option>
                    <option>Femme</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword4">Mot de Passe</label>
        <input type="password" name="password" value="{{ isset($user) ? $user->password : '' }}" class="form-control" id="exampleInputPassword4" placeholder="Mot de Passe">
    </div>

    <div class="form-group">
        <label>fichier à télécharger</label>
        <input type="file" name="img[]" class="file-upload-default">
        <div class="input-group col-xs-12">
            <input type="text" class="form-control file-upload-info" disabled placeholder="mettre une image">
            <span class="input-group-append">
            <button class="file-upload-browse btn btn-primary" type="button">Télécharger</button>
            </span>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleTextarea1">Textarea</label>
        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
    </div>
    <button type="submit" class="btn btn-primary mr-2">Soumettre</button>
    <button class="btn btn-light">Retour</button>
</form>
