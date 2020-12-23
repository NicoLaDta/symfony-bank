<?php

namespace App\Repository;

use App\Entity\UserBankAccount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserBankAccount|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserBankAccount|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserBankAccount[]    findAll()
 * @method UserBankAccount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserBankAccountRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserBankAccount::class);
    }

    // /**
    //  * @return UserBankAccount[] Returns an array of UserBankAccount objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserBankAccount
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
