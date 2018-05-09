<?php

namespace App\Http\Entities;

class PaymentsSettingsEntity
{
    private $paymentData;
    private $przelewy24Status;
    private $przelewy24Config;
    private $cargeFee;
    private $delayCost;

    /**
     * @return mixed
     */
    public function getPaymentData()
    {
        return $this->paymentData;
    }

    /**
     * @param mixed $paymentData
     */
    public function setPaymentData($paymentData)
    {
        $this->paymentData = $paymentData;
    }

    /**
     * @return mixed
     */
    public function getPrzelewy24Status()
    {
        return $this->przelewy24Status;
    }

    /**
     * @param mixed $przelewy24Status
     */
    public function setPrzelewy24Status($przelewy24Status)
    {
        $this->przelewy24Status = $przelewy24Status;
    }

    /**
     * @return mixed
     */
    public function getPrzelewy24Config()
    {
        return $this->przelewy24Config;
    }

    /**
     * @param mixed $przelewy24Config
     */
    public function setPrzelewy24Config($przelewy24Config)
    {
        $this->przelewy24Config = $przelewy24Config;
    }

    /**
     * @return mixed
     */
    public function getCargeFee()
    {
        return $this->cargeFee;
    }

    /**
     * @param mixed $cargeFee
     */
    public function setCargeFee($cargeFee)
    {
        $this->cargeFee = $cargeFee;
    }

    /**
     * @return mixed
     */
    public function getDelayCost()
    {
        return $this->delayCost;
    }

    /**
     * @param mixed $delayCost
     */
    public function setDelayCost($delayCost)
    {
        $this->delayCost = $delayCost;
    }
}