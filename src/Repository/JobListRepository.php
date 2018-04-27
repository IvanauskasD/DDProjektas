<?php

namespace App\Repository;

use App\Entity\JobList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method JobList|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobList|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobList[]    findAll()
 * @method JobList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobListRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JobList::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('j')
            ->where('j.something = :value')->setParameter('value', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
