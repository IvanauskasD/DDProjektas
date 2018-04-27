<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarSubmittionRepository")
 */
class CarSubmittion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(name="arrivalDate", type="datetime", nullable=false)
     */
    private $approximateCompletion;
    /**
     * @ORM\Column(name="isDone", type="boolean", nullable=false)
     */
    private $carIsRepaired;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Profile", inversedBy="orders")
     * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     */
    private $profile;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Car", inversedBy="order")
     * @ORM\JoinColumn(name="car_id", referencedColumnName="number_plate")
     */
    private $car;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Repair", mappedBy="order")
     */
    private $repairs;

    /**
     * @return mixed
     */
    public function getApproximateCompletion()
    {
        return $this->approximateCompletion;
    }

    /**
     * @param mixed $approximateCompletion
     */
    public function setApproximateCompletion($approximateCompletion)
    {
        $this->approximateCompletion = $approximateCompletion;
    }

    /**
     * @return mixed
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * @param mixed $car
     */
    public function setCar($car)
    {
        $this->car = $car;
    }

    /**
     * @return mixed
     */
    public function getCarIsRepaired()
    {
        return $this->carIsRepaired;
    }

    /**
     * @param mixed $carIsRepaired
     */
    public function setCarIsRepaired($carIsRepaired)
    {
        $this->carIsRepaired = $carIsRepaired;
    }

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
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param mixed $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    /**
     * @return mixed
     */
    public function getRepairs()
    {
        return $this->repairs;
    }

    /**
     * @param mixed $repairs
     */
    public function setRepairs($repairs)
    {
        $this->repairs = $repairs;
    }


}
