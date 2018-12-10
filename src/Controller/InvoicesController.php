<?php

namespace App\Controller;

use App\Entity\Invoices;
use App\Form\Invoices1Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

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
     * @Route("/new", name="invoices_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $invoice = new Invoices();
        $form = $this->createForm(Invoices1Type::class, $invoice);
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
     * @Route("/report", name="invoices_report", methods="GET")
     */
    public function report(): Response
    {

        return $this->render('invoices/report.html.twig');
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
        $form = $this->createForm(Invoices1Type::class, $invoice);
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

        return $this->redirectToRoute('invoices_index');
    }
    
    
    
    /**                      
     * @Route("/ajax", name="_invoices_ajax")
    */
    public function ajax(Request $request)    
    {
        $invoices = null;
        if ($request->isXMLHttpRequest()) {    
            $fromDate = $request->get('from_date');
            $toDate = $request->get('to_date');
            $qb = $this->getDoctrine()->getManager();
            $qb = $qb->createQueryBuilder();
            $qb->select('i')
                ->from('App\Entity\Invoices', 'i')
                ->where('i.invoiceDate >= :fromDate')
                ->andWhere('i.invoiceDate <= :toDate')
                ->setParameter(':fromDate', $fromDate.' 00:00:00')
                ->setParameter(':toDate', $toDate.' 23:59:59');
            
            $result = $qb->getQuery()->getResult();
            
            foreach ($result as $invoice) {
                $invoices[] = (object) [
                                'id' => $invoice->getId(),
                                'invoice_date' => $invoice->getInvoiceDate(),
                                'totalValue' => $invoice->getTotalValue(),
                                'deadlinePay' => $invoice->getDeadlinePay(),
                                'newBalance' => $invoice->getNewBalance(),
                                'referencePayment' => $invoice->getReferencePayment(),
                                'docid' => $invoice->getDocid()];
            }
            
            return new JsonResponse($invoices);
        }
        else{
            return new JsonResponse($invoices);
        }
    }
    
    
}
