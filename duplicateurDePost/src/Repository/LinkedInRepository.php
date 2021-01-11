<?php

namespace App\Repository;

use App\Entity\LinkedIn;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LinkedIn|null find($id, $lockMode = null, $lockVersion = null)
 * @method LinkedIn|null findOneBy(array $criteria, array $orderBy = null)
 * @method LinkedIn[]    findAll()
 * @method LinkedIn[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LinkedInRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LinkedIn::class);
    }

    // /**
    //  * @return LinkedIn[] Returns an array of LinkedIn objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LinkedIn
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
