<?php


namespace App\Http\Entities;

class AgeCategoryEntity
{
    private $id;

    private $name;

    private $minAge;

    private $maxAge;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMinAge()
    {
        return $this->minAge;
    }

    /**
     * @param mixed $minAge
     */
    public function setMinAge($minAge)
    {
        $this->minAge = $minAge;
    }

    /**
     * @return mixed
     */
    public function getMaxAge()
    {
        return $this->maxAge;
    }

    /**
     * @param mixed $maxAge
     */
    public function setMaxAge($maxAge)
    {
        $this->maxAge = $maxAge;
    }
}