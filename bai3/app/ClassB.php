<?php
namespace App;
class ClassB implements InterfaceModel {
    public function say()
    {
        echo "<br> No nang kg";
    }
    public function eat($name){
        echo "<br> Ban vua them 1 con $name vao";
    }
    public function run($kmh){
        echo "<br> Ban vua tao thuoc tinh chay $kmh";
    }
}

