<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 11/08/2017
 * Time: 13:11
 */

namespace m2i\Framework;


class ServiceContainer
{
    /**
     * @var array
     */
    private static $container = [];

    /**
     * @param $key
     */
    public static function get($key) {
        if (isset(self::$container[$key])) {
            $callable = self::$container[$key];
            $callable();
        }
    }

    /**
     * @param string $key
     * @param callable $factory
     */
    public static function add(string $key, callable $factory) {
        self::$container[$key] = $factory;
    }
}