<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Commentaires;
use App\Entity\Etapes;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommentsController extends AbstractController
{
   
      /**
     * @Rest\Get("/comments")
     */
    public function getProjets(Request $request) : JsonResponse{
        $commentsRepository = $this->getDoctrine()->getRepository(Commentaires::class);
        $comments           = $commentsRepository->findAll();
        $commentsData       = $this->get('serializer')->serialize($comments,'json');
        if(empty($comments)){
            $response=array( 
                'message'=>'post not found',
                'result'=>null
            );
            return new JsonResponse($response , Response::HTTP_NOT_FOUND);
        }else{
            $response=array(
                'message'=>'succes',
                'result'=>json_decode($commentsData)
             );
             return new JsonResponse($response, 200);
        }
       
    }

    //Add a new comment
/**
* @Rest\Post("/addComment")
*/
public function addProjet(Request $request) : JsonResponse{
    $em             = $this->getDoctrine()->getManager();
    $requestContent = $request->getContent();
    $etapeRepo      =  $this->getDoctrine()->getRepository(Etapes::class);
    $etape          = $etapeRepo->find($request->get('etapes'));
    $comment        = $this->get('serializer')->deserialize($requestContent,"App\Entity\Commentaires", 'json'); 

    if($comment==null){
        return new JsonResponse("le contenu des données à insérer est vide",Response::HTTP_BAD_REQUEST);
    }else{
        $comment->setEtapes($etape);
        $em->persist($comment);
        $em->flush();
        return new JsonResponse("Insertion effectuee avec succes",200);        
    }
}
}
