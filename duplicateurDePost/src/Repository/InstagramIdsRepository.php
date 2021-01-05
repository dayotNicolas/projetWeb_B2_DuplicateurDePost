<?php

namespace App\Repository;

use App\Entity\InstagramIds;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InstagramIds|null find($id, $lockMode = null, $lockVersion = null)
 * @method InstagramIds|null findOneBy(array $criteria, array $orderBy = null)
 * @method InstagramIds[]    findAll()
 * @method InstagramIds[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstagramIdsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InstagramIds::class);
    }

    // /**
    //  * @return InstagramIds[] Returns an array of InstagramIds objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InstagramIds
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
