<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\Contracts;

final class ContractsDataPersister implements DataPersisterInterface
{
    public function supports($data): bool
    {
        return $data instanceof Contracts;
    }
    
    public function persist($data)
    {
        // call your persistence layer to save $data
        $em = $this->getDoctrine()->getManager();
        $data->setLastInvoice(1);
        $em->persist($data);
        $em->flush();
        return $data;
    }
    
    public function remove($data)
    {
      // call your persistence layer to delete $data
    }
}
