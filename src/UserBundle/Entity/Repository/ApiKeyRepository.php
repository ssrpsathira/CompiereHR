<?php

namespace UserBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class ApiKeyRepository extends EntityRepository
{
    /**
     * Get the username of the user for a given API key
     *
     * @param $key
     * @return string|null
     */
    public function getUserNameForApiKey($key)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        $query = $qb->select('u.username')
            ->from('UserBundle:User', 'u')
            ->innerJoin('u.apiKeys', 'ak')
            ->where('ak.key = :key')
            ->setParameter('key', $key)
            ->getQuery();

        try {
            $username = $query->getSingleScalarResult();
        } catch (\Exception $exception) {
            $username = null;
        }

        return $username;
    }
}
