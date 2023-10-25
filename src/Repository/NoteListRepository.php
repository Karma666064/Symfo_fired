<?php

namespace App\Repository;

use App\Entity\NoteList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NoteList>
 *
 * @method NoteList|null find($id, $lockMode = null, $lockVersion = null)
 * @method NoteList|null findOneBy(array $criteria, array $orderBy = null)
 * @method NoteList[]    findAll()
 * @method NoteList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoteListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NoteList::class);
    }

//    /**
//     * @return NoteList[] Returns an array of NoteList objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NoteList
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
