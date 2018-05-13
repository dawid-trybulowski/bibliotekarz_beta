<?php

namespace App\Http\Entities;

class ReservationEntity
{
private $id;

private $bookId;

private $userId;

private $itemId;

private $borrowId;

private $reservationDateStart;

private $reservationDateEnd;

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
    public function getBorrowId()
    {
        return $this->borrowId;
    }

    /**
     * @param mixed $borrowId
     */
    public function setBorrowId($borrowId)
    {
        $this->borrowId = $borrowId;
    }

    /**
     * @return mixed
     */
    public function getReservationDateStart()
    {
        return $this->reservationDateStart;
    }

    /**
     * @param mixed $reservationDateStart
     */
    public function setReservationDateStart($reservationDateStart)
    {
        $this->reservationDateStart = $reservationDateStart;
    }

    /**
     * @return mixed
     */
    public function getReservationDateEnd()
    {
        return $this->reservationDateEnd;
    }

    /**
     * @param mixed $reservationDateEnd
     */
    public function setReservationDateEnd($reservationDateEnd)
    {
        $this->reservationDateEnd = $reservationDateEnd;
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
}