<?php
function index() {
    echo getRenderedView('indexDebut', []);
}

function hello($name, $age) {
    echo getRenderedView('home/hello', array(
        'name' => $name,
        'age' => $age
    ));
}