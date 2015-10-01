<?php 
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\RegistrationType;
use AppBundle\Form\Model\Registration;

class AccountController extends Controller
{
    public function registerAction()
    {
        $registration = new Registration();
        $form = $this->createForm(new RegistrationType(), $registration, array(
            'action' => $this->generateUrl('account_create'),
        ));

        return $this->render(
            'AppBundle:User:register.html.twig',
            array('form' => $form->createView())
        );
    }

    public function createAction(Request $request)
	{
	    $em = $this->getDoctrine()->getManager();

	    $form = $this->createForm(new RegistrationType(), new Registration());

	    $form->handleRequest($request);

	    if ($form->isValid()) {
	        $registration = $form->getData();

	        $em->persist($registration->getUser());
	        $em->flush();

	        return $this->redirectToRoute('login');
	    }

	    return $this->render(
	        'AppBundle:User:register.html.twig',
	        array('form' => $form->createView())
	    );
	}
}