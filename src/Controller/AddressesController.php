<?php

namespace App\Controller;

use App\Entity\Addresses;
use App\Form\AddressesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/addresses")
 */
class AddressesController extends AbstractController
{
    /**
     * @Route("/", name="addresses_index", methods="GET")
     */
    public function index(): Response
    {
        $addresses = $this->getDoctrine()
            ->getRepository(Addresses::class)
            ->findAll();

        return $this->render('addresses/index.html.twig', ['addresses' => $addresses]);
    }

    /**
     * @Route("/new", name="addresses_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $address = new Addresses();
        $form = $this->createForm(AddressesType::class, $address);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($address);
            $em->flush();

            return $this->redirectToRoute('addresses_index');
        }

        return $this->render('addresses/new.html.twig', [
            'address' => $address,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="addresses_show", methods="GET")
     */
    public function show(Addresses $address): Response
    {
        return $this->render('addresses/show.html.twig', ['address' => $address]);
    }

    /**
     * @Route("/{id}/edit", name="addresses_edit", methods="GET|POST")
     */
    public function edit(Request $request, Addresses $address): Response
    {
        $form = $this->createForm(AddressesType::class, $address);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('addresses_index', ['id' => $address->getId()]);
        }

        return $this->render('addresses/edit.html.twig', [
            'address' => $address,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="addresses_delete", methods="DELETE")
     */
    public function delete(Request $request, Addresses $address): Response
    {
        if ($this->isCsrfTokenValid('delete'.$address->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($address);
            $em->flush();
        }

        return $this->redirectToRoute('addresses_index');
    }
}
