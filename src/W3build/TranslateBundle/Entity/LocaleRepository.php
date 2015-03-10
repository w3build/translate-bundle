<?php

namespace W3build\TranslateBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * LocaleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LocaleRepository extends EntityRepository
{

    /**
     * @param string $code
     * @return Locale
     */
    public function findByCode($code){
        $query = $this->createQueryBuilder('l');
        $query->where('l.active = 1')
              ->andWhere('l.deleted = 0')
              ->andWhere('l.code = :code')
              ->setParameter('code', $code);

        return $query->getQuery()->getOneOrNullResult();
    }

    public function findAllActive(){
        return $this->findBy(array('deleted' => 0, 'active' => 1));
    }

}
