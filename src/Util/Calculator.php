<?php
namespace App\Util;

use App\Entity\OperatorType;

class Calculator
{

    public function __construct()
    {}

    public function calcul($a, $b, $operator)
    {
        switch ($operator)
        {
            case OperatorType::ADD :
                return self::add($a, $b);
                break;
                
            case OperatorType::SUBSTRACT :
                return self::substract($a, $b);
                break;
                
            case OperatorType::MULTIPLY:
                return self::multiply($a, $b);
                break;
                
            case OperatorType::DIVIDE :
                return self::divide($a, $b);
                break;
                
            case OperatorType::MODULO:
            default:
                return self::modulo($a, $b);
                break;
        }
    }
    
    /**
     * Add two numbers
     *
     * @param float $a
     * @param float $b
     * @return number
     */
    public function add($a, $b)
    {
        return $a + $b;
    }
    
    /**
     * Substract two numbers
     * 
     * @param float $a
     * @param float $b
     * @return number
     */
    public function substract($a, $b)
    {
        return $a - $b;
    }

    /**
     * Multiply two numbers
     *
     * @param float $a
     * @param float $b
     * @return number
     */
    public function multiply($a, $b)
    {
        return $a * $b;
    }
    
    /**
     * Modulo 2 numbers
     * @param float $a
     * @param float $b
     * @return number
     */
    public function modulo($a, $b)
    {
        if ($b == 0) {
            throw new \InvalidArgumentException('Division by zero.');
        }
        
        return $a % $b;
    }

    /**
     * Divide two numbers
     *
     * @param float $a
     * @param float $b
     * @return number
     */
    public function divide($a, $b)
    {
        if ($b == 0) {
            throw new \InvalidArgumentException('Division by zero.');
        }
        return $a / $b;
    }
}

