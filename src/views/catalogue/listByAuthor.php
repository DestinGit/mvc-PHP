<table class="table table-bordered table-hover table-responsive">
    <thead>
    <tr>
        <?php if (isset($bookList[0])):?>
        <?php $cols = array_keys($bookList[0]);?>
    <tr>
        <?php foreach ($cols as $colName) :?>
            <th><?=$colName?></th>
        <?php endforeach;?>
    </tr>
    <?php endif;?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($bookList as $livre):?>
        <tr>
            <?php
            $id = '';
            foreach ($livre as $colData) : ?>
                <td><?= $colData; ?></td>
            <?php endforeach;?>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>