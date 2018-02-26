<?php

namespace AppBundle\Repository;

use AppBundle\Entity\ChannelJoin;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * UserRepository.
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
    public function findUsersInChannel($channelID)
    {
        $qb = new QueryBuilder($this->getEntityManager());
        $qb
            ->select('cj')
            ->from(ChannelJoin::class, 'cj')
            ->andWhere('cj.part_time IS NULL')
            ->andWhere('cj.chat = :id')
            ->setParameter('id', $channelID)
        ;

        return $qb->getQuery()->execute();
    }
}
