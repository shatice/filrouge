<?php

namespace App\Repository;

use App\Entity\Country;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Country|null find($id, $lockMode = null, $lockVersion = null)
 * @method Country|null findOneBy(array $criteria, array $orderBy = null)
 * @method Country[]    findAll()
 * @method Country[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CountryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Country::class);
    }

    // /**
    //  * @return Country[] Returns an array of Country objects
    //  */

    public function findCountries()
    {
        $req = $this->createQueryBuilder('c')
            ->getQuery()
            ->getResult();

        $arr = [];
        foreach ($req as $value)
        {
            $obj = [
                "id" => $value->getId(),
                "name" => $value->getName(),
                "code" => $value->getCode(),
                "tonne_per_year" => $value->getTonnePerYear(),
                "per_person_per_day" => $value->getPerPersonPerDay(),
                "continent" => $value->getContinent()->getName()
            ];
            $arr[] = $obj;
        }
        return $arr;
    }


    /*
    public function findOneBySomeField($value): ?Country
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
