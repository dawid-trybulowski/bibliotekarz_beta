<?php


namespace App\Http\Entities;


class ViewSettingsEntity
{
    private $booksPerPage;
    private $ageLimit;

    /**
     * @return mixed
     */
    public function getBooksPerPage()
    {
        return $this->booksPerPage;
    }

    /**
     * @param mixed $booksPerPage
     */
    public function setBooksPerPage($booksPerPage)
    {
        $this->booksPerPage = $booksPerPage;
    }

    /**
     * @return mixed
     */
    public function getAgeLimit()
    {
        return $this->ageLimit;
    }

    /**
     * @param mixed $ageLimit
     */
    public function setAgeLimit($ageLimit)
    {
        $this->ageLimit = $ageLimit;
    }
}