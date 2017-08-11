<h1>Nouvelle personne</h1>
<form method="post">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="contact[name]" id="nom" class="form-control">
    </div>
    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" name="contact[firstname]" id="prenom" class="form-control">
    </div>
    <div class="form-group">
        <label for="dateNaissance">Prénom</label>
        <input type="date" name="contact[birthDate]" id="dateNaissance" class="form-control">
    </div>

    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary btn-block">Valider</button>
    </div>
</form>