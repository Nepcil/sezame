<?php

namespace App\Repository;

use App\Entity\CollectionBookImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CollectionBookImages>
 *
 * @method CollectionBookImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method CollectionBookImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method CollectionBookImages[]    findAll()
 * @method CollectionBookImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CollectionBookImagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CollectionBookImages::class);
    }

    public function save(CollectionBookImages $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CollectionBookImages $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CollectionBookImages] Returns an array of CollectionBookImages objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CollectionBookImages
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
