<?php

namespace uni\bundle\marcaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use uni\bundle\marcaBundle\Entity\noticias;
use uni\bundle\marcaBundle\Form\noticiasType;

/**
 * noticias controller.
 *
 */
class noticiasController extends Controller
{

    
    /**
     * Funcion para buscar por autor (buscarautor).
     *
     */
    public function buscarAutorAction()
    {
        return $this->render('uniMarcaBundle:noticias:buscarAutor.html.twig');
    }
    
    /**
     * Funcion para sacar las noticias del autor buscado.
     *
     */
    public function responderAutorAction()
    {
        $nom= $_POST['autor']; // Coger variables usando php clásico.
        //$nom= $request->request->get('autor'); // Modo symfony2
         
        $em = $this->getDoctrine()->getManager();

        //$entities = $em->getRepository('uniMarcaBundle:noticias')->  findBy(array('autor'=>$nom));
        //NOMBRE DEL CAMPO DE BBDD
        $entities = $em->getRepository('uniMarcaBundle:noticias')->  findByAutor($nom);

        return $this->render('uniMarcaBundle:noticias:responderAutor.html.twig', array(
            'entities' => $entities,
            'autor' => $nom
        ));
    }
    
    /**
     * Funcion para buscar por titulo
     *
     */
    public function buscartituloAction()
    {
        return $this->render('uniMarcaBundle:noticias:buscarTitulo.html.twig');
    }
    
    /**
     * Funcion para sacar las noticias del titulo buscado.
     *
     */
    public function responderTituloAction()
    {
        $tit= $_POST['titulo']; // Coger variables usando php clásico.
        //$nom= $request->request->get('autor'); // Modo symfony2
         
        $em = $this->getDoctrine()->getManager();
        
        $entity = $em->getRepository('uniMarcaBundle:noticias')->  findOneBy(array('titulo' => $tit));

        //PARA MOSTRAR LOS DATOS EN RESPONDERTITULO.HTML (NUEVA PAGINA CREADA) MOSTRANDO DATOS SUELTOS DE LA NOTICIAS
//        return $this->render('uniMarcaBundle:noticias:responderTitulo.html.twig', array(
//            'entity' => $entity,
//            'titulo' => $tit
//        ));
        //REDIRIGIENDO A SHOW.HTML (YA EXISTE) MOSTRANDO EL DETALLE COMPLETO DE LA NOTICIA
        return $this->render('uniMarcaBundle:noticias:show.html.twig', array(
            'entity' => $entity            
        ));
    }
    
    /**
     * Lists all noticias entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('uniMarcaBundle:noticias')->findAll();

        return $this->render('uniMarcaBundle:noticias:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new noticias entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new noticias();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('noticias_show', array('id' => $entity->getId())));
        }

        return $this->render('uniMarcaBundle:noticias:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a noticias entity.
     *
     * @param noticias $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(noticias $entity)
    {
        $form = $this->createForm(new noticiasType(), $entity, array(
            'action' => $this->generateUrl('noticias_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new noticias entity.
     *
     */
    public function newAction()
    {
        $entity = new noticias();
        $form   = $this->createCreateForm($entity);

        return $this->render('uniMarcaBundle:noticias:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a noticias entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uniMarcaBundle:noticias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find noticias entity.');
        }

        return $this->render('uniMarcaBundle:noticias:show.html.twig', array(
            'entity'      => $entity           
        ));
    }

    /**
     * Displays a form to edit an existing noticias entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uniMarcaBundle:noticias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find noticias entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('uniMarcaBundle:noticias:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a noticias entity.
    *
    * @param noticias $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(noticias $entity)
    {
        $form = $this->createForm(new noticiasType(), $entity, array(
            'action' => $this->generateUrl('noticias_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing noticias entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('uniMarcaBundle:noticias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find noticias entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('noticias_edit', array('id' => $id)));
        }

        return $this->render('uniMarcaBundle:noticias:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a noticias entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('uniMarcaBundle:noticias')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find noticias entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('noticias'));
    }

    /**
     * Creates a form to delete a noticias entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('noticias_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
