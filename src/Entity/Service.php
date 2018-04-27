<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiceRepository")
 */
class Service
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="id", type="integer", type="integer", nullable=false)
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false, unique=true)
     */
    private $serviceName;
    /**
     * @ORM\Column(type="integer")
     */
    private $ServiceTime;
    /**
     * @ORM\Column(type="integer")
     */
    private $servicePrice;
    /**
     * @ORM\Column(type="boolean")
     */
    private $isServiceActive;

    /**
     * @return mixed
     */
    public function getServiceTime()
    {
        return $this->ServiceTime;
    }

    /**
     * @param mixed $ServiceTime
     */
    public function setServiceTime($ServiceTime)
    {
        $this->ServiceTime = $ServiceTime;
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
    public function getIsServiceActive()
    {
        return $this->isServiceActive;
    }

    /**
     * @param mixed $isServiceActive
     */
    public function setIsServiceActive($isServiceActive)
    {
        $this->isServiceActive = $isServiceActive;
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

    /**
     * @return mixed
     */
    public function getServicePrice()
    {
        return $this->servicePrice;
    }

    /**
     * @param mixed $servicePrice
     */
    public function setServicePrice($servicePrice)
    {
        $this->servicePrice = $servicePrice;
    }


}
