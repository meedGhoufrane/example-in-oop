<?php

require "Employee.php";
class RegularEmply extends Employee{
  
  
  private $extra_hours;
  private $h_taux;
    public function __construct($id, $name, $base_salary, $h_taux,$extra_hours){
        parent::__construct($id, $name, $base_salary);
        $this->h_taux = $h_taux;
        $this->extra_hours = $extra_hours;
}
public function calcMensualSalary(){
  if($this->h_taux > 0 && $this-> extra_hours > 0){
    // return $this->h_taux * Self::SALARY_FRO_HOUR;
    $result =  $this->extra_hours *  $this->h_taux;
    return $result + $this->base_salary;

  }else{
    throw new Exception("invalid data  !!");
  }
}
}