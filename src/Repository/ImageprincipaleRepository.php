<?php

namespace App\Repository;

use App\Entity\Imageprincipale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Imageprincipale|null find($id, $lockMode = null, $lockVersion = null)
 * @method Imageprincipale|null findOneBy(array $criteria, array $orderBy = null)
 * @method Imageprincipale[]    findAll()
 * @method Imageprincipale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageprincipaleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Imageprincipale::class);
    }

    // /**
    //  * @return Imageprincipale[] Returns an array of Imageprincipale objects
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
    public function findOneBySomeField($value): ?Imageprincipale
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
