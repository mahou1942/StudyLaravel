<?php

class Dog{
    public $age; // 年齡
    // 規定建立類別一定要給年齡參數

    public function __construct($age){
        echo "誕生 <br />";

        $this->age = $age; // 前面是類別自身屬性，後方式建立物件傳入值
    }

    public function sayAge(){
        echo "我的年齡 {$this->age} 歲";
    }

    public function __destruct(){
        echo "<br /> PHP程式執行結束Dog class 關閉";
    }

}

$myDog = new Dog(1);

$myDog->sayAge();
