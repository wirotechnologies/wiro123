<?php

namespace App\Controller;

use App\Entity\SyNeighborhoods;
use App\Form\SyNeighborhoodsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sy/neighborhoods")
 */
class SyNeighborhoodsController extends AbstractController
{
    /**
     * @Route("/", name="sy_neighborhoods_index", methods="GET")
     */
    public function index(): Response
    {
        $syNeighborhoods = $this->getDoctrine()
            ->getRepository(SyNeighborhoods::class)
            ->findAll();

        return $this->render('sy_neighborhoods/index.html.twig', ['sy_neighborhoods' => $syNeighborhoods]);
    }

    /**
     * @Route("/new", name="sy_neighborhoods_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $syNeighborhood = new SyNeighborhoods();
        $form = $this->createForm(SyNeighborhoodsType::class, $syNeighborhood);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($syNeighborhood);
            $em->flush();

            return $this->redirectToRoute('sy_neighborhoods_index');
        }

        return $this->render('sy_neighborhoods/new.html.twig', [
            'sy_neighborhood' => $syNeighborhood,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sy_neighborhoods_show", methods="GET")
     */
    public function show(SyNeighborhoods $syNeighborhood): Response
    {
        return $this->render('sy_neighborhoods/show.html.twig', ['sy_neighborhood' => $syNeighborhood]);
    }

    /**
     * @Route("/{id}/edit", name="sy_neighborhoods_edit", methods="GET|POST")
     */
    public function edit(Request $request, SyNeighborhoods $syNeighborhood): Response
    {
        $form = $this->createForm(SyNeighborhoodsType::class, $syNeighborhood);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sy_neighborhoods_index', ['id' => $syNeighborhood->getId()]);
        }

        return $this->render('sy_neighborhoods/edit.html.twig', [
            'sy_neighborhood' => $syNeighborhood,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/getneighborhoods", name="sy_neighborhoods_getneighborhoods", methods="POST")
     */
    public function getNeighborhoods(Request $request): Response
    {

        $syNeighborhoods = null;
        $CityId = $request->get('cityId');
        if ($request->isXMLHttpRequest() && $CityId) {    
            $neighborhoods_data = $this->getDoctrine()
                ->getRepository(SyNeighborhoods::class)
                ->findBy(['idSyCities' => $CityId]);
            foreach ($neighborhoods_data as $syNeighborhood) {
                $syNeighborhoods[] = (object) [
                'id' => $syNeighborhood->getId(),
                'name' => $syNeighborhood->getName()];
            }
        }
        return new JsonResponse($syNeighborhoods);
    }

    /**
     * @Route("/{id}", name="sy_neighborhoods_delete", methods="DELETE")
     */
    public function delete(Request $request, SyNeighborhoods $syNeighborhood): Response
    {
        if ($this->isCsrfTokenValid('delete'.$syNeighborhood->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($syNeighborhood);
            $em->flush();
        }

        return $this->redirectToRoute('sy_neighborhoods_index');
    }
}
