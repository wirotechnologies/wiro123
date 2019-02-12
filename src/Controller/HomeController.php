<?php

namespace App\Controller;

use App\Entity\Customers;
use App\Entity\DocidTypes;
use App\Entity\SyCountries;
use App\Entity\SyNeighborhoods;
use App\Entity\SocioeconomicLevels;
use App\Entity\Addresses;
use App\Entity\CustomersAddress;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/home")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index", methods="GET")
     */
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }



    /**
     * @Route("/proof", name="proof", methods="POST")
     */
    public function proof(): Response
    {
        return new JsonResponse('yes');
    }

    public function handle($pData){
        $customer = null;
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
}
