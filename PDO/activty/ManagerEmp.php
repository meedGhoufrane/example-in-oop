<?php

require "Employee.php";
class ManagerEmp extends Employee{
    private $annual_bonus;
    // const SALARY_FRO_HOUR=150;
    public function __construct($id, $name, $base_salary, $annual_bonus){
        parent::__construct($id, $name,$base_salary);
        $this->annual_bonus = $annual_bonus;
}
public function calcMensualSalary(){
  if($this->annual_bonus > 0){
    return ($this->annual_bonus/12) + $this->base_salary; 

  }else{
    throw new Exception("invalid  !!");
  }
}
}