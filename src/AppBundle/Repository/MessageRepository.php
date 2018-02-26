<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MessageRepository.
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MessageRepository extends EntityRepository
{
    /**
     * @param int $channelID The ID of the channel we're fetching
     * @param int $page      The page of messages we're getting
     *
     * @return mixed
     */
    public function findMessagesInChannel($channelID, $page = 1)
    {
        $messagePerPage = 50;

        $qb = $this->createQueryBuilder('m')
            ->andWhere('m.chat = :id')
            ->setParameter('id', $channelID)
            ->andWhere('m.status = 1')
            ->orderBy('m.timestamp', 'DESC')
            ->setMaxResults(50)
        ;

        return $qb->getQuery()->execute();
    }
}
