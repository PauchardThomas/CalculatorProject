<?php
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use Symfony\Component\Form\Test\TypeTestCase;
use App\Form;
use App\Entity\Operation;
use App\Form\OperationType;
use App\Entity\OperatorType;

/**
 * Calculator test case.
 */
class OperationTypeTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = [
            'number1' => 5.0,
            'number2' => 5.0,
            'operator'  => OperatorType::ADD,
        ];
        
        $operation = new Operation();
        // $objectToCompare will retrieve data from the form submission; pass it as the second argument
        $form = $this->factory->create(OperationType::class, $operation);
        
        $object = new Operation();
        $object->setNumber1($formData['number1']);
        $object->setNumber2($formData['number2']);
        $object->setOperator($formData['operator']);
        
        // submit the data to the form directly
        $form->submit($formData);
        
        $this->assertTrue($form->isSynchronized());
        // check that $objectToCompare was modified as expected when the form was submitted
        $this->assertEquals($object, $operation);
        
        $view = $form->createView();
        $children = $view->children;
        
        foreach (array_keys($formData) as $key) {
                $this->assertArrayHasKey($key, $children);
        }
    }
}