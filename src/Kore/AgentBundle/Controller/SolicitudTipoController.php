<?php

namespace Kore\AgentBundle\Controller;

use Kore\AdminBundle\Entity\SolicitudTipo;
use Kore\AgentBundle\Form\SolicitudTipoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Solicitudestado controller.
 *
 */
class SolicitudTipoController extends Controller
{

    /**
     * Lists all SolicitudTipo entities.
     *
     */
    public function indexAction(Request $request)
    {
        $sort = $request->query->get('sort');
        $direction = $request->query->get('direction');
        $em = $this->getDoctrine()->getManager();
        if($sort) $solicitudTipos = $em->getRepository('KoreAdminBundle:SolicitudTipo')->findBy(array(), array($sort => $direction));
        else $solicitudTipos = $em->getRepository('KoreAdminBundle:SolicitudTipo')->findAll();
        $paginator = $this->get('knp_paginator');
        $solicitudTipos = $paginator->paginate($solicitudTipos, $request->query->getInt('page', 1), 100);

        $deleteForms = array();
        foreach($solicitudTipos as $key => $solicitudTipo) {
            $deleteForms[] = $this->createDeleteForm($solicitudTipo)->createView();
        }

        return $this->render('KoreAgentBundle:SolicitudTipo:index.html.twig', array(
            'solicitudTipos' => $solicitudTipos,
            'direction' => $direction,
            'sort' => $sort,
            'deleteForms' => $deleteForms,
        ));
    }

    /**
     * Creates a new SolicitudTipo entity.
     *
     */
    public function newAction(Request $request)
    {
        $solicitudTipo = new SolicitudTipo();
        $newForm = $this->createNewForm($solicitudTipo);
        $newForm->handleRequest($request);

        if ($newForm->isSubmitted()) {
            if($newForm->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($solicitudTipo);
                $em->flush();
                $request->getSession()->getFlashBag()->add( 'success', 'solicitudtipo.new.flash' );
                return $this->redirect($this->generateUrl('agent_solicitudtipo_index'));
            }
        }

        return $this->render('KoreAgentBundle:SolicitudTipo:new.html.twig', array(
            'newForm' => $newForm->createView(),
        ));
    }

    /**
     * Creates a form to create a new SolicitudTipo entity.
     *
     * @param SolicitudTipo $solicitudTipo The SolicitudTipo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createNewForm(SolicitudTipo $solicitudTipo)
    {
        return $this->createForm(new SolicitudTipoType(), $solicitudTipo, array(
            'action' => $this->generateUrl('agent_solicitudtipo_new'),
        ));
    }

    /**
     * Finds and displays a SolicitudTipo entity.
     *
     */
    public function showAction(SolicitudTipo $solicitudTipo)
    {
        $editForm = $this->createEditForm($solicitudTipo);
        $deleteForm = $this->createDeleteForm($solicitudTipo);

        return $this->render('KoreAgentBundle:SolicitudTipo:show.html.twig', array(
            'solicitudTipo' => $solicitudTipo,
            'editForm' => $editForm->createView(),
            'deleteForm' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SolicitudTipo entity.
     *
     */
    public function editAction(Request $request, SolicitudTipo $solicitudTipo)
    {
        $editForm = $this->createEditForm($solicitudTipo);
        $deleteForm = $this->createDeleteForm($solicitudTipo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted()) {
            if($editForm->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($solicitudTipo);
                $em->flush();
                $request->getSession()->getFlashBag()->add( 'success', 'solicitudtipo.edit.flash' );
                return $this->redirect($this->generateUrl('agent_solicitudtipo_index'));
            }
        }

        return $this->render('KoreAgentBundle:SolicitudTipo:edit.html.twig', array(
            'solicitudTipo' => $solicitudTipo,
            'editForm' => $editForm->createView(),
            'deleteForm' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a SolicitudTipo entity.
     *
     * @param SolicitudTipo $solicitudTipo The SolicitudTipo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(SolicitudTipo $solicitudTipo)
    {
        return $this->createForm(new SolicitudTipoType(), $solicitudTipo, array(
            'action' => $this->generateUrl('agent_solicitudtipo_edit', array('id' => $solicitudTipo->getId())),
        ));
    }

    /**
     * Deletes a SolicitudTipo entity.
     *
     */
    public function deleteAction(Request $request, SolicitudTipo $solicitudTipo)
    {
        $deleteForm = $this->createDeleteForm($solicitudTipo);
        $deleteForm->handleRequest($request);

        if ($deleteForm->isSubmitted() && $deleteForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($solicitudTipo);
            $em->flush();
            $request->getSession()->getFlashBag()->add( 'danger', 'solicitudtipo.delete.flash' );
        }

        return $this->redirect($this->generateUrl('agent_solicitudtipo_index'));
    }

    /**
     * Creates a form to delete a SolicitudTipo entity.
     *
     * @param SolicitudTipo $solicitudTipo The SolicitudTipo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SolicitudTipo $solicitudTipo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('agent_solicitudtipo_delete', array('id' => $solicitudTipo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
