<?php

namespace App\Entity;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

final class OperatorType extends AbstractEnumType
{
    public const ADD = 'Addition';
    public const SUBSTRACT = 'Substract';
    public const MULTIPLY = 'Multiply';
    public const DIVIDE = 'Divide';
    public const MODULO = 'Modulo';
    
    protected static $choices = [
        self::ADD => 'Addition',
        self::SUBSTRACT => 'Substract',
        self::MULTIPLY => 'Multiply',
        self::DIVIDE => 'Divide',
        self::MODULO => 'Modulo'
    ];
}