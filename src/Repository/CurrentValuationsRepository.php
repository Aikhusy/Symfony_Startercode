<?php

namespace App\Repository;

use App\Entity\CurrentValuations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CurrentValuations>
 *
 * @method CurrentValuations|null find($id, $lockMode = null, $lockVersion = null)
 * @method CurrentValuations|null findOneBy(array $criteria, array $orderBy = null)
 * @method CurrentValuations[]    findAll()
 * @method CurrentValuations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CurrentValuationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CurrentValuations::class);
    }

    //    /**
    //     * @return CurrentValuations[] Returns an array of CurrentValuations objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?CurrentValuations
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
