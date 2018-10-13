<?php
/**
 * 
 */


class Manufacturer 
{
    private $model;
    private $qty;
    public function __construct($model, $qty)
    {
        $this->model = $model;
        $this->qty   = $qty;
    }
    public function get_model()
    {
        return $this->model;
    }
    public function set_model($model)
    {
        $this->model = $model;
    }
    public function get_qty()
    {
        return $this->qty;
    }
    public function set_qty($qty)
    {
        $this->qty = $qty;
    }
}

class Model  extends Manufacturer
{
    private $manufacturer;
    public function __construct($model, $qty)
    {
        parent::__construct($model, $qty);
    }
    public function set_manufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }
    public function get_manufacturer()
    {
        return $this->manufacturer;
    }
}



$model  = new Model('Herbivore', 'Grass');

echo $model->get_manufacturer();


?>