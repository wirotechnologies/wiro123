<?php

namespace App\Controller;

use App\Entity\CustomersAddress;
use App\Form\CustomersAddressType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/customers/address")
 */
class CustomersAddressController extends AbstractController
{
    /**
     * @Route("/", name="customers_address_index", methods="GET")
     */
    public function index(): Response
    {
        $customersAddresses = $this->getDoctrine()
            ->getRepository(CustomersAddress::class)
            ->findAll();

        return $this->render('customers_address/index.html.twig', ['customers_addresses' => $customersAddresses]);
    }

    /**
     * @Route("/new", name="customers_address_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $customersAddress = new CustomersAddress();
        $form = $this->createForm(CustomersAddressType::class, $customersAddress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($customersAddress);
            $em->flush();

            return $this->redirectToRoute('customers_address_index');
        }

        return $this->render('customers_address/new.html.twig', [
            'customers_address' => $customersAddress,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="customers_address_show", methods="GET")
     */
    public function show(CustomersAddress $customersAddress): Response
    {
        return $this->render('customers_address/show.html.twig', ['customers_address' => $customersAddress]);
    }

    /**
     * @Route("/{id}/edit", name="customers_address_edit", methods="GET|POST")
     */
    public function edit(Request $request, CustomersAddress $customersAddress): Response
    {
        $form = $this->createForm(CustomersAddressType::class, $customersAddress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('customers_address_index', ['id' => $customersAddress->getId()]);
        }

        return $this->render('customers_address/edit.html.twig', [
            'customers_address' => $customersAddress,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="customers_address_delete", methods="DELETE")
     */
    public function delete(Request $request, CustomersAddress $customersAddress): Response
    {
        if ($this->isCsrfTokenValid('delete'.$customersAddress->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($customersAddress);
            $em->flush();
        }

        return $this->redirectToRoute('customers_address_index');
    }
}
