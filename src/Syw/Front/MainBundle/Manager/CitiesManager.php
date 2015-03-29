<?php

namespace Syw\Front\MainBundle\Manager;

use Syw\Front\MainBundle\Entity\Cities;

/**
 * Class CitiesManager
 *
 * @author Alexander Löhner <alex.loehner@linux.com>
 */
class CitiesManager extends AbstractManager
{
    /**
     * create
     * Insert new entry to Cities table.
     *
     * @param Cities $obj
     * @return void
     */
    public function create(Cities $obj)
    {
        $this->getEntityManager()->persist($obj);

        $this->getEntityManager()->flush();
    }

    /**
     * update
     * Update entry to Cities table.
     *
     * @param Cities $obj
     * @return void
     */
    public function update(Cities $obj)
    {
        $this->getEntityManager()->persist($obj);

        $this->getEntityManager()->flush();
    }

    /**
     * delete
     * Delete entry to Languages table.
     *
     * @param Cities $obj
     * @return void
     */
    public function delete(Cities $obj)
    {
        $this->getEntityManager()->remove($obj);

        $this->getEntityManager()->flush();
    }

    /**
     * findAll
     * Find all records from Cities table.
     *
     * @return Cities[]
     */
    public function findAll(array $criteria = array(), array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * getAll
     * Get all records from Cities table.
     *
     * @return Cities[]
     */
    public function getAll()
    {
        return $this->findAll();
    }

    /**
     * findById
     * Find records from id
     *
     * @return Cities
     */
    public function findById($id)
    {
        return $this->getRepository()->find($id);
    }

    /**
     * findOneBy
     * Find one records by criteria from Cities table.
     *
     * @return Cities
     */
    public function findOneBy($criteria)
    {
        return $this->getRepository()->findOneBy($criteria);
    }

    /**
     * findBy
     * Find records from criteria
     *
     * @return Cities
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->getRepository()->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * getRepository
     * Get Cities entity repository object
     *
     * @return CitiesRepository
     */
    public function getRepository()
    {
        return $this->getEntityManager()->getRepository('SywFrontMainBundle:Cities');
    }
}
