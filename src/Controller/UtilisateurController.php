<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\ApiController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Utilisateur;

class UtilisateurController extends FOSRestController
{
     /**
     * @Rest\Get("/utilisateurs")
     */
    public function getUtilisateurs() : JsonResponse{
        $utilisateursRepository = $this->getDoctrine()->getRepository(Utilisateur::class);
        $utilisateurs           = $utilisateursRepository->findAll();
        if(empty($utilisateurs)){
            $response=array( 
                'message'=>'post not found',
                'result'=>null
            );
        return new JsonResponse($response , Response::HTTP_NOT_FOUND);
        }
        $utilisateursData = $this->get('serializer')->serialize($utilisateurs,'json');
        $response=array(
           'message'=>'succes',
           'result'=>json_decode($utilisateursData)
        );
        return new JsonResponse($response, 200);
    }

    //Add a new utilisateur
    /**
    * @Rest\Post("/addUser")
    */
    public function postUser(Request $request) : JsonResponse{
        $em             = $this->getDoctrine()->getManager();
        $requestContent = $request->getContent();
        $user           = $this->get('serializer')->deserialize($requestContent,"App\Entity\Utilisateur", 'json'); 
        if($user==null){
            return new JsonResponse("le contenu des données à insérer est vide",Response::HTTP_BAD_REQUEST);
        }else{
            var_dump($user);
            // $em->persist($user);
            // $em->flush();
            return new JsonResponse("Insertion effectuee avec succes",200);        
        }
    }
    


}


