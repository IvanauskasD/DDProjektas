<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 */
class Car
{
    /**
     *
     * @ORM\Column(name="id", type="string", length=255)
     * @ORM\Id
     */
    private $carId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $maker;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\Column(type="integer")
     */
    private $carYear;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $transmission;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $engineVolume;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Order", mappedBy="car")
     */
    private $orders;


    /**
     * @var string
     * @ORM\Column(name="orderCat",type="string", length=255, nullable=false)
     */
    private $serviceCategory;

    /**
     * @var string
     * @ORM\Column(name="orderName",type="string", length=255, nullable=false)
     */
    private $serviceName;

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
    public function getCarId()
    {
        return $this->carId;
    }

    /**
     * @param mixed $carId
     */
    public function setCarId($carId)
    {
        $this->carId = $carId;
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

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param mixed $orders
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;
    }

    /**
     * @return string
     */
    public function getServiceCategory()
    {
        return $this->serviceCategory;
    }

    /**
     * @param string $serviceCategory
     */
    public function setServiceCategory($serviceCategory)
    {
        $this->serviceCategory = $serviceCategory;
    }

    /**
     * @return string
     */
    public function getServiceName()
    {
        return $this->serviceName;
    }

    /**
     * @param string $serviceName
     */
    public function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;
    }



}
