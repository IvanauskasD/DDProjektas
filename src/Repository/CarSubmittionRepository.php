<?php

namespace App\Repository;

use App\Entity\CarSubmittion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CarSubmittion|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarSubmittion|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarSubmittion[]    findAll()
 * @method CarSubmittion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarSubmittionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CarSubmittion::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('c')
            ->where('c.something = :value')->setParameter('value', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
