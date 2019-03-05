<?php
// api/src/DataPersister/SuperCustomersDataPersister.php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\SuperCustomers;
use App\Entity\Customers;
use App\Entity\CustomersAddress;
use App\Entity\DocidTypes;
use App\Entity\Contracts;
use App\Entity\ContractTypes;
use App\Entity\Recurrence;
use App\Entity\Branches;
use App\Entity\ContractProducts;
use App\Entity\Products;
use App\Entity\StatusCauses;
use App\Entity\ContractsContractStatuses;
use App\Entity\ContractAddress;
use App\Entity\Addresses;
use App\Entity\SyNeighborhoods;
use App\Entity\SocioeconomicLevels;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

final class SuperCustomersDataPersister implements DataPersisterInterface 
{
    
    private $itemExtensions;

    public function __construct(ManagerRegistry $managerRegistry)
    {
      $this->managerRegistry = $managerRegistry;
    }
    
    
    public function supports($data): bool
    {
        return $data instanceof SuperCustomers;
    }
    
    public function persist($data)
    {
        //$em = $this->getDoctrine()->getManager();
        $customer = new Customers();
        $manager = $this->managerRegistry->getManagerForClass(Customers::class);
        if($data->id){
            $customer = $manager->getRepository(Customers::class)
                ->find($data->id);
            $data->firstName ? $customer->setFirstName($data->firstName) : null;
            $data->lastName ? $customer->setLastName($data->lastName) : null;
            $data->phone ? $customer->setPhone($data->phone) : null;
            $data->email ? $customer->setEmail($data->email) : null;
            $data->reference1 ? $customer->setReference1($data->reference1) : null;
            $data->phoneReference1 ? $customer->setPhoneReference1($data->phoneReference1) : null;
            $data->docid ? $customer->setDocid($data->docid) : null;
             $docidTypes =  $data->idDocidTypes ? $manager->getRepository(DocidTypes::class)
                ->find($data->idDocidTypes) : null;
            $data->idDocidTypes ? $customer->setIdDocidTypes($docidTypes) : null;
            $CustomerBranches =  $data->CustomerIdBranches ? $manager->getRepository(Branches::class)
                ->find($data->CustomerIdBranches) : null;
            $data->CustomerIdBranches ? $customer->setIdBranches($CustomerBranches) : null;    
        }
        else{
            //Customer
            if(!$data->email && !$data->phone)
                throw new \RuntimeException('email or phone: One of this values should not be null.');
            
            $customer->setFirstName($data->firstName);
            $customer->setLastName($data->lastName);
            $customer->setPhone($data->phone);
            $customer->setEmail($data->email);
            $customer->setReference1($data->reference1);
            $customer->setPhoneReference1($data->phoneReference1);
            $customer->setDocid($data->docid);
            $docidTypes =  $data->idDocidTypes ? $manager->getRepository(DocidTypes::class)
                ->find($data->idDocidTypes) : null;
            $customer->setIdDocidTypes($docidTypes);
            $CustomerBranches =  $data->CustomerIdBranches ? $manager->getRepository(Branches::class)
                ->find($data->CustomerIdBranches) : null;
            $customer->setIdBranches($CustomerBranches);
            $customer->setCreatedDate(new \DateTime());
            
        }
        $manager->persist($customer);
        //customerAddresses
        $address = null;
        if($data->customerIdAddresses || ($data->customerAddress1 && $data->customerIdSyNeighborhoods && $data->customerIdSocioeconomicLevels)){
            $customerAddress = new CustomersAddress();
            if ($data->customerIdAddresses && $data->customerIdAddresses > 0){
                $address = $data->customerIdAddresses ? $manager->getRepository(Addresses::class)
                    ->find($data->customerIdAddresses) : null;
            }
            else{
                $address = new Addresses();
                $address->setAddress1($data->customerAddress1);
                $address->setAddress2($data->customerAddress2);
                $address->setZipcode($data->customerZipcode);
                $syNeighborhoods = $data->customerIdSyNeighborhoods ? $manager->getRepository(SyNeighborhoods::class)
                    ->find($data->customerIdSyNeighborhoods) : null;
                $address->setIdSyNeighborhoods($syNeighborhoods);
                $socioeconomicLevels = $data->customerIdSocioeconomicLevels ? $manager->getRepository(SocioeconomicLevels::class)
                    ->find($data->customerIdSocioeconomicLevels) : null;
                $address->setIdSocioeconomicLevels($socioeconomicLevels);
                $address->setCreatedDate(new \DateTime());
                $manager->persist($address);
                $data->customerIdAddresses = $address->getId();
            }
            $customerAddress->setIdAddresses($address);
            $customerAddress->setIdCustomers($customer);
            $customerAddress->setCreatedDate(new \DateTime());
            $manager->persist($customerAddress);
            
        }else{
            throw new \RuntimeException('Customer Address: This value should not be null.');
        }
        //Contract

        for ($i=0; $i < count($data->idContracts); $i++) { 
            $idContracts = array($data->idContracts[$i])[0];
            $contract = new Contracts();
            $contract->setNumber($idContracts['number']);
            $contract->setBalance("0");
            $contract->setStart(new \DateTime($idContracts['start']));
            $contract->setIdCustomers($customer);
            $contractTypes =  $idContracts['idContractTypes'] ? $manager->getRepository(ContractTypes::class)
                ->find($idContracts['idContractTypes']) : null;
            $contract->setIdContractTypes($contractTypes);
            $recurrence =  $idContracts['idRecurrence'] ? $manager->getRepository(Recurrence::class)
                ->find($idContracts['idRecurrence']) : null;
            $contract->setIdRecurrence($recurrence);
            $ContractBranches =  $idContracts['ContractIdBranches'] ? $manager->getRepository(Branches::class)
                ->find($idContracts['ContractIdBranches']) : null;
            $contract->setIdBranches($ContractBranches);
            $contract->setCreatedDate(new \DateTime());
            $manager->persist($contract);
            //Product
            if($idContracts['idProducts']){
                foreach ($idContracts['idProducts'] as &$idProduct) {
                    $product =  $idProduct ? $manager->getRepository(Products::class)
                        ->find($idProduct) : null;
                    if($product){
                        $contractProducts = new ContractProducts();
                        $contractProducts->setIdContracts($contract);
                        $contractProducts->setIdProducts($product);
                        $contractProducts->setCreatedDate(new \DateTime());
                        $manager->persist($contractProducts);
                    }
                }
            }
            //StatusCauses
            if (!$idContracts['idStatusCauses']) {
                throw new \RuntimeException('idStatusCauses: This value should not be null.');
            }else{
                $contractStatuses = new ContractsContractStatuses();
                $statusCauses = $idContracts['idStatusCauses'] ? $manager->getRepository(StatusCauses::class)
                    ->find($idContracts['idStatusCauses']) : null;
                $contractStatuses->setIdContractStatuses($statusCauses);
                $contractStatuses->setIdContracts($contract);
                $contractStatuses->setCreatedDate(new \DateTime());
                $manager->persist($contractStatuses);
            }
            //contractAddresses
            if($idContracts['same']){
                $contractAddress = new ContractAddress();
                $contractAddress->setIdAddresses($address);
                $contractAddress->setIdContracts($contract);
                $contractAddress->setCreatedDate(new \DateTime());
                $manager->persist($contractAddress);
            }
            else{
                if($idContracts['contractIdAddresses'] || ($idContracts['contractAddress1'] && $idContracts['contractIdSyNeighborhoods'] && $idContracts['contractIdSocioeconomicLevels'])){
                    $contractAddress = new ContractAddress();
                    if ($idContracts['contractIdAddresses'] && $idContracts['contractIdAddresses'] > 0){
                        $contAddress = $idContracts['contractIdAddresses'] ? $manager->getRepository(Addresses::class)
                            ->find($idContracts['contractIdAddresses']) : null;
                    }
                    else{
                        $contAddress = new Addresses();
                        $contAddress->setAddress1($idContracts['contractAddress1']);
                        $contAddress->setAddress2($idContracts['contractAddress2']);
                        $contAddress->setZipcode($idContracts['contractZipcode']);
                        $syNeighborhoods = $idContracts['contractIdSyNeighborhoods'] ? $manager->getRepository(SyNeighborhoods::class)
                            ->find($idContracts['contractIdSyNeighborhoods']) : null;
                        $contAddress->setIdSyNeighborhoods($syNeighborhoods);
                        $socioeconomicLevels = $idContracts['contractIdSocioeconomicLevels'] ? $manager->getRepository(SocioeconomicLevels::class)
                            ->find($idContracts['contractIdSocioeconomicLevels']) : null;
                        $contAddress->setIdSocioeconomicLevels($socioeconomicLevels);
                        $contAddress->setCreatedDate(new \DateTime());
                        $manager->persist($contAddress);
                        $idContracts['contractIdAddresses'] = $contAddress->getId();
                    }
                    $contractAddress->setIdAddresses($contAddress);
                    $contractAddress->setIdContracts($contract);
                    $contractAddress->setCreatedDate(new \DateTime());
                    $manager->persist($contractAddress);
                }else{
                    throw new \RuntimeException('Contract Address: This value should not be null.');
                }
            }
        }
        $manager->flush();
        
      
    
        
        //file_put_contents('./log_'.date("j.n.Y").'.log', "persist".PHP_EOL, FILE_APPEND);
        return $customer->getId();
    }
    
    
    public function remove($data)
    {
      throw new \RuntimeException('"remove" is not supported');
    }
}