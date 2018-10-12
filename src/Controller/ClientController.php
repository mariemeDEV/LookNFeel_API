<?php 
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Client;

class ClientController extends FOSRestController
{
   
//Getting the list of all clients
    /**
    * @Rest\Get("/clients")
    * 
    */
    public function listClients() : JsonResponse{
        $clientsRepository = $this->getDoctrine()->getRepository(Client::class);
        $clients           = $clientsRepository->findAll();
        //return new JsonResponse($this->getApi()->listClass($clients),200);
        if(empty($clients)){
            $response=array( 
                'message'=>'post not found',
                'result'=>null
            );
            return new JsonResponse($response , Response::HTTP_NOT_FOUND);
        }
        $clientsData = $this->get('serializer')->serialize($clients,'json');
        $response=array(
           'message'=>'succes',
           'result'=>json_decode($clientsData)
       );
       return new JsonResponse($response, 200);
    }

//Get details of a client
    /**
    * @Rest\Get("/client/{id}")
    * 
    */
    public function getClient($id) : JsonResponse{
        $clientsRepository = $this->getDoctrine()->getRepository(Client::class);
        $client            = $clientsRepository->find($id);
        $data              = $this->get('serializer')->serialize($client,'json');
        if(empty($client)){
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

//Add a new client
    /**
    * @Rest\Post("/addUser")
    */
    public function postClient(Request $request) : JsonResponse{
        $em             = $this->getDoctrine()->getManager();
        $requestContent = $request->getContent();
        $client         = $this->get('serializer')->deserialize($requestContent,"App\Entity\Client", 'json'); 
        if($client==null){
            return new JsonResponse("le contenu des données à insérer est vide",Response::HTTP_BAD_REQUEST);
        }else{
            $em->persist($client);
            $em->flush();
            return new JsonResponse("Insertion effectuee avec succes",200);        
        }
    }


//Deleting a client's informations
    /**
    * @Rest\Get("/removeClient/{id}")
    */
    public function removeClient($id){
        $em                = $this->getDoctrine()->getManager();
        $clientsRepository = $this->getDoctrine()->getRepository(Client::class);
        $client            = $clientsRepository->find($id);
        if($client==null){
            return new JsonResponse("Cet utilisateur n'existe pas",Response::HTTP_BAD_REQUEST);
        }else{
            $em->remove($client);
            $em->flush();
            return new JsonResponse("Le client ".$id." a ete supprime avec succes",200);        
        }
    }

//Updating a client's informations
    /**
     * @Rest\Post("updateClient/{id}")
     */
    public function updateClient($id,Request $request){
        $em                = $this->getDoctrine()->getManager();
        $clientsRepository = $this->getDoctrine()->getRepository(Client::class);
        $client            = $clientsRepository->find($id);
        $data              = $this->get('serializer')->serialize($client,'json');
        if($client==null){
            return new JsonResponse("Cet utilisateur n'existe pas",Response::HTTP_BAD_REQUEST);
        }else{
            return new JsonResponse(json_decode($data),200);  
            // $requestContent = $request->getContent();
            // $clientUpdated  = $this->get('serializer')->deserialize($requestContent,"App\Entity\Client", 'json'); 
            // $em->persist($clientUpdated);
            // $em->flush();
        }
    }
    
}
