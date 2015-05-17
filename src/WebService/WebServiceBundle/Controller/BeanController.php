<?php

namespace WebService\WebServiceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use WebService\WebServiceBundle\Entity\Bean;
use WebService\WebServiceBundle\Form\BeanType;

/**
 * Bean controller.
 *
 * @Route("/bean")
 */
class BeanController extends Controller
{

    /**
     * Lists all Bean entities.
     *
     * @Route("/", name="bean")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WebServiceWebServiceBundle:Bean')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Bean entity.
     *
     * @Route("/", name="bean_create")
     * @Method("POST")
     * @Template("WebServiceWebServiceBundle:Bean:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Bean();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bean_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Bean entity.
     *
     * @param Bean $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Bean $entity)
    {
        $form = $this->createForm(new BeanType(), $entity, array(
            'action' => $this->generateUrl('bean_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Bean entity.
     *
     * @Route("/new", name="bean_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Bean();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Bean entity.
     *
     * @Route("/{id}", name="bean_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebServiceWebServiceBundle:Bean')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bean entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Bean entity.
     *
     * @Route("/{id}/edit", name="bean_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebServiceWebServiceBundle:Bean')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bean entity.');
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
    * Creates a form to edit a Bean entity.
    *
    * @param Bean $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Bean $entity)
    {
        $form = $this->createForm(new BeanType(), $entity, array(
            'action' => $this->generateUrl('bean_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Bean entity.
     *
     * @Route("/{id}", name="bean_update")
     * @Method("PUT")
     * @Template("WebServiceWebServiceBundle:Bean:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebServiceWebServiceBundle:Bean')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bean entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('bean_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Bean entity.
     *
     * @Route("/{id}", name="bean_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WebServiceWebServiceBundle:Bean')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Bean entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('bean'));
    }

    /**
     * Creates a form to delete a Bean entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bean_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
