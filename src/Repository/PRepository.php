<?php

namespace App\Repository;

use App\Entity\P;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method P|null find($id, $lockMode = null, $lockVersion = null)
 * @method P|null findOneBy(array $criteria, array $orderBy = null)
 * @method P[]    findAll()
 * @method P[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, P::class);
    }

//    /**
//     * @return P[] Returns an array of P objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?P
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
