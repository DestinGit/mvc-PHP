<!--<table class="table table-bordered table-striped table-hover">-->
<!--    <thead>-->
<!--        <tr>-->
<!--            <th>Titre</th>-->
<!--            <th>Auteur</th>-->
<!--        </tr>-->
<!--    </thead>-->
<!--    <tbody>-->
<!--        --><?php //while ($row = $resultSet->fetch(PDO::FETCH_ASSOC)) :?>
<!--            <tr>-->
<!--                <td>--><?//=$row['titre']?><!--</td>-->
<!--                <td>--><?//=$row['nom_complet']?><!--</td>-->
<!--            </tr>-->
<!--        --><?php //endwhile;?>
<!--    </tbody>-->
<!--</table>-->

<table class="table table-bordered table-hover table-responsive">
    <thead>
        <tr>
            <?php if (isset($catalogue[0])):?>
                <?php $cols = array_keys($catalogue[0]);?>
                <tr>
                    <?php foreach ($cols as $colName) :?>
                        <th><?=$colName?></th>
                    <?php endforeach;?>
                </tr>
            <?php endif;?>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($catalogue as $livre):?>
        <tr>
            <?php
            foreach ($livre as $key => $colData) : ?>
                <?php if($key == 'nom') :?>
                    <td><a href="/catalogue/par-auteur/<?=urlencode($colData)?>"><?= $colData; ?></a></td>
                <?php else:?>
                <td><?= $colData; ?></td>
                    <?php endif;?>
            <?php endforeach;?>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>