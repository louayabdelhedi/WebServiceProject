<?php

namespace WebService\WebServiceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use WebService\WebServiceBundle\Entity\WebService;
use WebService\WebServiceBundle\Form\WebServiceType;

/**
 * WebService controller.
 *
 * @Route("/webservice")
 */
class WebServiceController extends Controller
{

    /**
     * Lists all WebService entities.
     *
     * @Route("/", name="webservice")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WebServiceWebServiceBundle:WebService')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new WebService entity.
     *
     * @Route("/", name="webservice_create")
     * @Method("POST")
     * @Template("WebServiceWebServiceBundle:WebService:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new WebService();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('webservice_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a WebService entity.
     *
     * @param WebService $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(WebService $entity)
    {
        $form = $this->createForm(new WebServiceType(), $entity, array(
            'action' => $this->generateUrl('webservice_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new WebService entity.
     *
     * @Route("/new", name="webservice_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new WebService();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a WebService entity.
     *
     * @Route("/{id}", name="webservice_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebServiceWebServiceBundle:WebService')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find WebService entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing WebService entity.
     *
     * @Route("/{id}/edit", name="webservice_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebServiceWebServiceBundle:WebService')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find WebService entity.');
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
    * Creates a form to edit a WebService entity.
    *
    * @param WebService $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(WebService $entity)
    {
        $form = $this->createForm(new WebServiceType(), $entity, array(
            'action' => $this->generateUrl('webservice_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing WebService entity.
     *
     * @Route("/{id}", name="webservice_update")
     * @Method("PUT")
     * @Template("WebServiceWebServiceBundle:WebService:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WebServiceWebServiceBundle:WebService')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find WebService entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('webservice_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a WebService entity.
     *
     * @Route("/{id}", name="webservice_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WebServiceWebServiceBundle:WebService')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find WebService entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('webservice'));
    }

    /**
     * Creates a form to delete a WebService entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('webservice_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
