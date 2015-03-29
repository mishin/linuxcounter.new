<?php

namespace Syw\Front\MainBundle\Manager;

use Syw\Front\MainBundle\Entity\UserProfile;

/**
 * Class UserProfileManager
 *
 * @author Alexander Löhner <alex.loehner@linux.com>
 */
class UserProfileManager extends AbstractManager
{
    /**
     * create
     * Insert new entry to UserProfile table.
     *
     * @param UserProfile $obj
     * @return void
     */
    public function create(UserProfile $obj)
    {
        $this->getEntityManager()->persist($obj);

        $this->getEntityManager()->flush();
    }

    /**
     * update
     * Update entry to UserProfile table.
     *
     * @param UserProfile $obj
     * @return void
     */
    public function update(UserProfile $obj)
    {
        $this->getEntityManager()->persist($obj);

        $this->getEntityManager()->flush();
    }

    /**
     * delete
     * Delete entry to Languages table.
     *
     * @param UserProfile $obj
     * @return void
     */
    public function delete(UserProfile $obj)
    {
        $this->getEntityManager()->remove($obj);

        $this->getEntityManager()->flush();
    }

    /**
     * findAll
     * Find all records from UserProfile table.
     *
     * @return UserProfile[]
     */
    public function findAll(array $criteria = array(), array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * getAll
     * Get all records from UserProfile table.
     *
     * @return UserProfile[]
     */
    public function getAll()
    {
        return $this->findAll();
    }

    /**
     * findById
     * Find records from id
     *
     * @return UserProfile
     */
    public function findById($id)
    {
        return $this->getRepository()->find($id);
    }

    /**
     * findOneBy
     * Find one records by criteria from UserProfile table.
     *
     * @return UserProfile
     */
    public function findOneBy($criteria)
    {
        return $this->getRepository()->findOneBy($criteria);
    }

    /**
     * findBy
     * Find records from criteria
     *
     * @return UserProfile
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->getRepository()->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * getRepository
     * Get UserProfile entity repository object
     *
     * @return UserProfileRepository
     */
    public function getRepository()
    {
        return $this->getEntityManager()->getRepository('SywFrontMainBundle:UserProfile');
    }
}
