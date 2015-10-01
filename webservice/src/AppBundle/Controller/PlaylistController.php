<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Playlist;
use AppBundle\Form\PlaylistType;

/**
 * Playlist controller.
 *
 */
class PlaylistController extends Controller
{

    /**
     * Lists all Playlist entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Playlist')->findAll();

        return $this->render('AppBundle:Playlist:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Playlist entity.
     *
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new Playlist();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('playlists_show', array('id' => $entity->getId())));
        }

        return $this->render('AppBundle:Playlist:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Playlist entity.
     *
     * @param Playlist $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Playlist $entity)
    {
        $form = $this->createForm(new PlaylistType(), $entity, array(
            'action' => $this->generateUrl('playlists_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Playlist entity.
     *
     */
    public function newAction()
    {
        $entity = new Playlist();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppBundle:Playlist:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Playlist entity.
     *
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Playlist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Playlist entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:Playlist:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Playlist entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Playlist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Playlist entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:Playlist:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Playlist entity.
    *
    * @param Playlist $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Playlist $entity)
    {
        $form = $this->createForm(new PlaylistType(), $entity, array(
            'action' => $this->generateUrl('playlists_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Playlist entity.
     *
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Playlist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Playlist entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('playlists_edit', array('id' => $id)));
        }

        return $this->render('AppBundle:Playlist:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Playlist entity.
     *
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Playlist')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Playlist entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('playlists'));
    }

    /**
     * Creates a form to delete a Playlist entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('playlists_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
