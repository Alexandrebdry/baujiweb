<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default/{pseudo}", name="default")
     */
    public function index($pseudo): Response
    {
        return $this->render('default/index.html.twig', [
            'pseudo' => $pseudo,
        ]);
    }
}
