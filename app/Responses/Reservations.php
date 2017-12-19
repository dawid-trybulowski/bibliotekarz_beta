<?php
/**
 * Created by PhpStorm.
 * User: Dawid
 * Date: 03.12.2017
 * Time: 10:01
 */

namespace App\Responses;


class Reservations
{
    private $id;

    private $bookId;

    private $userId;

    private $reservationDateStart;

    private $reservationDateEnd;

    private $status;

    private $title;

    private $author;

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
     * @param mixed $itemId
     */
    public function setItemId($bookId)
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
    public function getReservationDateStart()
    {
        return $this->reservationDateStart;
    }

    /**
     * @param mixed $reservationDateStart
     * @return reservation
     */
    public function setReservationDateStart($reservationDateStart)
    {
        $this->reservationDateStart = $reservationDateStart;
        return $this;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }
}