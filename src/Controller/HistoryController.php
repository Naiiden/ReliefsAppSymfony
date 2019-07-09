<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\History;
use App\Repository\HistoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;

class HistoryController extends AbstractController
{
    /**
     * @Route("/historyJson", name="historyJson")
     */
    public function getJson(HistoryRepository $repo)
    {

        $history = $repo->findAll();

        /* transform our array into Json*/
        $serializedEntity = $this->container->get('serializer')->serialize($history, 'json');

        return new Response($serializedEntity);
    }

    /**
     * @Route("/historyJson/new", name="history_json_create")
     */
    public function createJson(Request $request, ObjectManager $manager)
    { 
        $history = new History();

        $url = json_decode($request->getContent())->url; /* Json answer from the POST method*/
        $history->setUrl($url);

        $manager->persist($history);
        $manager->flush();
 
        return $response = new Response(200);
    }
}
