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
     * @var string|null
     */
    public $idDocidTypes;


    /**
     * @var string|null
     */
    public $CustomerIdBranches;


    /**
     * @var \DateTime|null
     */
    public $createdDate;



    //*************************
    //customerIdAddress
    //*************************

    /**
     * @var string|null
     */
    public $customerIdAddresses;


    //*************************
    //customerAddress
    //*************************

    /**
     * @var string|null
     */
    public $customerAddress1;

    /**
     * @var string|null
     */
    public $customerAddress2;

    /**
     * @var string|null
     */
    public $customerZipcode; 

    /**
     * @var string|null
     */
    public $customerIdSyNeighborhoods;

    /**
     * @var string|null
     */
    public $customerIdSocioeconomicLevels;


    //*************************
    //Contracts
    //*************************

    /**
     * @var int|null
     */
    public $number;


    /**
     * @var string|null
     */
    public $start;

    /**
     * @var string|null
     */
    public $idContractTypes;

    /**
     * @var string|null
     */
    public $idRecurrence;

    /**
     * @var string|null
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
     * @var string|null
     */
    public $idStatusCauses;


    //*************************
    //contractidAddress
    //*************************

    /**
     * @var string|null
     */
    public $contractIdAddresses;


    //*************************
    //contractAddress
    //*************************

    /**
     * @var string|null
     */
    public $contractAddress1;

    /**
     * @var string|null
     */
    public $contractAddress2;

    /**
     * @var string|null
     */
    public $contractZipcode; 

    /**
     * @var string|null
     */
    public $contractIdSyNeighborhoods;

    /**
     * @var string|null
     */
    public $contractIdSocioeconomicLevels;


    /**
     * @var boolean|null
     */
    public $same;









}
