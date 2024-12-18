<?php
namespace App\Controller;

//utilizo la clase
use App\Entity\User;

//poder mandar y manejar las repuestas
use Symfony\Component\HttpFoundation\Response;
//atributos para las rutas
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


//metemos todas las vistas del usuario
class UsuarioVistasController extends AbstractController{

    #[Route("/user/preguntas", name: "user-preguntas")]
    public function userPreguntas(){
        return new Response('hola usuario');
    }
}



/**Devolver una plantilla Twig: Si deseas renderizar una plantilla Twig (lo que es más común en aplicaciones Symfony), deberías 
 * devolver el resultado de un render() en lugar de hacer un echo: 
 * 
 * ejem: class UsuarioVistasController extends AbstractController
{
    #[Route("/user/preguntas", name: "user-preguntas")]
    public function userPreguntas(): Response
    {
        // Renderizar una plantilla Twig
        return $this->render('user/preguntas.html.twig');
    }

 * */

?>