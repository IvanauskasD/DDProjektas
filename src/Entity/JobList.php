<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobListRepository")
 */
class JobList
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $serviceName;
    /**
     * @ORM\Column(type="integer", nullable=false)
     * )
     */
    private $ServiceTime;
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $servicePrice;
    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $isServiceActive;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Order", inversedBy="repairs")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
    private $order;

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
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
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
