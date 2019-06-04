<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OperationRepository")
 */
class Operation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $number1;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $number2;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $result;
    
    /**
     *
     * @ORM\Column(name="operation", type="OperatorType", nullable=false)
     * @DoctrineAssert\Enum(entity="App\Entity\OperatorType")
     */
    protected $operator;
    
    public function __construct()
    {
        $this->setOperator(OperatorType::ADD);
    }
    
    public function setOperator(string $operator = null)
    {
        $this->operator = $operator;
    }
    
    public function getOperator(): string
    {
        return $this->operator;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber1(): ?float
    {
        return $this->number1;
    }

    public function setNumber1(?float $number1): self
    {
        $this->number1 = $number1;

        return $this;
    }

    public function getNumber2(): ?float
    {
        return $this->number2;
    }

    public function setNumber2(?float $number2): self
    {
        $this->number2 = $number2;

        return $this;
    }

    public function getResult(): ?float
    {
        return $this->result;
    }

    public function setResult(?float $result): self
    {
        $this->result = $result;

        return $this;
    }
}
