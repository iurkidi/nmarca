<?php

namespace uni\bundle\marcaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use uni\bundle\marcaBundle\Entity\anuncios;
use uni\bundle\marcaBundle\Form\anunciosType;

/**
 * anuncios controller.
 *
 */
class anunciosController extends Controller
{

    /**
     * Lists all anuncios entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('uniMarcaBundle:anuncios')->findAll();

        return $this->render('uniMarcaBundle:anuncios:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new anuncios entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new anuncios();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('anuncios_show', array('id' => $entity->getId())));
        }

        return $this->render('uniMarcaBundle:anuncios:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a anuncios entity.
     *
     * @param anuncios $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(anuncios $entity)
    {
        $form = $this->createForm(new anunciosType(), $entity, array(
            'action' => $this->generateUrl('anuncios_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new anuncios entity.
     *
     */
    public function newAction()
    {
        $entity = new anuncios();
        $form   = $this->createCreateForm($entity);

        return $this->render('uniMarcaBundle:anuncios:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a anuncios entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uniMarcaBundle:anuncios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find anuncios entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('uniMarcaBundle:anuncios:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing anuncios entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uniMarcaBundle:anuncios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find anuncios entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('uniMarcaBundle:anuncios:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a anuncios entity.
    *
    * @param anuncios $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(anuncios $entity)
    {
        $form = $this->createForm(new anunciosType(), $entity, array(
            'action' => $this->generateUrl('anuncios_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing anuncios entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uniMarcaBundle:anuncios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find anuncios entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('anuncios_edit', array('id' => $id)));
        }

        return $this->render('uniMarcaBundle:anuncios:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a anuncios entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('uniMarcaBundle:anuncios')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find anuncios entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('anuncios'));
    }

    /**
     * Creates a form to delete a anuncios entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('anuncios_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
