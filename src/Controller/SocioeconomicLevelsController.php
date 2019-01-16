<?php

namespace App\Controller;

use App\Entity\SocioeconomicLevels;
use App\Form\SocioeconomicLevelsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/socioeconomic/levels")
 */
class SocioeconomicLevelsController extends AbstractController
{
    /**
     * @Route("/", name="socioeconomic_levels_index", methods="GET")
     */
    public function index(): Response
    {
        $socioeconomicLevels = $this->getDoctrine()
            ->getRepository(SocioeconomicLevels::class)
            ->findAll();

        return $this->render('socioeconomic_levels/index.html.twig', ['socioeconomic_levels' => $socioeconomicLevels]);
    }

    /**
     * @Route("/new", name="socioeconomic_levels_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $socioeconomicLevel = new SocioeconomicLevels();
        $form = $this->createForm(SocioeconomicLevelsType::class, $socioeconomicLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($socioeconomicLevel);
            $em->flush();

            return $this->redirectToRoute('socioeconomic_levels_index');
        }

        return $this->render('socioeconomic_levels/new.html.twig', [
            'socioeconomic_level' => $socioeconomicLevel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="socioeconomic_levels_show", methods="GET")
     */
    public function show(SocioeconomicLevels $socioeconomicLevel): Response
    {
        return $this->render('socioeconomic_levels/show.html.twig', ['socioeconomic_level' => $socioeconomicLevel]);
    }

    /**
     * @Route("/{id}/edit", name="socioeconomic_levels_edit", methods="GET|POST")
     */
    public function edit(Request $request, SocioeconomicLevels $socioeconomicLevel): Response
    {
        $form = $this->createForm(SocioeconomicLevelsType::class, $socioeconomicLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('socioeconomic_levels_index', ['id' => $socioeconomicLevel->getId()]);
        }

        return $this->render('socioeconomic_levels/edit.html.twig', [
            'socioeconomic_level' => $socioeconomicLevel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="socioeconomic_levels_delete", methods="DELETE")
     */
    public function delete(Request $request, SocioeconomicLevels $socioeconomicLevel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$socioeconomicLevel->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($socioeconomicLevel);
            $em->flush();
        }

        return $this->redirectToRoute('socioeconomic_levels_index');
    }
}
