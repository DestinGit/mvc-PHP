<?php

$routes = [
    '/' =>'home:index',
    '/ged/list' =>'ged:list',
    "/hello/(\w+)/(\d+)" => "home:hello",
    "/catalogue/liste" => "catalogue:index",
    "/catalogue/par-auteur/(.+)" => "catalogue:byAuthor"
//    "/catalogue/liste/(\w+)" => "catalogue:viewByAuthor"
];

return $routes;