<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Partner;
use AppBundle\Entity\Transaction;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;

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
         * @var $partner Partner
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
     */
    public function transactionAction() {

        $transactions = $this->getDoctrine()
            ->getRepository(Transaction::class)
            ->findBy(
                array('user' => 1)
            );


        foreach ($transactions as  $transaction) {

            /** @var $transaction Transaction */

            echo $transaction->getPartner()->getName();
            echo $transaction->getAmount() . ' ';
            // echo date('d.m.Y H:i', $transaction->getCreateDate()->getTimestamp());
            echo $transaction->getCreateDate()->format('d.m.Y H:i:s');
            echo  '<br>';
        }

        #  var_dump($transactions[0]->getPartner()->getName());
        # echo $categoryName = $transaction->getPartner()->getName();

        return $this->render('default/transactions.html.twig', [
            'transactions' => $transactions
        ]);

    }


    /**
     * @Route("/impressum", name="imprint")
     */
    public function imprintAction() {
        
    }


    /**
     * @Route("/kontakt", name="contact")
     */
    public function contactAction() {

    }
}
