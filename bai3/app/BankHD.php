<?php
namespace App;

class BankHD extends BankModel{
    public const PI = 3.14;
    public static $name = 'BankHD';
    public function tranfer($money)
    {
        echo '<br>Ban vua chuyen $money thanh cong';
    }
    public function withdrawals($money)
    {
        echo '<br>Ban vua rut $money thanh cong';
    }
}

