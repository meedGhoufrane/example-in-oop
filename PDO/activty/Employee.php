<?php 

abstract class Employee {
    protected $id;
    protected $name;
    protected $base_salary;

    public function __construct($id, $name, $base_salary) {
        $this->id = $id;
        $this->name = $name;
        $this->base_salary = $base_salary;
    }
    abstract public function calcMensualSalary();

    public function setid($id) {
        $this->id = $id;
        return $this;
    }
    public function getId() {
        return $this->id;
    }
    public function setName($name) {
        $this->name = $name;
        return $this;
    }
    public function getName() {
        return $this->name;
    }
    public function setSalary($salary) {
        $this->base_salary = $salary;
        return $this;
    }
    public function getSalary() {
        return $this->base_salary;
    }
    

    
   
    

}