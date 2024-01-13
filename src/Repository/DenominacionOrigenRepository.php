<?php

namespace App\Repository;

use App\Entity\DenominacionOrigen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DenominacionOrigen>
 *
 * @method DenominacionOrigen|null find($id, $lockMode = null, $lockVersion = null)
 * @method DenominacionOrigen|null findOneBy(array $criteria, array $orderBy = null)
 * @method DenominacionOrigen[]    findAll()
 * @method DenominacionOrigen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DenominacionOrigenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DenominacionOrigen::class);
    }

//    /**
//     * @return DenominacionOrigen[] Returns an array of DenominacionOrigen objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DenominacionOrigen
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
