<?php
/**
 * Created by PhpStorm.
 * User: juan
 * Date: 1/08/18
 * Time: 19:19
 */

namespace App\Entity;


class Car
{
    protected $brand;
    protected $model;

    public function getBrand(){
        return $this->brand;
    }

    /**
     * @param mixed $car
     */
    public function setBrand($brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model): void
    {
        $this->model = $model;
    }
}