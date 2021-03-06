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
use App\Form\CustomersType;
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
     * @Route("/add", name="customers_post", methods="POST")
     */
    public function add(Request $request): Response
    {
        $response = '';
        $customer = new Customers();
        $customerId = (int)$request->get('customerID');
        if($customerId){
            $customer = $this->getDoctrine()
                ->getRepository(Customers::class)
                ->find($customerId);
        }
        $form_cust = $this->createForm(CustomersType::class, $customer);
        $form_cust->handleRequest($request);


        $log  = "request: ".date("F j, Y, g:i a").' - '.$request.PHP_EOL.
        "-------------------------".PHP_EOL;
        //Save string to log, use FILE_APPEND to append.
        file_put_contents('./log_'.date("j.n.Y").'.log', $log, FILE_APPEND);


        if ($form_cust->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if ($customerId) {
                $customer->setCreatedDate(new \DateTime());
                $em->persist($customer);
                $em->flush();
                $response =  new JsonResponse(array('yes', $customer->getId(), 'bueno si'));
            }else{
                $em = $this->getDoctrine()->getManager();
                $customer->setCreatedDate(new \DateTime());
                $em->persist($customer);
                $em->flush();
                $response = new JsonResponse(array('yes', $customer->getId()));
            }

        }else{
            $response = new JsonResponse((string)$form_cust->getErrors(true ,false));
        }
        
        return $response;
    }


    /**
     * @Route("/getcustomers", name="customers_getcustomers", methods="GET")
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
     * @Route("/getcustomer", name="customers_getcustomer", methods="GET")
     */
    public function getCustomer(Request $request): Response
    {
        $response = new JsonResponse();
        $response->setData(null);
        $customer = null;
        $docid = $request->query->get('docid');
        if ($docid) {   
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
                        'idDocidTypes' => $customerData->getIdDocidTypes() ? $customerData->getIdDocidTypes()->getId() : '',
                        'coordinates' => $customerData->getCoordinates()];
                }
                $response->setData($customer);

        }
        return $response;
        
    }

    /**
     * @Route("/getinit", name="customers_getinit", methods="GET")
     */
    public function getInit(Request $request): Response
    {
        $customer = new Customers();
        $docidTypes = null;
        $syCountries = null;
        $syNeighborhoods = null;
        $socioeconomicLevels = null;
        
        $form = $this->createForm(CustomersType::class, $customer);
        $form->handleRequest($request);
        $html = (string)$this->render('customers/new.html.twig', [
            'form' => $form->createView(),
        ]);

        $array = explode('[_token]" value="', $html);
        $array2 = explode('"', $array[1]);
        $token = $array2[0];

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
        return new JsonResponse(array($docidTypes, $syCountries, $socioeconomicLevels, $syNeighborhoods, $token));
    }


    


    /**
     * ---------------------------------------------------------------
     *Symfony Autogenerated code
     * ---------------------------------------------------------------
     */

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
    

        $form = $this->createForm(CustomersType::class, $customer);
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
        $form = $this->createForm(CustomersType::class, $customer);
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
