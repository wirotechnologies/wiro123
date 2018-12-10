<?php

namespace App\Controller;

use App\Entity\Invoices;
use App\Form\InvoicesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method; 


/**
 * @Route("/invoices")
 */
class InvoicesController extends AbstractController
{
    /**
     * @Route("/", name="invoices_index", methods="GET")
     */
    public function index(): Response
    {
        $invoices = $this->getDoctrine()
            ->getRepository(Invoices::class)
            ->findAll();

        return $this->render('invoices/index.html.twig', ['invoices' => $invoices]);
    }

    /**
     * @Route("/report", name="invoices_report", methods="GET")
     */
    public function report(): Response
    {

        return $this->render('invoices/report.html.twig');
    }

    /**
     * @Route("/new", name="invoices_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $invoice = new Invoices();
        $form = $this->createForm(InvoicesType::class, $invoice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($invoice);
            $em->flush();

            return $this->redirectToRoute('invoices_index');
        }

        return $this->render('invoices/new.html.twig', [
            'invoice' => $invoice,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="invoices_show", methods="GET")
     */
    public function show(Invoices $invoice): Response
    {
        return $this->render('invoices/show.html.twig', ['invoice' => $invoice]);
    }

    /**
     * @Route("/{id}/edit", name="invoices_edit", methods="GET|POST")
     */
    public function edit(Request $request, Invoices $invoice): Response
    {
        $form = $this->createForm(InvoicesType::class, $invoice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('invoices_index', ['id' => $invoice->getId()]);
        }

        return $this->render('invoices/edit.html.twig', [
            'invoice' => $invoice,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="invoices_delete", methods="DELETE")
     */
    public function delete(Request $request, Invoices $invoice): Response
    {
        if ($this->isCsrfTokenValid('delete'.$invoice->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($invoice);
            $em->flush();
        }

        
    }


    /**                      
     * @Route("/ajax", name="_invoices_ajax")
    */
    public function ajax(Request $request)    
    {
        if ($request->isXMLHttpRequest()) {         
        return new JsonResponse(array('data' => $request->get('name')));
    }

    return new Response('This is not ajax!', 400);
    }
}
