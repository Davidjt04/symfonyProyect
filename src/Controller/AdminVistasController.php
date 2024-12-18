<?php
// namespace App\Controller;
// //metemos todas las vistas del administrador 


// //utilizo la clase
// use App\Entity\User;
// //poder mandar y manejar las repuestas
// use Symfony\Component\HttpFoundation\Response;
// //atributos para las rutas
// use Symfony\Component\Routing\Attribute\Route;
// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// class AdminVistasContoller{

// }
namespace App\Controller;

//utilizo la clase
use App\Entity\User;

//poder mandar y manejar las repuestas
use Symfony\Component\HttpFoundation\Response;
//atributos para las rutas
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


//metemos todas las vistas del usuario
class AdminVistasController extends AbstractController{

    #[Route("/admin/preguntas", name: "admin-preguntas")]
    public function userPreguntas(){
        return new Response('hola admin');
    }
}

?>