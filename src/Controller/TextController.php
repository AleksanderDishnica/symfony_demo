<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Text;
use App\Form\TextType;
use Symfony\Component\HttpFoundation\Request;

class TextController extends AbstractController
{
    /**
     * @Route("/text", name="text")
     */
    public function index(): Response
    {
        // return $this->render('text/index.html.twig', [
        //     'controller_name' => 'TextController',
        // ]);
    }

    /**
     * @Route("/textInsert", name="textInsert")
     */
    public function insert(Request $request)
    {
    	$text = new Text;

    	$form = $this->createform(TextType::class, $text);
    	$form->handleRequest($request);

    	if($form->isSubmitted()){
    		$entitymanager = $this->getDoctrine()->getManager();
    		$entitymanager->persist($text);
    		$entitymanager->flush();
    	}

    	return $this->render('text/insert.html.twig', [
    		'form' => $form->createView(),
    	]);
    }
}
