<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AccountController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard")
     * @Security("has_role('ROLE_USER')")
     */
    public function dashboardAction()
    {

        $userId = $this->getUser()->getId();

        $currentBalance = $this->getCurrentBalance($userId);
        return $this->render('account/dashboard.html.twig', [
            'currentBalance' => $currentBalance
        ]);
    }


    /**
     * returns the current balance of the user
     * 
     * 
     * @param $userId int
     * @return float
     */
    public function getCurrentBalance($userId) {

        // http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/cookbook/aggregate-fields.html

        $dql =
            "SELECT SUM(e.amount) AS balance FROM AppBundle\\Entity\\Transaction e " .
            "WHERE e.user = ?1";

        $em = $this->getDoctrine()->getManager();

        return $em->createQuery($dql)
            ->setParameter(1, $userId)
            ->getSingleScalarResult();
    }
}