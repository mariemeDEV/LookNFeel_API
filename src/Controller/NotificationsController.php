<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Commentaires;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NotificationsController extends AbstractController
{
    
    /**
* @Rest\Post("/addNotification")
*/
public function addNotification(Request $request) : JsonResponse{
    $em             = $this->getDoctrine()->getManager();
    $requestContent = $request->getContent();
    $commentaire        = $this->get('serializer')->deserialize($requestContent,"App\Entity\Commentaires", 'json'); 
    if($projet==null){
        return new JsonResponse("le contenu des données à insérer est vide",Response::HTTP_BAD_REQUEST);
    }else{
        $em->persist($commentaire);
        $em->flush();
        return new JsonResponse("Insertion effectuee avec succes",200);        
    }
}

}


