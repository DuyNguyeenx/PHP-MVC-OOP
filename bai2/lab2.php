<?php
class HKBank
{
    public $soTK;
    public $tenTK;
    public $tienInTK;
    public function __construct($soTK, $tenTK, $tienInTK)
    {
        $this->soTK = $soTK;
        $this->tenTK = $tenTK;
        $this->tienInTK = $tienInTK;
        if ($soTK < 0 || !is_numeric($soTK)) {
            $this->soTK = 0;
        }
        if ($tienInTK < 0 || !is_numeric($tienInTK)) {
            $this->tienInTK = 0;
        }
    }
    public function getInfo()
    {
        echo "Tên TK: $this->tenTK<br>
              Số TK: $this->soTK<br>
              Số dư trong TK: {$this->tienInTK}đ";
    }
    public function setSo($soTK)
    {
        $this->soTK = $soTK;
    }
    public function getSo()
    {
        return $this->soTK;
    }
    public function setName($tenTK)
    {
        $this->tenTK = $tenTK;
    }
    public function getName()
    {
        return $this->tenTK;
    }
    public function setTien($tienInTK)
    {
        $this->tienInTK = $tienInTK;
    }
    public function getTien()
    {
        return $this->tienInTK;
    }

    public function napTien($tienNap)
    {
        if (!is_numeric($tienNap)) {
            echo "<br>Không phải là số.Vui lòng nhập lại số tiền cần nạp";
        } else {
            $this->tienInTK += $tienNap;
            echo "<br>Bạn đã nạp " . $tienNap . "đ vào trong tài khoản.Số dư hiện tại là {$this->tienInTK}đ";
        }
    }
    public function rutTien($tienRut)
    {
        if (!is_numeric($tienRut)) {
            echo "<br>Không phải là số.Vui lòng nhập lại số tiền cần rút";
        } elseif ($tienRut > $this->tienInTK) {
            echo '<br>Số dư tài khoản bạn không đủ.Vui lòng nhập lại số tiền cần rút';
        } else {
            $this->tienInTK -= $tienRut;
            echo "<br>Bạn vừa rút " . $tienRut . "đ trong tài khoản.Số dư còn lại là {$this->tienInTK}đ";
        }
    }
}
$hkbank = new HKBank(26660110, 'Nguyen Duy', 500);
$hkbank->getInfo();
$hkbank->napTien(500);
$hkbank->rutTien(1200);
?>