<?php
class A {
    private $countElements;
    private $sum = 0;

    public function sumNumbers ($arr)
    {
        $this->countElements = count($arr);
        if ($this->countElements > 0) {
            $this->sum = $this->sum + $arr[$this->countElements - 1];
            unset($arr[$this->countElements - 1]);
            $this->sumNumbers($arr);
        }
        return $this->sum;
    }
}

$a = new A();
echo $a->sumNumbers([1,2,50,7,9,36]);
?>