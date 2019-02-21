<?php
    // api/src/Entity/ResetPasswordRequest.php

    namespace App\Entity;

    use ApiPlatform\Core\Annotation\ApiResource;
    use Symfony\Component\Validator\Constraints as Assert;

    /**
     * @ApiResource(
     *     collectionOperations={
     *         "get",
     *         "post"={
     *             "path"="/users/forgot-password-request"
     *        },
     *     },
     *     itemOperations={}
     * )
     */
    final class ResetPasswordRequest
    {
        /**
         * @var string
         *
         * @Assert\NotBlank
         */
        public $username;

        /**
         * @var int
         */
        private $id;

        /**
         * @var string|null
         */
        private $firstName;

    }