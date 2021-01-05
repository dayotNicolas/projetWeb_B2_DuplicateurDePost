<?php

namespace App\Repository;

use App\Entity\FacebookIds;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FacebookIds|null find($id, $lockMode = null, $lockVersion = null)
 * @method FacebookIds|null findOneBy(array $criteria, array $orderBy = null)
 * @method FacebookIds[]    findAll()
 * @method FacebookIds[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacebookIdsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FacebookIds::class);
    }

    // /**
    //  * @return FacebookIds[] Returns an array of FacebookIds objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FacebookIds
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
