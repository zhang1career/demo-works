<?php

namespace App\Model\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="public.user")
 */
class User extends AbsEntity
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     */
    protected int $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    protected string $name;

    /**
     * @ORM\Column(type="datetime")
     */
    protected DateTime $createdTime;

    /**
     * @ORM\Column(type="datetime")
     */
    protected DateTime $modifiedTime;

    /**
     * @ORM\Column(type="integer")
     */
    protected int $isDeleted;


    public function __construct() {
        $this->createdTime = new DateTime();
        $this->modifiedTime = $this->createdTime;
        $this->isDeleted = 0;
    }

    /**
     * @param $id
     */
    public function setId($id) : void {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId() : int {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name) : void {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName() : string {
        return $this->name;
    }

    /**
     * @param DateTime $createdTime
     */
    public function setCreatedTime(DateTime $createdTime) : void {
        $this->createdTime = $createdTime;
    }

    /**
     * @return DateTime
     */
    public function getCreatedTime() : DateTime {
        return $this->createdTime;
    }

    /**
     * @param DateTime $modifiedTime
     */
    public function setModifiedTime(DateTime $modifiedTime) : void {
        $this->modifiedTime = $modifiedTime;
    }

    /**
     * @return int
     */
    public function getIsDeleted() : int {
        return $this->isDeleted;
    }

    /**
     * @param int $isDeleted
     */
    public function setIsDeleted(int $isDeleted) : void {
        $this->isDeleted = $isDeleted;
    }

    /**
     * @return DateTime
     */
    public function getModifiedTime() : DateTime{
        return $this->modifiedTime;
    }
}