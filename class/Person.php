<?php

// namespace Person;
class Person{
    private string $name;
    private string $cin;

    private string $email;

    private string $phone;
    public function __construct(string $name, string $cin, string $email, string $phone){
        $this->name = $name;
        $this->cin = $cin;
        $this->email = $email;
        $this->phone = $phone;
    }
    public function getName(): string{
        return $this->name;
    }
    public function setName( string $name){  
         $this->validation_Name($name);  
         $this->name=$name;      
    }
    public function getCin(): string{
        return $this->cin;
    }
    public function setcin( string $cin){    
        $this->cin=$cin;
   }
    public function getEmail(): string{
        return $this->email;
    }
    public function setEmail( string $Email){    
        $this->email=$Email;
   }
    public function getPhone(): string{
        return $this->phone;
    }
    public function setphone( string $phone){    
        $this->phone=$phone;
   }
   


   private function validation_Name(string $name):void{
        if(empty(Person::validation_input($name)) || !preg_match($name,"/[A-Za-z]/")){
             throw new  InvalidArgumentException("name is required !!");
        }
    }
   private function validation_cin(string $cin):void{
        if(empty(Person::validation_input($cin)) || !preg_match($cin,"/[A-Za-z]/")){
             throw new  InvalidArgumentException("name is required !!");
        }
    }
   private function validation_email(string $email):void{
        if(empty(Person::validation_input($email)) || !preg_match($email,"/[A-Za-z]/")){
             throw new  InvalidArgumentException("name is required !!");
        }
    }
   private function validation_phone(string $phone):void{
    if(empty(Person::validation_input($phone)) || !preg_match($phone,"")){
        throw new InvalidArgumentException("");
    }
    
    
   }
    private function validation_input(string $data):string {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
}


