<?php

namespace App\Repository;

use App\Entity\LinkedInIds;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LinkedInIds|null find($id, $lockMode = null, $lockVersion = null)
 * @method LinkedInIds|null findOneBy(array $criteria, array $orderBy = null)
 * @method LinkedInIds[]    findAll()
 * @method LinkedInIds[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LinkedInIdsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LinkedInIds::class);
    }

    // /**
    //  * @return LinkedInIds[] Returns an array of LinkedInIds objects
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
    public function findOneBySomeField($value): ?LinkedInIds
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
