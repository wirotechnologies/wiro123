<?php

namespace App\Controller;

use App\Entity\Customers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/customer")
 */
class CustomerApiController extends AbstractController
{


    /**
     * @Route("/api/", name="api_post", methods="POST")
     */
    public function proof(Request $request): Response
    {
        $customer = new Customers();
        $response = null;
        $reqCustomer = $request->get('customer');
        if(!$reqCustomer){
            $em = $this->getDoctrine()->getManager();
            $customer->setFirstName($reqCustomer['firstName'] );
            $customer->setLastName($reqCustomer['lastName']);
            $customer->setAddress($reqCustomer['address']);
            $customer->setPhone($reqCustomer['phone']);
            $customer->setEmail($reqCustomer['email']);
            //$customer->setReference1($reqCustomer['reference1']);
            //$customer->setPhoneReference1($reqCustomer['phoneReference1']);
            $customer->setDocid($reqCustomer['docid']);
            $customer->setCoordinates($reqCustomer['coordinates']);
            $customer->setCreatedDate(new \DateTime());
            $em->persist($customer);
            $em->flush();
            $reqCustomer['id'] = $customer->getId();
            $response = $reqCustomer;
        }
        else{
            $tmp['message'] = "The data is empty";
            $response = $tmp;
        }
        
        return new JsonResponse($response);
    }

    /**
     * @Route("/api/", name="api_get", methods="GET")
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
}
