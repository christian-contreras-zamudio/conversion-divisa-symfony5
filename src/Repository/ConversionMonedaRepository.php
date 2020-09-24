<?php

namespace App\Repository;

use App\Entity\ConversionMoneda;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConversionMoneda|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConversionMoneda|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConversionMoneda[]    findAll()
 * @method ConversionMoneda[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConversionMonedaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConversionMoneda::class);
    }

    // /**
    //  * @return ConversionMoneda[] Returns an array of ConversionMoneda objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ConversionMoneda
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
