<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\ProjetFiliale;


class ProjetFilialeController extends FOSRestController
{
    /**
     * @Rest\Get("/projets_filiale")
     */
    public function getProjetsFiliale() : JsonResponse{
        $projetsRepository = $this->getDoctrine()->getRepository(ProjetFiliale::class);
        $projets           = $projetsRepository->findAll();
        if(empty($projets)){
            $response=array( 
                'message'=>'post not found',
                'result'=>null
            );
        return new JsonResponse($response , Response::HTTP_NOT_FOUND);
        }
        $projetsData = $this->get('serializer')->serialize($projets,'json');
        $response=array(
           'message'=>'succes',
           'result'=>json_decode($projetsData)
        );
        return new JsonResponse($response, 200);
    }




   

}
