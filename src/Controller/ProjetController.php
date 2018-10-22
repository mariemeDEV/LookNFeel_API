<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Projet;


class ProjetController extends FOSRestController
{
    /**
     * @Rest\Get("/projets")
     */
    public function getProjets() : JsonResponse{
        $projetsRepository = $this->getDoctrine()->getRepository(Projet::class);
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


//Get details of a projet
    /**
    * @Rest\Get("/projet/{id}")
    * 
    */
    public function getProjet($id) : JsonResponse{
        $projetsRepository = $this->getDoctrine()->getRepository(Projet::class);
        $projet            = $projetsRepository->find($id);
        $data              = $this->get('serializer')->serialize($projet,'json');
        if(empty($projet)){
            return new JsonResponse("No record",400);
        }else{
            $response=array(
                'code'=>0,
                'message'=>'succes',
                'errors'=>null,
                'result'=>json_decode($data)
            );
            return new JsonResponse($response,200);
        }
    }

    //Add a new projet
    /**
    * @Rest\Post("/addProjet")
    */
    public function postClient(Request $request) : JsonResponse{
        $em             = $this->getDoctrine()->getManager();
        $requestContent = $request->getContent();
        $projet         = $this->get('serializer')->deserialize($requestContent,"App\Entity\Projet", 'json'); 
        if($projet==null){
            return new JsonResponse("le contenu des données à insérer est vide",Response::HTTP_BAD_REQUEST);
        }else{
            $em->persist($projet);
            $em->flush();
            return new JsonResponse("Insertion effectuee avec succes",200);        
        }
    }

}
