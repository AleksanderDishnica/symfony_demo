<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Text;

class FriendController extends AbstractController
{
    /**
     * @Route("/", name="friend")
     */
    public function index(): Response
    {
        // return $this->json([
        //     'message' => 'Welcome to your new controller!',
        //     'path' => 'src/Controller/FriendController.php',
        // ]);
         
        $data = $this->getDoctrine()->getRepository(Text::class)->findAll();
        $lastInsert = $data[count($data)-1];

        return $this->render('main/index.html.twig', [
            'title' => $lastInsert->getTitle(),
            'description' => $lastInsert->getDescription(),
        ]);
    }
}