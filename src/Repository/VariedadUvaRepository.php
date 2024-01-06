<?php

namespace App\Repository;

use App\Entity\VariedadUva;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VariedadUva>
 *
 * @method VariedadUva|null find($id, $lockMode = null, $lockVersion = null)
 * @method VariedadUva|null findOneBy(array $criteria, array $orderBy = null)
 * @method VariedadUva[]    findAll()
 * @method VariedadUva[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VariedadUvaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VariedadUva::class);
    }

//    /**
//     * @return VariedadUva[] Returns an array of VariedadUva objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VariedadUva
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
