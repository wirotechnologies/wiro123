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
    //customerIdAddress
    //*************************

    /**
     * @var int|null
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
     * @var int|null
     */
    public $customeriIdSyNeighborhoods;

    /**
     * @var int|null
     */
    public $customeriIdSocioeconomicLevels;


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
    //contractidAddress
    //*************************

    /**
     * @var int|null
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
     * @var int|null
     */
    public $contractIdSyNeighborhoods;

    /**
     * @var int|null
     */
    public $contractIdSocioeconomicLevels;


    /**
     * @var boolean|null
     */
    public $same;









}
