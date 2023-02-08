<?php
namespace App;
abstract class BankModel {
    abstract public function tranfer($money);
    abstract public function withdrawals($money);
}
