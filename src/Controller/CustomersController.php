<?php

namespace App\Controller;

use App\Entity\Customers;
use App\Entity\DocidTypes;
use App\Entity\SyCountries;
use App\Entity\SyNeighborhoods;
use App\Entity\SocioeconomicLevels;
use App\Entity\Addresses;
use App\Entity\CustomersAddress;
use App\Form\AddressesType;
use App\Form\Customers1Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Serializer;

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
        $form_cust = $this->createForm(Customers1Type::class, $customer);
        $form_cust->handleRequest($request);


        $address = new Addresses();
        $form_adss = $this->createForm(AddressesType::class, $address, array('csrf_protection' => false));
        $form_adss->handleRequest($request);

        $customersAddress = new CustomersAddress();

        if ($form_adss->isValid() && $form_cust->isValid()) {
            try {
                $em = $this->getDoctrine()->getManager();
                $customer->setCreatedDate(new \DateTime());
                $address->setCreatedDate(new \DateTime());
                $customersAddress->setCreatedDate(new \DateTime());
                $em->persist($customer);
                $em->persist($address);
                $em->flush();
                $customersAddress->setIdAddresses($address);
                $customersAddress->setIdCustomers($customer);
                $em->persist($customersAddress);
                $em->flush();
                return new JsonResponse('yes');
            } catch (\Doctrine\DBAL\DBALException $e) {
                return new JsonResponse($e->getMessage());
            }
        }
        else{
            return new JsonResponse((string)$form_adss->getErrors(true ,false));    
        }

        
    }


    /**
     * @Route("/getcustomers", name="customers_getcustomers", methods="GET|POST")
     */
    public function getCustomers(): Response
    {
        $customers = null;
        $data = $this->getDoctrine()
            ->getRepository(Customers::class)
            ->findAll();
        foreach ($data as $customer) {
                $customers[] = (object) [
                'id' => $customer->getId(),
                'firstName' => $customer->getFirstName(),
                'lastName' => $customer->getLastName(),
                'phone' => $customer->getPhone(),
                'email' => $customer->getEmail(),
                'docid' => $customer->getDocid()];
            }
            
        return new JsonResponse($customers);
    }


    /**
     * @Route("/getcustomer", name="customers_getcustomer", methods="GET|POST")
     */
    public function getCustomer(Request $request): Response
    {
        $response = new JsonResponse();
        $response->setData(null);
        $customer = null;
        $docid = $request->get('docid');
        if ($request->isXMLHttpRequest() && $docid) {   
            $customerData = $this->getDoctrine()
                ->getRepository(Customers::class)
                ->findOneBy(['docid' => $docid]);
                if($customerData){
                    $customer = (object) [
                        'id' => $customerData->getId(),
                        'firstName' => $customerData->getFirstName(),
                        'lastName' => $customerData->getLastName(),
                        'phone' => $customerData->getPhone(),
                        'email' => $customerData->getEmail(),
                        'reference1' => $customerData->getReference1(),
                        'phoneReference1' => $customerData->getPhoneReference1(),
                        'docid' => $customerData->getDocid(),
                        'coordinates' => $customerData->getCoordinates()];
                }
                $response->setData($customer);

        }
        return $response;
        
    }



    /**
     * @Route("/gettoken", name="customers_gettoken", methods="GET|POST")
     */
    public function getToken(Request $request): Response
    {
        $customer = new Customers();
        $form = $this->createForm(Customers1Type::class, $customer);
        $form->handleRequest($request);
        $html = $this->render('customers/new.html.twig', [
            'form' => $form->createView(),
        ]);

        return $html;
    }


    /**
     * @Route("/getinit", name="customers_getinit", methods="GET|POST")
     */
    public function getInit(Request $request): Response
    {
        $docidTypes = null;
        $syCountries = null;
        $syNeighborhoods = null;
        $socioeconomicLevels = null;
        $docid_data = $this->getDoctrine()
            ->getRepository(DocidTypes::class)
            ->findAll();

        $countries_data = $this->getDoctrine()
            ->getRepository(SyCountries::class)
            ->findAll();

        $leves_data = $this->getDoctrine()
            ->getRepository(SocioeconomicLevels::class)
            ->findAll();

        $neighborhoods_data = $this->getDoctrine()
            ->getRepository(SyNeighborhoods::class)
            ->findAll();

        foreach ($docid_data as $docidType) {
            $docidTypes[] = (object) [
            'id' => $docidType->getId(),
            'name' => $docidType->getName()];
        }

        foreach ($countries_data as $syCountry) {
            $syCountries[] = (object) [
            'id' => $syCountry->getId(),
            'name' => $syCountry->getName()];
        }

        foreach ($leves_data as $socioeconomicLevel) {
            $socioeconomicLevels[] = (object) [
            'id' => $socioeconomicLevel->getId(),
            'name' => $socioeconomicLevel->getName()];
        }

        foreach ($neighborhoods_data as $syNeighborhood) {
            $syNeighborhoods[] = (object) [
            'id' => $syNeighborhood->getId(),
            'name' => $syNeighborhood->getName()];
        }


        //self::getToken($request)
        return new JsonResponse(array($docidTypes, $syCountries, $socioeconomicLevels, $syNeighborhoods));
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
