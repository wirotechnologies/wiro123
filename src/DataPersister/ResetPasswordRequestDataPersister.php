<?php
// api/src/DataPersister/ResetPasswordRequestDataPersister.php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\ResetPasswordRequest;

final class ResetPasswordRequestDataPersister implements DataPersisterInterface
{
    public function supports($data): bool
    {
        return $data instanceof ResetPasswordRequest;
    }
    
    public function persist($data)
    {
      // Trigger your custom logic here
      return $data->username;
    }
    
    public function remove($data)
    {
      throw new \RuntimeException('"remove" is not supported');
    }
}