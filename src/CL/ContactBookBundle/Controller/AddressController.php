<?php

namespace CL\ContactBookBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CL\ContactBookBundle\Entity\Address;
use CL\ContactBookBundle\Entity\Contact;
use CL\ContactBookBundle\Form\AddressType;

/**
 * Address controller.
 *
 * @Route("/address")
 */
class AddressController extends Controller {

    /**
     * Lists all Address entities.
     *
     * @Route("/", name="address")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CLContactBookBundle:Address')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Address entity.
     *
     * @Route("/", name="address_create")
     * @Method("POST")
     * @Template("CLContactBookBundle:Address:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = new Address();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('address_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Address entity.
     *
     * @param Address $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Address $entity) {
        $form = $this->createForm(new AddressType(), $entity, array(
            'action' => $this->generateUrl('address_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Address entity.
     *
     * @Route("/new", name="address_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {
        $entity = new Address();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Address entity.
     *
     * @Route("/new/{contact_id}", name="address_newForContact")
     * 
     * @Template()
     */
    public function newForContactAction(Request $request, $contact_id) {
        $entity = new Address();
        
        $url=$this->generateUrl('address_newForContact', array ( 'contact_id' => $contact_id));
        $form = $this->createAddressForContactForm($entity, $url);

        $form->handleRequest($request);
        if($form->isSubmitted()){
            $entity=$form->getData();
            $em = $this->getDoctrine()->getManager();
            $contact= $em->getRepository('CLContactBookBundle:Contact')->find($contact_id);
            $entity->setContact($contact);
            
//            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('address'));
        }
        return array(
            'entity' => $entity,
            'form' => $form->createView(),
            'contact_id' => $contact_id,
        );
    }

    private function createAddressForContactForm(Address $address, $url) {
//needs corection should 
        
        $form = $this->createFormBuilder($address)
                ->setAction($url)
                ->setMethod('POST')
                ->add('city')
                ->add('street')
                ->add('number')
                ->add('flatNumber')
                ->add('save', 'submit')
                ->getForm();
        return $form;
    }

    /**
     * Finds and displays a Address entity.
     *
     * @Route("/{id}", name="address_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CLContactBookBundle:Address')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Address entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Address entity.
     *
     * @Route("/{id}/edit", name="address_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CLContactBookBundle:Address')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Address entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a Address entity.
     *
     * @param Address $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Address $entity) {
        $form = $this->createForm(new AddressType(), $entity, array(
            'action' => $this->generateUrl('address_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Address entity.
     *
     * @Route("/{id}", name="address_update")
     * @Method("PUT")
     * @Template("CLContactBookBundle:Address:edit.html.twig")
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CLContactBookBundle:Address')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Address entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('address_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Address entity.
     *
     * @Route("/{id}", name="address_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CLContactBookBundle:Address')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Address entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('address'));
    }

    /**
     * Creates a form to delete a Address entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('address_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

}
