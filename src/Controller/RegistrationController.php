<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var string $plainPassword */
            $plainPassword = $form->get('plainPassword')->getData();

            // encode the plain password
            $user->setContraseña($userPasswordHasher->hashPassword($user, $plainPassword));

            //meto el rol segun el correo 
            $rol= $user->getRoles();
            $rolesString = implode(',' , $rol);
            $user->setRol($rolesString);

            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

            if ($rolesString =='ROLE_USER,ROLE_ADMIN'){
                echo "aaaa";
                $vistaPrincipal = $this->redirectToRoute('admin-preguntas');
            }else{
                echo "bbbbb";
                $vistaPrincipal = $this->redirectToRoute('user-preguntas');
            }
            return $vistaPrincipal;
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }
}
