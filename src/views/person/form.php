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
    <fieldset class="form-group">
        <legend>Adresse</legend>
            <div class="form-group">
                <label for="adr1">Adresse 1</label>
                <input type="text" name="address[address_line1]" id="adr1" class="form-control">
            </div>
        <div class="form-group">
            <label for="adr2">Adresse 2</label>
            <input type="text" name="address[address_line2]" id="adr2" class="form-control">
        </div>
        <div class="form-group">
            <label for="adr3">Adresse 3</label>
            <input type="text" name="address[address_line3]" id="adr3" class="form-control">
        </div>

        <div class="form-group">
            <div class="col-md-4">
                <label for="cp">Code Postal</label>
                <input type="text" name="postalCode" id="cp" class="form-control">
            </div>
            <div class="col-md-8">
                <label for="city">Ville</label>
                <select name="city" id="city" class="form-control"></select>
            </div>
        </div>
    </fieldset>

    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary btn-block">Valider</button>
    </div>
</form>