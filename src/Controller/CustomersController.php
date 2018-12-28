<?php

namespace App\Controller;

use App\Entity\Customers;
use App\Form\Customers1Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/customers")
 */
class CustomersController extends AbstractController
{
    /**
     * @Route("/", name="customers_index", methods="GET")
     */
    public function index(): Response
    {
        $customers = $this->getDoctrine()
            ->getRepository(Customers::class)
            ->findAll();

        return $this->render('customers/index.html.twig', ['customers' => $customers]);
    }

    /**
     * @Route("/new", name="customers_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $customer = new Customers();
    

        $form = $this->createForm(Customers1Type::class, $customer);
        $form->handleRequest($request);
        $tmp = $this->render('customers/new.html.twig', [
            'customer' => $customer,
            'form' => $form->createView(),
        ]);
        $log  = "Form: ".$tmp.'/nRequest: '.$request;
        file_put_contents('./log_'.date("j.n.Y").'.log', $log, FILE_APPEND);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($customer);
            $em->flush();

            return $this->redirectToRoute('customers_index');
        }

        return $this->render('customers/new.html.twig', [
            'customer' => $customer,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/post", name="customers_post", methods="GET|POST")
     */
    public function post(Request $request): Response
    {
        $customer = new Customers();
        $form = $this->createForm(Customers1Type::class, $customer);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($customer);
            $em->flush();

            return new JsonResponse('yes');
        }
        else{
            return new JsonResponse('no');    
        }

        
    }



    /**
     * @Route("/gettoken", name="customers_gettoken", methods="GET|POST")
     */
    public function getToken(Request $request): Response
    {
        //$html = file_get_contents('http://localhost:8080/customers/new');
        //$array = explode('[_token]" value="',$html);
        //$array = explode('"',$array[1]);


        $customer = new Customers();
        $form = $this->createForm(Customers1Type::class, $customer);
        $form->handleRequest($request);
        $html = $this->render('customers/new.html.twig', [
            'form' => $form->createView(),
        ]);
        return $html;
        //$csrfToken = $this->get('security.csrf.token_manager')->refreshToken('authenticate')->getValue();
        //return new JsonResponse($csrfToken);
    }


    /**
     * @Route("/{id}", name="customers_show", methods="GET")
     */
    public function show(Customers $customer): Response
    {
        return $this->render('customers/show.html.twig', ['customer' => $customer]);
    }

    /**
     * @Route("/{id}/edit", name="customers_edit", methods="GET|POST")
     */
    public function edit(Request $request, Customers $customer): Response
    {
        $form = $this->createForm(Customers1Type::class, $customer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('customers_index', ['id' => $customer->getId()]);
        }

        return $this->render('customers/edit.html.twig', [
            'customer' => $customer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="customers_delete", methods="DELETE")
     */
    public function delete(Request $request, Customers $customer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$customer->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($customer);
            $em->flush();
        }

        return $this->redirectToRoute('customers_index');
    }
}
