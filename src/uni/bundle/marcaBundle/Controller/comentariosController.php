<?php

namespace uni\bundle\marcaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use uni\bundle\marcaBundle\Entity\comentarios;
use uni\bundle\marcaBundle\Form\comentariosType;

/**
 * comentarios controller.
 *
 */
class comentariosController extends Controller
{

    /**
     * Lists all comentarios entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('uniMarcaBundle:comentarios')->findAll();

        return $this->render('uniMarcaBundle:comentarios:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new comentarios entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new comentarios();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('comentarios_show', array('id' => $entity->getId())));
        }

        return $this->render('uniMarcaBundle:comentarios:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a comentarios entity.
     *
     * @param comentarios $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(comentarios $entity)
    {
        $form = $this->createForm(new comentariosType(), $entity, array(
            'action' => $this->generateUrl('comentarios_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new comentarios entity.
     *
     */
    public function newAction()
    {
        $entity = new comentarios();
        $form   = $this->createCreateForm($entity);

        return $this->render('uniMarcaBundle:comentarios:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
    /**
     * Displays a form to create a new comentarios entity PARA UNA NOTICIA CONCRETA.
     *
     */
    public function newComNotAction($id)
    {
//        REDIRIGIR DIRECTAMENTE A LA PAINA DE NUEVO Q SE HARA UN FORM A PIñON.
//        PASAR EL ID DE LA NOTICIA PARA GUARDARLO LUEGO
//
        return $this->render('uniMarcaBundle:comentarios:newcomnot.html.twig', array(
            'idNot' => $id,           
        ));
    }
    
        /**
     * Saves a new comentarios entity PARA UNA NOTICIA CONCRETA.
     *
     */
    public function saveComNotAction(Request $request)
    {
//        
        $eComent= new comentarios();
        $titulo= $request->request->get('titulo');
        $eComent->setTit($titulo);
        
        $nickcom= $request->request->get('nickcom');
        $eComent->setNick($nickcom);
        
        $textCom= $request->request->get('textComent');
        $eComent->setDescrip($textCom);
        
        $eComent->setFecha(new \DateTime("now"));
        
        $idNot= $request->request->get('idNot');
        $em1 = $this->getDoctrine()->getManager();
        $entity = $em1->getRepository('uniMarcaBundle:noticias')->find($idNot);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find noticias entity.');
        }
        $eComent->setNoticia($entity);
        
        $em2 = $this->getDoctrine()->getEntityManager();
        $em2->persist($eComent);
        $em2->flush();

//        return $this->redirect($this->generateUrl('noticias_show', array('id' => $idNot)));
        return $this->render('uniMarcaBundle:noticias:show.html.twig', array(
            'entity'      => $entity           
        ));
    }

    /**
     * Finds and displays a comentarios entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uniMarcaBundle:comentarios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find comentarios entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('uniMarcaBundle:comentarios:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing comentarios entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uniMarcaBundle:comentarios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find comentarios entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('uniMarcaBundle:comentarios:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a comentarios entity.
    *
    * @param comentarios $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(comentarios $entity)
    {
        $form = $this->createForm(new comentariosType(), $entity, array(
            'action' => $this->generateUrl('comentarios_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing comentarios entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uniMarcaBundle:comentarios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find comentarios entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('comentarios_edit', array('id' => $id)));
        }

        return $this->render('uniMarcaBundle:comentarios:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a comentarios entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('uniMarcaBundle:comentarios')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find comentarios entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('comentarios'));
    }

    /**
     * Creates a form to delete a comentarios entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comentarios_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
