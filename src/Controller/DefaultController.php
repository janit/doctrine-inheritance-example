<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller {

    public function index(){

        $em = $this->get('doctrine.orm.default_entity_manager');
        $locations = $em->getRepository('App:Dog')->findAll();

        return new JsonResponse($locations);

    }

}