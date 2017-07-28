<?php

$routes = [
    '/' =>'home:index',
    '/ged/list' =>'ged:list',
    "/hello/(\w+)/(\d+)" => "home:hello"
];

return $routes;