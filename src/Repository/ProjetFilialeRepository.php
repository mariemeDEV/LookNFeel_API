<?php

namespace App\Repository;

use App\Entity\ProjetFiliale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProjetFiliale|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjetFiliale|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjetFiliale[]    findAll()
 * @method ProjetFiliale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjetFilialeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProjetFiliale::class);
    }

//    /**
//     * @return ProjetFiliale[] Returns an array of ProjetFiliale objects
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
    public function findOneBySomeField($value): ?ProjetFiliale
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
