<?php

namespace App\Repository;

use App\Entity\Facebook;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Facebook|null find($id, $lockMode = null, $lockVersion = null)
 * @method Facebook|null findOneBy(array $criteria, array $orderBy = null)
 * @method Facebook[]    findAll()
 * @method Facebook[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacebookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Facebook::class);
    }

    // /**
    //  * @return Facebook[] Returns an array of Facebook objects
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
    public function findOneBySomeField($value): ?Facebook
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
