<?php
// api/src/Entity/SuperCustomers.php
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Validator\Constraints as Assert;

    /**
     * @ApiResource(
     *     collectionOperations={
     *         "get",
     *         "post"={
     *             "path"="/supercustomers"
     *        },
     *     },
     *     itemOperations={
	 *         "put"={
     *             "path"="/supercustomers/{id}"
     *        }},
     *     attributes={
 	 *         "denormalization_context": {"api_allow_update": true}
     *     }
     *  
     * )
     */
final class SuperCustomers
{
    

	/**
     * 
     * @ApiProperty(identifier=true)
     */
    public $id;

    //*************************
    //Customers
    //*************************

    /**
     * @var string|null
     * @Assert\NotNull
     */
    public $firstName;

    /**
     * @var string|null
     * @Assert\NotNull
     */
    public $lastName;

    /**
     * @var string|null
     */
    public $phone;

    /**
     * @var string
     *
     */
    public $email;

    /**
     * @var string|null
     *
     */
    public $reference1;

    /**
     * @var string|null
     */
    public $phoneReference1;

    /**
     * @var string|null
     */
    public $docid;

    
    /**
     * @var int|null
     */
    public $idDocidTypes;


    /**
     * @var int|null
     */
    public $CustomerIdBranches;


    /**
     * @var \DateTime|null
     */
    public $createdDate;


    //*************************
    //Contracts
    //*************************

    /**
     * @var int|null
     */
    public $number;


    /**
     * @var \DateTime|null
     */
    public $start;

    /**
     * @var int|null
     */
    public $idContractTypes;

    /**
     * @var int|null
     */
    public $idRecurrence;

    /**
     * @var int|null
     */
    public $ContractIdBranches;

    //*************************
    //idProduct
    //*************************

    /**
     * @var array|null
     */
    public $idProducts;


    //*************************
    //idStatusCause
    //*************************

    /**
     * @var int|null
     */
    public $idStatusCauses;


    //*************************
    //idAddress
    //*************************

    /**
     * @var int|null
     */
    public $idAddresses;


    //*************************
    //Address
    //*************************

    /**
     * @var string|null
     */
    public $address1;

    /**
     * @var string|null
     */
    public $address2;

    /**
     * @var string|null
     */
    public $zipcode; 

    /**
     * @var int|null
     */
    public $idSyNeighborhoods;

    /**
     * @var int|null
     */
    public $idSocioeconomicLevels;









}
