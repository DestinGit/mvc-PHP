<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 09/08/2017
 * Time: 13:06
 */
namespace m2i\Framework;

interface IRouter
{
    /**
     * @return string
     */
    public function getControllerName(): string;

    /**
     * @return string
     */
    public function getActionName(): string;

    /**
     * @return array
     */
    public function getActionParameters(): array;
}