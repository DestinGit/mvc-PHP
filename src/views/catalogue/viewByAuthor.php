<table class="table table-bordered table-hover table-responsive">
    <thead>
    <tr>
        <?php if (isset($booksByAuthor[0])):?>
        <?php $cols = array_keys($booksByAuthor[0]);?>
    <tr>
        <?php foreach ($cols as $colName) :?>
            <th><?=$colName?></th>
        <?php endforeach;?>
        <th>Action</th>
    </tr>
    <?php endif;?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($booksByAuthor as $livre):?>
        <tr>
            <?php
            $id = '';
            foreach ($livre as $key => $colData) : ?>
                <?php if($key == 'id') {
                    $id = $colData;
                }
                ?>

                <td><?= $colData; ?></td>
            <?php endforeach;?>
            <td><a href="?id=<?=$id?>">X</a></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>