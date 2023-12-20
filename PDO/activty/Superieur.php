<?php

require "Employee.php";

class Superieur extends Employee{

    public function __construct($id, $name, $base_salary){
        parent::__construct($id, $name,$base_salary);
    }

    public function calcMensualSalary(){

        return $this->base_salary/12;
        
    }
}



