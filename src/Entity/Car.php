<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 */
class Car
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $maker;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $service;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subService;

    /**
     * @ORM\Column(type="integer")
     */
    private $carYear;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $transmission;
    /**
     * @ORM\Column(type="float")
     */
    private $engineVolume;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Profile")
     * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     */
    private $profileOfUser;

    /**
     * @return mixed
     */
    public function getCarYear()
    {
        return $this->carYear;
    }

    /**
     * @param mixed $carYear
     */
    public function setCarYear($carYear)
    {
        $this->carYear = $carYear;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getEngineVolume()
    {
        return $this->engineVolume;
    }

    /**
     * @param mixed $engineVolume
     */
    public function setEngineVolume($engineVolume)
    {
        $this->engineVolume = $engineVolume;
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
    public function getMaker()
    {
        return $this->maker;
    }

    /**
     * @param mixed $maker
     */
    public function setMaker($maker)
    {
        $this->maker = $maker;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getProfileOfUser()
    {
        return $this->profileOfUser;
    }

    /**
     * @param mixed $profileOfUser
     */
    public function setProfileOfUser($profileOfUser)
    {
        $this->profileOfUser = $profileOfUser;
    }

    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function getSubService()
    {
        return $this->subService;
    }

    /**
     * @param mixed $subService
     */
    public function setSubService($subService)
    {
        $this->subService = $subService;
    }

    /**
     * @return mixed
     */
    public function getTransmission()
    {
        return $this->transmission;
    }

    /**
     * @param mixed $transmission
     */
    public function setTransmission($transmission)
    {
        $this->transmission = $transmission;
    }


}
