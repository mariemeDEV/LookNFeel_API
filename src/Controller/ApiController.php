<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\FOSRestController;


class ApiController extends FOSRestController
{
    /**
     * @Route("/api", name="api")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ApiController.php',
        ]);
    }

// liste d'une classe donnée
   
    public function listClass() {
        if(empty($objets)){
            $response=array( 
                'message'=>'post not found',
                'result'=>null
            );
        }
        $usersData = $this->get('serializer')->serialize($objets,'json');
        $response=array(
            'message'=>'succes',
            'result'=>json_decode($usersData)
        );
    return $response;
    }

// fin a class object
        /**
         * @Route("/findObject/{id}")
         */
        public function findObject(){

        }
    
//Post a new class object
        /**
         * @Route("/postClass", name="postClass")
         */
        public function postClass(){

        }

//Update a new class object
        /**
         * @Route("/updateClass", name="updateClass")
         */
        public function updateClass(){

        }

//Delete a new class object
        /**
         * @Route("/deleteClass", name="deleteClass")
         */
        public function deleteClass(){

        }
}
