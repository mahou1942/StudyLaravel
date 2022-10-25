<?php

interface Age{
    public function getAge();
}

interface Foot{
    public function run();
    public function walk();
}

class Dog implements Age, Foot{
    public $age;

    public function getAge(){
        return $this->age * 7 . '<br>';
    }

    public function run()
    {
        return '我用四隻腳跑步<br>';
    }

    public function walk(){
        return '我用四隻腳走路<br>';
    }
}

$dog = new Dog();
$dog->age = 1;

echo $dog->getAge();

echo $dog->run();

echo $dog->walk();
