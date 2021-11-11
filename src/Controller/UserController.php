<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserAddFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user/", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/user/add", name="user_add")
     */
    public function addUser(Request $request){
        $user= new User();
        $form= $this->createForm(UserAddFormType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

        }
        return $this->renderForm('user/add.html.twig', [
            'form' => $form,
        ]);
    }
}

