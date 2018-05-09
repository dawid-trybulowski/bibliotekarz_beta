<?php

namespace App\Http\Entities;

class BorrowEntity
{
    private $id;

    private $bookId;

    private $userId;

    private $itemId;

    private $borrowDateStart;

    private $borrowDateEnd;

    private $reservationId;

    private $delay;

    private $delayCost;

    private $status;

    private $createdAt;

    private $updatedAt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * @param mixed $bookId
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @param mixed $itemId
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
    }

    /**
     * @return mixed
     */
    public function getReservationId()
    {
        return $this->reservationId;
    }

    /**
     * @param mixed $reservationId
     */
    public function setReservationId($reservationId)
    {
        $this->reservationId = $reservationId;
    }

    /**
     * @return mixed
     */
    public function getDelay()
    {
        return $this->delay;
    }

    /**
     * @param mixed $delay
     */
    public function setDelay($delay)
    {
        $this->delay = $delay;
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

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getBorrowDateStart()
    {
        return $this->borrowDateStart;
    }

    /**
     * @param mixed $borrowDateStart
     */
    public function setBorrowDateStart($borrowDateStart)
    {
        $this->borrowDateStart = $borrowDateStart;
    }

    /**
     * @return mixed
     */
    public function getBorrowDateEnd()
    {
        return $this->borrowDateEnd;
    }

    /**
     * @param mixed $borrowDateEnd
     */
    public function setBorrowDateEnd($borrowDateEnd)
    {
        $this->borrowDateEnd = $borrowDateEnd;
    }

}