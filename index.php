<?php

declare(strict_types=1);
class Currency
{
    private $isoCode;


    public function __construct($isoCode)
    {

        $number = 3;
        if (mb_strlen($isoCode) != $number ){
            throw new InvalidArgumentException($isoCode);
        }
        if (mb_strlen($isoCode) == $number){
            return mb_strtoupper($isoCode);
        }
        $this->isoCode = $isoCode;
    }


    public function getIsoCode()
    {
        return $this->isoCode;
    }


    public function setIsoCode($IsoCode)
    {
        $this->isoCode = $IsoCode;
    }
    //реализовать публичный метод equals
    public function equals (Currency $currency){
        return $this->isoCode == $currency->getIsoCode();
    }

}
$code = new Currency('uah');
$code1 = new Currency('uah');
$code2 = $code->equals($code1);
var_dump($code2);

class Money
{
    private $amount;
    private $currency;


    public function __construct($amount, $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function getAmount()
    {
        return $this->amount;
    }


    public function setAmount($amount)
    {
        if(!is_int($amount) || !is_float($amount) ){
            throw new InvalidArgumentException($amount);
        }
        $this->amount = $amount;
    }


    public function getCurrency()
    {
        return $this->currency;
    }


    public function setCurrency($currency)
    {
        $number = 3;
        if (mb_strlen($currency) != $number ){
            throw new InvalidArgumentException($currency);
        }
        if (mb_strlen($currency) == $number){
            return mb_strtoupper($currency);
        }
        $this->currency = $currency;
    }
    //для сравнения двух валют
    public function equals(Money $money){
        return   $this->amount == $money->getAmount() && $this->currency == $money->getCurrency();
    }
    // метод add для суммирования денежных едениц которые принимают обьект money
    public function add($money){
        if (  $this->currency == $money->getCurrency()){
            return    $this->amount +  $money->getAmount();
        }if ( $this->currency != $money->getCurrency()){
            throw new InvalidArgumentException($money);
        }
    }
}
$index = new Money( 300, 'uah');
$index1 = new Money( 300, 'uah');
$index2 = $index->add($index1);
var_dump($index2);