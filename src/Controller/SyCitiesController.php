<?php

namespace App\Controller;

use App\Entity\SyCities;
use App\Form\SyCitiesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sy/cities")
 */
class SyCitiesController extends AbstractController
{
    /**
     * @Route("/", name="sy_cities_index", methods="GET")
     */
    public function index(): Response
    {
        $syCities = $this->getDoctrine()
            ->getRepository(SyCities::class)
            ->findAll();

        return $this->render('sy_cities/index.html.twig', ['sy_cities' => $syCities]);
    }

    /**
     * @Route("/new", name="sy_cities_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $syCity = new SyCities();
        $form = $this->createForm(SyCitiesType::class, $syCity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($syCity);
            $em->flush();

            return $this->redirectToRoute('sy_cities_index');
        }

        return $this->render('sy_cities/new.html.twig', [
            'sy_city' => $syCity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sy_cities_show", methods="GET")
     */
    public function show(SyCities $syCity): Response
    {
        return $this->render('sy_cities/show.html.twig', ['sy_city' => $syCity]);
    }

    /**
     * @Route("/{id}/edit", name="sy_cities_edit", methods="GET|POST")
     */
    public function edit(Request $request, SyCities $syCity): Response
    {
        $form = $this->createForm(SyCitiesType::class, $syCity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sy_cities_index', ['id' => $syCity->getId()]);
        }

        return $this->render('sy_cities/edit.html.twig', [
            'sy_city' => $syCity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/getcities", name="sy_cities_getcities", methods="POST")
     */
    public function getCities(Request $request): Response
    {

        $syCities = null;
        $syStateId = $request->get('stateId');
        if ($request->isXMLHttpRequest() && $syStateId) {    
            $cities_data = $this->getDoctrine()
                ->getRepository(SyCities::class)
                ->findBy(['idSyStates' => $syStateId]);
            foreach ($cities_data as $syCity) {
                $syCities[] = (object) [
                'id' => $syCity->getId(),
                'name' => $syCity->getName()];
            }
        }
        return new JsonResponse($syCities);
    }

    /**
     * @Route("/{id}", name="sy_cities_delete", methods="DELETE")
     */
    public function delete(Request $request, SyCities $syCity): Response
    {
        if ($this->isCsrfTokenValid('delete'.$syCity->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($syCity);
            $em->flush();
        }

        return $this->redirectToRoute('sy_cities_index');
    }
}
