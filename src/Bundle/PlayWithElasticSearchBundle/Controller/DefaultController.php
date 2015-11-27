<?php

namespace Bundle\PlayWithElasticSearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('AtrapaloPlayWithElasticSearchBundle:Default:index.html.twig');
    }

}
