<?php
// api/src/DataProvider/SuperCustomersDataProvider.php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use ApiPlatform\Core\Exception\ResourceClassNotSupportedException;
use App\Entity\SuperCustomers;
use App\Entity\Customers;
use Doctrine\Common\Persistence\ManagerRegistry;

final class SuperCustomersDataProvider implements ItemDataProviderInterface, RestrictedDataProviderInterface
{
    
    private $itemExtensions;

    public function __construct(ManagerRegistry $managerRegistry)
    {
      $this->managerRegistry = $managerRegistry;
    }
    
    
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        //file_put_contents('./log_'.date("j.n.Y").'.log', "supports-method".PHP_EOL, FILE_APPEND);
        return SuperCustomers::class === $resourceClass;
    }

    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = []): ?SuperCustomers
    {
        // Retrieve the blog post item from somewhere then return it or null if not found
        //$customer = new Customers();
        //$customer->find($id);
        
       /* $manager = $this->managerRegistry->getManagerForClass(Customers::class);
        $customer = $manager->getRepository(Customers::class)
                ->find($id);*/
        $superCustomers = new SuperCustomers();
        $superCustomers->id = $id;
        
       // $superCustomers->firstName = $customer->getFirstName();
        //$superCustomers->id = 168;//$customer->getId();*/
        //file_put_contents('./log_'.date("j.n.Y").'.log', "dataprovider-".PHP_EOL, FILE_APPEND);
        return $superCustomers;
    }
}
