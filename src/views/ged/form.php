<h1>Gestion Electronique des Documents (GED)</h1>
<?php if (count($errors) > 0) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $item) : ?>
                <li><?= $item; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form method="post" enctype="multipart/form-data" novalidate>
    <fieldset>
        <legend>GED</legend>
        <div class="form-group">
            <label for="title">Titre du document</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="docFile">Téléchargement du document</label>
            <input type="file" name="docFile" id="docFile" required>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Valider</button>
        </div>
    </fieldset>
</form>