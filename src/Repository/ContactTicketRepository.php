<?php

namespace App\Repository;

use App\Entity\ContactTicket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContactTicket|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactTicket|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactTicket[]    findAll()
 * @method ContactTicket[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactTicketRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactTicket::class);
    }

    // /**
    //  * @return ContactTicket[] Returns an array of ContactTicket objects
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
    public function findOneBySomeField($value): ?ContactTicket
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
