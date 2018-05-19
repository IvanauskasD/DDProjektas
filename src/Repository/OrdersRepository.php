<?php

namespace App\Repository;

use App\Entity\Orders;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Orders|null find($id, $lockMode = null, $lockVersion = null)
 * @method Orders|null findOneBy(array $criteria, array $OrdersBy = null)
 * @method Orders[]    findAll()
 * @method Orders[]    findBy(array $criteria, array $OrdersBy = null, $limit = null, $offset = null)
 */
class OrdersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Orders::class);
    }

    public function findWaitingByCompany($id)
    {
        return $this->createQueryBuilder('c')
            ->addSelect('r') // to make Doctrine actually use the join
            ->leftJoin('c.car', 'r')
            ->addSelect('u') // to make Doctrine actually use the join
            ->leftJoin('r.user', 'u')
            ->where('c.status = :Wait')->setParameter('Wait', 'Waiting')
            ->andwhere('c.company = :id')->setParameter('id', $id)
            ->getQuery()
            ->getResult();
        ;
    }
}
