<?php

namespace App\Controller;

use App\Entity\Branches;
use App\Form\BranchesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/branches")
 */
class BranchesController extends AbstractController
{
    /**
     * @Route("/", name="branches_index", methods="GET")
     */
    public function index(): Response
    {
        $branches = $this->getDoctrine()
            ->getRepository(Branches::class)
            ->findAll();

        return $this->render('branches/index.html.twig', ['branches' => $branches]);
    }

    /**
     * @Route("/new", name="branches_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $branch = new Branches();
        $form = $this->createForm(BranchesType::class, $branch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($branch);
            $em->flush();

            return $this->redirectToRoute('branches_index');
        }

        return $this->render('branches/new.html.twig', [
            'branch' => $branch,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="branches_show", methods="GET")
     */
    public function show(Branches $branch): Response
    {
        return $this->render('branches/show.html.twig', ['branch' => $branch]);
    }

    /**
     * @Route("/{id}/edit", name="branches_edit", methods="GET|POST")
     */
    public function edit(Request $request, Branches $branch): Response
    {
        $form = $this->createForm(BranchesType::class, $branch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('branches_index', ['id' => $branch->getId()]);
        }

        return $this->render('branches/edit.html.twig', [
            'branch' => $branch,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="branches_delete", methods="DELETE")
     */
    public function delete(Request $request, Branches $branch): Response
    {
        if ($this->isCsrfTokenValid('delete'.$branch->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($branch);
            $em->flush();
        }

        return $this->redirectToRoute('branches_index');
    }
}
