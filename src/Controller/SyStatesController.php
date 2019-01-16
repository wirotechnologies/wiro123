<?php

namespace App\Controller;

use App\Entity\SyStates;
use App\Form\SyStatesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sy/states")
 */
class SyStatesController extends AbstractController
{
    /**
     * @Route("/", name="sy_states_index", methods="GET")
     */
    public function index(): Response
    {
        $syStates = $this->getDoctrine()
            ->getRepository(SyStates::class)
            ->findAll();

        return $this->render('sy_states/index.html.twig', ['sy_states' => $syStates]);
    }

    /**
     * @Route("/new", name="sy_states_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $syState = new SyStates();
        $form = $this->createForm(SyStatesType::class, $syState);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($syState);
            $em->flush();

            return $this->redirectToRoute('sy_states_index');
        }

        return $this->render('sy_states/new.html.twig', [
            'sy_state' => $syState,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sy_states_show", methods="GET")
     */
    public function show(SyStates $syState): Response
    {
        return $this->render('sy_states/show.html.twig', ['sy_state' => $syState]);
    }

    /**
     * @Route("/{id}/edit", name="sy_states_edit", methods="GET|POST")
     */
    public function edit(Request $request, SyStates $syState): Response
    {
        $form = $this->createForm(SyStatesType::class, $syState);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sy_states_index', ['id' => $syState->getId()]);
        }

        return $this->render('sy_states/edit.html.twig', [
            'sy_state' => $syState,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/getstates", name="sy_states_getstates", methods="POST")
     */
    public function getStates(Request $request): Response
    {

        $syStates = null;
        $syCountryId = $request->get('countryId');
        if ($request->isXMLHttpRequest() && $syCountryId) {    
            $states_data = $this->getDoctrine()
                ->getRepository(SyStates::class)
                ->findBy(['idSyCountries' => $syCountryId]);
            foreach ($states_data as $syState) {
                $syStates[] = (object) [
                'id' => $syState->getId(),
                'name' => $syState->getName()];
            }
        }
        return new JsonResponse($syStates);
    }

    /**
     * @Route("/{id}", name="sy_states_delete", methods="DELETE")
     */
    public function delete(Request $request, SyStates $syState): Response
    {
        if ($this->isCsrfTokenValid('delete'.$syState->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($syState);
            $em->flush();
        }

        return $this->redirectToRoute('sy_states_index');
    }
}
