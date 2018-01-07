<?php

namespace UserBundle\Entity;

use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;

class User extends BaseUser
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var Collection
     */
    protected $apiKeys;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add apiKey
     *
     * @param ApiKey $apiKey
     *
     * @return User
     */
    public function addApiKey(ApiKey $apiKey)
    {
        $this->apiKeys[] = $apiKey;

        return $this;
    }

    /**
     * Remove apiKey
     *
     * @param ApiKey $apiKey
     */
    public function removeApiKey(ApiKey $apiKey)
    {
        $this->apiKeys->removeElement($apiKey);
    }

    /**
     * Get apiKeys
     *
     * @return Collection
     */
    public function getApiKeys()
    {
        return $this->apiKeys;
    }
}
