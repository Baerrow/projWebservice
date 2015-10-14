<?php 

namespace LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LoginController extends Controller
{
    public function loginAction(Request $request)
    {
       // Si le visiteur est déjà identifié, on le redirige vers l'accueil
	    if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
	        return $this->redirectToRoute('audios_route');
	    }
	    
	    // Le service authentication_utils permet de récupérer le nom d'utilisateur
	    // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide
	    // (mauvais mot de passe par exemple)
	    $authenticationUtils = $this->get('security.authentication_utils');

	    return $this->render('LoginBundle:Login:login.html.twig', array(
	      'last_username'   => $authenticationUtils->getLastUsername(),
	      'error'           => $authenticationUtils->getLastAuthenticationError(),
	    ));
    }

    public function loginCheckAction()
    {
        // this controller will not be executed,
        // as the route is handled by the Security system
    }

    /**
     * Checks if login and password are correct
     *
     */
    public function checkUserAction(Request $request)
    {

        $login = $request->query->get('login', '');
        $password = $request->query->get('password', '');

        if($login == '' || $password == '')
            return new Response(Response::HTTP_BAD_REQUEST); //400

        // $hash = hash("sha1", $password);

        $user = $this->getDoctrine()
            ->getRepository('@UserBundle:User')
            ->findOneBy(array(
            'login' => $login,
            'password' => $password
        ));

        if(!$user)
            return new Response(Response::HTTP_BAD_REQUEST); //400

        return new Response(Response::HTTP_OK); //200
    }
}