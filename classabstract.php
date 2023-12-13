<?php

abstract class Hayawan {
    protected $name;
    protected $age;

    public function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public abstract function eat(): int;
    public abstract function sleep(): string;
}

class horse extends Hayawan {


    public function eat(): int{
        return 7;
    }

    public function sleep(): string{
        return "";
    }

}


$monkey = new horse('horse', 15);

echo  $monkey->getName();