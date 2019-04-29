<?php

namespace App\Repository;

use App\Entity\Ampli;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ampli|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ampli|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ampli[]    findAll()
 * @method Ampli[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AmpliRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ampli::class);
    }

    // /**
    //  * @return Ampli[] Returns an array of Ampli objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ampli
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
