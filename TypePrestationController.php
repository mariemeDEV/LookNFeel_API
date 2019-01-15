<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\TypePrestation;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TypePrestationController extends AbstractController
{
   

    //Getting the list of all types préstations
    /**
    * @Rest\Get("/prestations")
    * 
    */
    public function listPrestation() : JsonResponse{
        $prestationsRepository = $this->getDoctrine()->getRepository(TypePrestation::class);
        $prestations           = $prestationsRepository->findAll();
        if(empty($prestations)){
            $response=array( 
                'message'=>'post not found',
                'result'=>null
            );
        return new JsonResponse($response , Response::HTTP_NOT_FOUND);
        }
        $prestationsData = $this->get('serializer')->serialize($prestations,'json');
        $response=array(
           'message'=>'succes',
           'result'=>json_decode($prestationsData)
        );
        return new JsonResponse($response, 200);
    }
}
