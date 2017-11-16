<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class SecurityController extends \FOS\UserBundle\Controller\SecurityController
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function _loginAction(Request $request)
    {
        return parent::loginAction($request);

    }

    /**
     * Renders the login template with the given parameters. Overwrite this function in
     * an extended controller to provide additional data for the login template.
     *
     * @param array $data
     *
     * @return Response
     */
    protected function renderLogin(array $data)
    {
        return $this->render('Security/_login.html.twig', $data);
    }
}