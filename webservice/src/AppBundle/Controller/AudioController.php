<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Audio;
use AppBundle\Form\AudioType;

/**
 * Audio controller.
 *
 */
class AudioController extends Controller
{

    /**
     * Lists all Audio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Audio')->findAll();

        return $this->render('AppBundle:Audio:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Audio entity.
     *
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new Audio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('audios_show', array('id' => $entity->getId())));
        }

        return $this->render('AppBundle:Audio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Audio entity.
     *
     * @param Audio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Audio $entity)
    {
        $form = $this->createForm(new AudioType(), $entity, array(
            'action' => $this->generateUrl('audios_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Audio entity.
     *
     */
    public function newAction()
    {
        $entity = new Audio();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppBundle:Audio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Audio entity.
     *
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Audio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Audio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:Audio:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Audio entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Audio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Audio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:Audio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Audio entity.
    *
    * @param Audio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Audio $entity)
    {
        $form = $this->createForm(new AudioType(), $entity, array(
            'action' => $this->generateUrl('audios_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Audio entity.
     *
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Audio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Audio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('audios_edit', array('id' => $id)));
        }

        return $this->render('AppBundle:Audio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Audio entity.
     *
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Audio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Audio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('audios'));
    }

    /**
     * Creates a form to delete a Audio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('audios_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
