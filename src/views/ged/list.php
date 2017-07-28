<ul>
    <?php foreach ($documentList as $document) :?>
    <li>
<!--        <a href="get-download.php?fileName=--><?//=$document['file'];?><!--">-->
        <a href="uploadedDocs/<?=$document['file'];?>" download>
            <?=$document['title'];?>
        </a>
    </li>
    <?php endforeach;?>
</ul>