<?php


namespace App\Http\Entities;


class GeneralSettingsEntity
{
    private $reservationTime;
    private $maxReservationCount;
    private $borrowTime;
    private $reservationWithoutVerification;
    private $libraryName;
    private $libraryPhone;
    private $libraryAddress;
    private $libraryEmail;

    /**
     * @return mixed
     */
    public function getReservationTime()
    {
        return $this->reservationTime;
    }

    /**
     * @param mixed $reservationTime
     */
    public function setReservationTime($reservationTime)
    {
        $this->reservationTime = $reservationTime;
    }

    /**
     * @return mixed
     */
    public function getMaxReservationCount()
    {
        return $this->maxReservationCount;
    }

    /**
     * @param mixed $maxReservationCount
     */
    public function setMaxReservationCount($maxReservationCount)
    {
        $this->maxReservationCount = $maxReservationCount;
    }

    /**
     * @return mixed
     */
    public function getBorrowTime()
    {
        return $this->borrowTime;
    }

    /**
     * @param mixed $borrowTime
     */
    public function setBorrowTime($borrowTime)
    {
        $this->borrowTime = $borrowTime;
    }

    /**
     * @return mixed
     */
    public function getReservationWithoutVerification()
    {
        return $this->reservationWithoutVerification;
    }

    /**
     * @param mixed $reservationWithoutVerification
     */
    public function setReservationWithoutVerification($reservationWithoutVerification)
    {
        $this->reservationWithoutVerification = $reservationWithoutVerification;
    }

    /**
     * @return mixed
     */
    public function getLibraryName()
    {
        return $this->libraryName;
    }

    /**
     * @param mixed $libraryName
     */
    public function setLibraryName($libraryName)
    {
        $this->libraryName = $libraryName;
    }

    /**
     * @return mixed
     */
    public function getLibraryPhone()
    {
        return $this->libraryPhone;
    }

    /**
     * @param mixed $libraryPhone
     */
    public function setLibraryPhone($libraryPhone)
    {
        $this->libraryPhone = $libraryPhone;
    }

    /**
     * @return mixed
     */
    public function getLibraryAddress()
    {
        return $this->libraryAddress;
    }

    /**
     * @param mixed $libraryAddress
     */
    public function setLibraryAddress($libraryAddress)
    {
        $this->libraryAddress = $libraryAddress;
    }

    /**
     * @return mixed
     */
    public function getLibraryEmail()
    {
        return $this->libraryEmail;
    }

    /**
     * @param mixed $libraryEmail
     */
    public function setLibraryEmail($libraryEmail)
    {
        $this->libraryEmail = $libraryEmail;
    }
}