<?php

namespace WebService\WebServiceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use WebService\WebServiceBundle\Entity\Field;
use WebService\WebServiceBundle\Form\FieldType;

/**
 * Field controller.
 *
 * @Route("/field")
 */
class FieldController extends Controller
{

    /**
     * Lists all Field entities.
     *
     * @Route("/", name="field")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WebServiceWebServiceBundle:Field')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Field entity.
     *
     * @Route("/", name="field_create")
     * @Method("POST")
     * @Template("WebServiceWebServiceBundle:Field:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Field();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('field_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Field entity.
     *
     * @param Field $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Field $entity)
    {
        $form = $this->createForm(new FieldType(), $entity, array(
            'action' => $this->generateUrl('field_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Field entity.
     *
     * @Route("/new", name="field_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Field();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Field entity.
     *
     * @Route("/{id}", name="field_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebServiceWebServiceBundle:Field')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Field entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Field entity.
     *
     * @Route("/{id}/edit", name="field_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebServiceWebServiceBundle:Field')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Field entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Field entity.
    *
    * @param Field $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Field $entity)
    {
        $form = $this->createForm(new FieldType(), $entity, array(
            'action' => $this->generateUrl('field_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Field entity.
     *
     * @Route("/{id}", name="field_update")
     * @Method("PUT")
     * @Template("WebServiceWebServiceBundle:Field:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebServiceWebServiceBundle:Field')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Field entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('field_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Field entity.
     *
     * @Route("/{id}", name="field_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WebServiceWebServiceBundle:Field')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Field entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('field'));
    }

    /**
     * Creates a form to delete a Field entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('field_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
