<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Projet;
use App\Entity\Client;
use App\Entity\Equipe;
use App\Entity\TypePrestation;


class ProjetController extends FOSRestController
{


    
    /**
     * @Rest\Get("/projets")
     */
    public function getProjets(Request $request) : JsonResponse{
        $projetsRepository = $this->getDoctrine()->getRepository(Projet::class);
        $projets           = $projetsRepository->findAll();
        $projetsData       = $this->get('serializer')->serialize($projets,'json');
        if(empty($projets)){
            $response=array( 
                'message'=>'post not found',
                'result'=>null
            );
            return new JsonResponse($response , Response::HTTP_NOT_FOUND);
        }else{
            $response=array(
                'message'=>'succes',
                'result'=>json_decode($projetsData)
             );
             return new JsonResponse($response, 200);
        }
       
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
                'message'=>'succes',
                'result'=>json_decode($data)
            );
            return new JsonResponse($response,200);
        }
    }

 //Add a new projet
/**
* @Rest\Post("/addProjet")
*/
    public function addProjet(Request $request) : JsonResponse{
        $em             = $this->getDoctrine()->getManager();
        $requestContent = $request->getContent();
        $typePresRepo   =  $this->getDoctrine()->getRepository(TypePrestation::class);
        $clientRepo     =  $this->getDoctrine()->getRepository(Client::class);
        $equipeRepo     =  $this->getDoctrine()->getRepository(Equipe::class);
        $pres           = $typePresRepo->find($request->get('typePrestation'));
        $client         = $clientRepo->find($request->get('client'));
        $equipe         = $equipeRepo->find($request->get('equipe'));
        $projet         = $this->get('serializer')->deserialize($requestContent,"App\Entity\Projet", 'json'); 
        $projet->setStatut(0);
        $projet->setMarges($request->get('billings')-$request->get('charges'));
        if($projet==null){
            return new JsonResponse("le contenu des données à insérer est vide",Response::HTTP_BAD_REQUEST);
        }else{
            $projet->setTypePrestation($pres);
            $projet->setClient($client);
            $projet->setEquipe($equipe);
            $em->persist($projet);
            $em->flush();
            return new JsonResponse("Insertion effectuee avec succes",200);        
        }
    }

}
