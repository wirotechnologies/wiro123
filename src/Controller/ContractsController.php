<?php

namespace App\Controller;

use App\Entity\Contracts;
use App\Form\ContractsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contracts")
 */
class ContractsController extends AbstractController
{
    /**
     * @Route("/", name="contracts_index", methods="GET")
     */
    public function index(): Response
    {
        $contracts = $this->getDoctrine()
            ->getRepository(Contracts::class)
            ->findAll();

        return $this->render('contracts/index.html.twig', ['contracts' => $contracts]);
    }

    /**
     * @Route("/new", name="contracts_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $contract = new Contracts();
        $form = $this->createForm(ContractsType::class, $contract);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contract);
            $em->flush();

            return $this->redirectToRoute('contracts_index');
        }

        return $this->render('contracts/new.html.twig', [
            'contract' => $contract,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contracts_show", methods="GET")
     */
    public function show(Contracts $contract): Response
    {
        return $this->render('contracts/show.html.twig', ['contract' => $contract]);
    }

    /**
     * @Route("/{id}/edit", name="contracts_edit", methods="GET|POST")
     */
    public function edit(Request $request, Contracts $contract): Response
    {
        $form = $this->createForm(ContractsType::class, $contract);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contracts_index', ['id' => $contract->getId()]);
        }

        return $this->render('contracts/edit.html.twig', [
            'contract' => $contract,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contracts_delete", methods="DELETE")
     */
    public function delete(Request $request, Contracts $contract): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contract->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contract);
            $em->flush();
        }

        return $this->redirectToRoute('contracts_index');
    }
}
