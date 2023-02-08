<?php
namespace App;

class ClassA implements InterfaceModel {
    public function say()
    {
        echo "<br> Hien thi thong tin con vat";
    }
    public function eat($name){
        echo "<br> Ban vua them 1 con $name vao";
    }
    public function run($kmh){
        echo "<br> Ban vua tao thuoc tinh chay $kmh";
    }
}
