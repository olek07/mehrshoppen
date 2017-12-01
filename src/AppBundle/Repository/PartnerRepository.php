<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PartnerRepository extends EntityRepository
{
    public function findPartners()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Partner p WHERE p.id != 99999'
            )
            ->getResult();
    }
}
