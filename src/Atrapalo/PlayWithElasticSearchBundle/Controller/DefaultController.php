<?php

namespace Atrapalo\PlayWithElasticSearchBundle\Controller;

use Elasticsearch\Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /** @var  Client */
    private $client;

    public function __construct()
    {
        $params          = [];
        $params['hosts'] = ['localhost:9200'];
        $this->client    = new Client($params);
    }

    /**
     * todo list:
     *  - unit test
     *  - example db and doctrine entities
     *  - config entities and mapping
     *  - config ElasticSearch and FOSElasticaBundle params
     *  - ...
     */

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('AtrapaloPlayWithElasticSearchBundle:Default:index.html.twig');
    }

    /**
     * Symfony\Component\HttpFoundation\Response
     */
    public function indexDocumentAction()
    {
        $request = $this->get('request');

        $retDoc = [];
        $params = [];
        $params['id'] = null;

        if ($request->get('value')) {
            $params['body']  = [
                'testField' => $request->get('value'),
                'param 123' => 'Santi',
                'param 456' => 'example'
            ];
            $params['index'] = 'my_index';
            $params['type']  = 'my_type';
            $params['id']    = 'custom_identifier';

            $retDoc = $this->client->index($params);
        }

        return $this->render(
            'AtrapaloPlayWithElasticSearchBundle:Default:response.html.twig',
            [
                'id'       => $params['id'],
                'response' => [$retDoc]
            ]
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getDocumentAction()
    {
        $request = $this->get('request');

        $retDoc = [];
        if ($request->get('id')) {
            $getParams = [];

            $getParams['index'] = 'my_index';
            $getParams['type']  = 'my_type';
            $getParams['id']    = 'custom_identifier';

            $retDoc = $this->client->get($getParams);
        }

        return $this->render(
            'AtrapaloPlayWithElasticSearchBundle:Default:response.html.twig',
            ['response' => [$retDoc]]
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function searchDocumentAction()
    {
        $request = $this->get('request');

        $retDoc = [];
        if ($request->get('search')) {
            $searchParams['index']                               = 'my_index';
            $searchParams['type']                                = 'my_type';
            $searchParams['body']['query']['match']['testField'] = $request->get('search');
            $retDoc                                              = $this->client->search($searchParams);
        }

        return $this->render(
            'AtrapaloPlayWithElasticSearchBundle:Default:response.html.twig',
            ['response' => [$retDoc]]
        );
    }
}
