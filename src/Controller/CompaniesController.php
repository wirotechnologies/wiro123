<?php

namespace App\Controller;

use App\Entity\Companies;
use App\Form\CompaniesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/companies")
 */
class CompaniesController extends AbstractController
{
    /**
     * @Route("/", name="companies_index", methods="GET")
     */
    public function index(): Response
    {
        $companies = $this->getDoctrine()
            ->getRepository(Companies::class)
            ->findAll();

        return $this->render('companies/index.html.twig', ['companies' => $companies]);
    }

    /**
     * @Route("/new", name="companies_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $company = new Companies();
        $form = $this->createForm(CompaniesType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($company);
            $em->flush();

            return $this->redirectToRoute('companies_index');
        }

        return $this->render('companies/new.html.twig', [
            'company' => $company,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="companies_show", methods="GET")
     */
    public function show(Companies $company): Response
    {
        return $this->render('companies/show.html.twig', ['company' => $company]);
    }

    /**
     * @Route("/{id}/edit", name="companies_edit", methods="GET|POST")
     */
    public function edit(Request $request, Companies $company): Response
    {
        $form = $this->createForm(CompaniesType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('companies_index', ['id' => $company->getId()]);
        }

        return $this->render('companies/edit.html.twig', [
            'company' => $company,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="companies_delete", methods="DELETE")
     */
    public function delete(Request $request, Companies $company): Response
    {
        if ($this->isCsrfTokenValid('delete'.$company->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($company);
            $em->flush();
        }

        return $this->redirectToRoute('companies_index');
    }
}
