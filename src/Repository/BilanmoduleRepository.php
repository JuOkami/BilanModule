<?php

namespace App\Repository;

use App\Entity\Bilanmodule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bilanmodule>
 *
 * @method Bilanmodule|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bilanmodule|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bilanmodule[]    findAll()
 * @method Bilanmodule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BilanmoduleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bilanmodule::class);
    }

//    /**
//     * @return Bilanmodule[] Returns an array of Bilanmodule objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Bilanmodule
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
