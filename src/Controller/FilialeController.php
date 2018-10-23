<?php 
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Filiale;

class FilialeController extends FOSRestController
{
   
//Getting the list of all filiales
    /**
    * @Rest\Get("/filiales")
    * 
    */
    public function listFiliales() : JsonResponse{

        $filialesRepository = $this->getDoctrine()->getRepository(Filiale::class);
        $filiales           = $filialesRepository->findAll();
        if(empty($filiales)){
            $response=array( 
                'message'=>'post not found',
                'result'=>null
            );
        return new JsonResponse($response , Response::HTTP_NOT_FOUND);
        }
        $filialesData = $this->get('serializer')->serialize($filiales,'json');
        $response=array(
           'message'=>'succes',
           'result'=>json_decode($filialesData)
        );
        return new JsonResponse($response, 200);
    }

//Get details of a filiale
    /**
    * @Rest\Get("/filiale/{id}")
    * 
    */
    public function getFiliale($id) : JsonResponse{
        $filialeRepository = $this->getDoctrine()->getRepository(Filiale::class);
        $filiale           = $filialeRepository->find($id);
        $data              = $this->get('serializer')->serialize($filiale,'json');
        if(empty($filiale)){
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

//Add a new filiale
    /**
    * @Rest\Post("/addFiliale")
    */
    public function postFiliale(Request $request) : JsonResponse{
        $em             = $this->getDoctrine()->getManager();
        $requestContent = $request->getContent();
        $filiale         = $this->get('serializer')->deserialize($requestContent,"App\Entity\Filiale", 'json'); 
        if($filiale==null){
            return new JsonResponse("le contenu des données à insérer est vide",Response::HTTP_BAD_REQUEST);
        }else{
            $em->persist($filiale);
            $em->flush();
            return new JsonResponse("Insertion effectuee avec succes",200);        
        }
    }


//Deleting a filiale's informations
    /**
    * @Rest\Get("/removefiliale/{id}")
    */
    public function removeFiliale($id){
        $em                 = $this->getDoctrine()->getManager();
        $filialesRepository = $this->getDoctrine()->getRepository(Filiale::class);
        $filiale            = $filialesRepository->find($id);
        if($filiale==null){
            return new JsonResponse("Cet utilisateur n'existe pas",Response::HTTP_BAD_REQUEST);
        }else{
            $em->remove($filiale);
            $em->flush();
            return new JsonResponse("Le filiale".$id." a ete supprime avec succes",200);        
        }
    }


    
}
