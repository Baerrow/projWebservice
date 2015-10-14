<?php 
namespace LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use LoginBundle\Form\Type\RegistrationType;
use LoginBundle\Form\Model\Registration;

class RegisterController extends Controller
{
    public function registerAction()
    {
        $registration = new Registration();
        $form = $this->createForm(new RegistrationType(), $registration, array(
            'action' => $this->generateUrl('register_create'),
        ));

        return $this->render(
            'LoginBundle:Login:register.html.twig',
            array('form' => $form->createView())
        );
    }

    public function createAction(Request $request) {
	    $em = $this->getDoctrine()->getManager();

	    $form = $this->createForm(new RegistrationType(), new Registration());

	    // $form->handleRequest($request);

	    // if ($form->isValid()) {
	    //     $registration = $form->getData();

	    //     $em->persist($registration->getUser());
	    //     $em->flush();

	    //     return $this->redirectToRoute('login');
	    // }

	    // return $this->render(
	    //     'LoginBundle:Login:register.html.twig',
	    //     array('form' => $form->createView())
	    // );

	    if ($request->isMethod('POST')) {
	        $form->submit($request->request->get($form->getName()));

	        return new Response(var_dump($form));
	        // return new Response(var_dump($form(modelData)));
	    }

	    // return new Response(submit($request->request->get($form->getName())));
	}
}