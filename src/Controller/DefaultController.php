<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\OperationType;
use App\Entity\Operation;
use App\Entity\OperatorType;
use App\Util\Calculator;

class DefaultController extends AbstractController
{
    public function index(Request $request)
    {
        $operation = new Operation();
        
        $form = $this->createForm(OperationType::class,$operation);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
//
            $operation = $form->getData();
            
            $calculator = new Calculator();
            if($operation->getNumber2() == 0 && ($operation->getOperator() == OperatorType::DIVIDE || $operation->getOperator() == OperatorType::MODULO))
            {
                $this->addFlash("error", "Divide by 0 not allowed.");
            } else {
                
            $result =$calculator->calcul($operation->getNumber1(),$operation->getNumber2(),$operation->getOperator());
            
            $operation->setResult($result);
            }

        }
        
        return $this->render('default/index.html.twig', [
            'controller_name'   => 'DefaultController',
            'operation'         => $operation,
            'form'              => $form->createView()
        ]);
    }
}
