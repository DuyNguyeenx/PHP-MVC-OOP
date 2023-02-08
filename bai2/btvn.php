<?php
class People
{
    protected $fullName;
    public $birthday;
    public $address;
    function __construct($fullName, $birthday, $address)
    {
        $this->fullName = $fullName;
        $this->birthday = $birthday;
        $this->address = $address;
    }

    function getInfo()
    {
        echo "Nhân Viên : {$this->fullName}  <br />
        Ngay Sinh : {$this->birthday} <br />
        Dia chi : {$this->address}". "<br />";
        
    }
}

class Employee extends People
{
    public $id;
    public $workingDays;
    public $totalLeaveTaken;
    public $dalyWage;
    function __construct($fullName, $birthday, $address, $id, $workingDays, $totalLeaveTaken, $dalyWage)
    {
        parent::__construct($fullName, $birthday, $address);
        $this->id = $id;
        $this->workingDays = $workingDays;
        $this->totalLeaveTaken = $totalLeaveTaken;
        $this->dalyWage = $dalyWage;
    }
    function getInfo1(){
        echo "Mã nhân viên:{$this->id}<Br>";
    }
    function getSalaryAmount() {
        if($this->totalLeaveTaken >= $this->workingDays){
            echo 'Bạn nghỉ nhiều hơn và bằng số buổi đi làm nên lương của bạn 0đ';
        }else{
            $totalWage =  $this->workingDays * $this->dalyWage;
        echo "Tong so luong cua Nhan vien {$this->fullName} la : " . $totalWage ."đ";
        }
    }
}
$duy = new Employee("duy","1/10/2003","Ha Noi",1,25,20,500000);
$duy->getInfo();
$duy->getInfo1();
$duy->getSalaryAmount();
