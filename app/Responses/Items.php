<?php
/**
 * Created by PhpStorm.
 * User: Dawid
 * Date: 21.11.2017
 * Time: 14:49
 */

namespace App\Responses;


class Items
{
    private $id;

    private $bookId;

    private $publicationYear;

    private $status;

    private $rentUser;

    private $rentEnd;

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
    public function getPublicationYear()
    {
        return $this->publicationYear;
    }

    /**
     * @param mixed $publicationYear
     */
    public function setPublicationYear($publicationYear)
    {
        $this->publicationYear = $publicationYear;
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
    public function getRentUser()
    {
        return $this->rentUser;
    }

    /**
     * @param mixed $rentUser
     */
    public function setRentUser($rentUser)
    {
        $this->rentUser = $rentUser;
    }

    /**
     * @return mixed
     */
    public function getRentEnd()
    {
        return $this->rentEnd;
    }

    /**
     * @param mixed $rentEnd
     */
    public function setRentEnd($rentEnd)
    {
        $this->rentEnd = $rentEnd;
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

}