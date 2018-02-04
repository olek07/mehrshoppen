<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AbstractPartner;
use AppBundle\Entity\Partner;
use AppBundle\Entity\Transaction;
use AppBundle\Service\MessageGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $partners = $this->getDoctrine()
            ->getRepository(Partner::class)
            ->findAll();

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'partners' => $partners
        ]);
    }


    /**
     * @Route("/partner/{alias}", name="partner")
     */
    public function partnerAction($alias) {


        /**
         * @var $partner AbstractPartner
         */
        $partner = $this->getDoctrine()
            ->getRepository(Partner::class)
            ->findOneByAlias($alias);

        return $this->render('default/partner.html.twig', [
            'partner' => $partner
        ]);
    }


    /**
     * @Route("/transactions", name="transactions")
     * @Security("has_role('ROLE_USER')")
     */
    public function transactionAction() {

        $userId = $this->getUser()->getId();

        $transactions = $this->getDoctrine()
            ->getRepository(Transaction::class)
            ->findBy(
                array('user' => $userId)
            );


        return $this->render('default/transactions.html.twig', [
            'transactions' => $transactions
        ]);

    }


    /**
     * @Route("/impressum", name="imprint")
     */
    public function imprintAction(MessageGenerator $messageGenerator) {
        $message = $messageGenerator->getHappyMessage();

        // echo $this->get('router')->match('/');

        #echo $message;
        # $logger = $container->get('logger');
        return $this->render('default/imprit.html.twig');
    }


    /**
     * @Route("/kontakt", name="contact")
     */
    public function contactAction() {

    }
}
