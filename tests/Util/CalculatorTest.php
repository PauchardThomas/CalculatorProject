<?php
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use App\Util\Calculator;

/**
 * Calculator test case.
 */
class CalculatorTest extends TestCase
{

    /**
     *
     * @var Calculator
     */
    private $calculator;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->calculator = new Calculator();
    }

    public function moduloProvider()
    {
        return [
            "data1" => [
                10,
                3,
                1
            ],
            "data2" => [
                9,
                3,
                0
            ]
        ];
    }

    public function divideProvider()
    {
        return [
            "data1" => [
                1,
                1,
                1
            ],
            "data2" => [
                - 1,
                - 1,
                1
            ],
            "data3" => [
                5,
                2,
                2.5
            ],
            "data4" => [
                2,
                1,
                2
            ]
        ];
    }

    /**
     * Tests Calculator->add()
     */
    public function testAdd()
    {
        $result = $this->calculator->add(6, - 5);
        $this->assertEquals(1, $result);
    }

    /**
     * Tests Calculator->substract()
     */
    public function testSubstract()
    {
        $result = $this->calculator->substract(3, 2);
        $this->assertEquals(1, $result);
    }

    /**
     * @dataProvider moduloProvider
     * Tests Calculator->modulo()
     */
    public function testModulo($a, $b, $expect)
    {
        $result = $this->calculator->modulo($a, $b);
        $this->assertEquals($expect, $result);
    }
    
    /**
     *  @expectedException InvalidArgumentException
     *  Tests Calculator->modulo() by 0
     */
    public function testModuloByZeroThrowsException()
    {
        $this->calculator->modulo(10, 0);
    }

    /**
     * Tests Calculator->multiply()
     */
    public function testMultiply()
    {
        $result = $this->calculator->multiply(5, 6);
        $this->assertEquals(30, $result);
    }

    /**
     *
     * @dataProvider divideProvider
     * Tests Calculator->divide()
     */
    public function testDivide($a, $b, $expect)
    {
        $result = $this->calculator->divide($a, $b);
        $this->assertEquals($expect, $result);
    }

    /**
     *
     *    @expectedException InvalidArgumentException
     *    Tests Calculator->divide() by 0
     */
    public function testDivisionByZeroThrowsException()
    {
        $this->calculator->divide(1, 0);
    }
}

