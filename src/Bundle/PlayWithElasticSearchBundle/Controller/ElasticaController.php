<?php

namespace Bundle\PlayWithElasticSearchBundle\Controller;

use Elastica\Client;
use Elastica\Index;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ElasticaController
 *
 * @package Bundle\PlayWithElasticSearchBundle\Controller
 */
class ElasticaController extends Controller
{
    /** @var Client */
    private $elasticaClient;

    public function __construct()
    {
        $this->elasticaClient = new Client();
    }

    public function createIndexAction()
    {
        /** @var Index $elasticaIndex */
        $elasticaIndex = $this->elasticaClient->getIndex('playlist');

        $this->createElasticaIndex($elasticaIndex);
        $this->createMapping($elasticaIndex);

        return $this->render(
            'PlayWithElasticSearchBundle:Elastica:index-created.html.twig',
            [
                'client'  => $elasticaIndex->getClient(),
                'index'   => $elasticaIndex,
                'mapping' => $elasticaIndex->getMapping()
            ]
        );
    }

    /**
     * @param Index $elasticaIndex
     */
    private function createElasticaIndex(Index $elasticaIndex)
    {
        // Create the index new
        $elasticaIndex->create(
            array(
                'number_of_shards'   => 4,
                'number_of_replicas' => 1,
                'analysis'           => array(
                    'analyzer' => array(
                        'indexAnalyzer'  => array(
                            'type'      => 'custom',
                            'tokenizer' => 'standard',
                            'filter'    => array('lowercase', 'mySnowball')
                        ),
                        'searchAnalyzer' => array(
                            'type'      => 'custom',
                            'tokenizer' => 'standard',
                            'filter'    => array('standard', 'lowercase', 'mySnowball')
                        )
                    ),
                    'filter'   => array(
                        'mySnowball' => array(
                            'type'     => 'snowball',
                            'language' => 'English'
                        )
                    )
                )
            ),
            true //The argument is an OPTIONAL bool=> (true) Deletes index first if already exists (default = false)
        );
    }

    /**
     * @param Index $elasticaIndex
     */
    public function createMapping(Index $elasticaIndex)
    {
        //Create a type
        $elasticaType = $elasticaIndex->getType('track');

        // Define mapping
        $mapping = new \Elastica\Type\Mapping();
        $mapping->setType($elasticaType);
        $mapping->setParam('index_analyzer', 'indexAnalyzer');
        $mapping->setParam('search_analyzer', 'searchAnalyzer');

        // Define boost field
        $mapping->setParam('_boost', array('name' => '_boost', 'null_value' => 1.0));

        // Set mapping
        $mapping->setProperties(
            array(
                'id'       => array('type' => 'integer', 'include_in_all' => false),
                'album'    => array(
                    'type'       => 'object',
                    'properties' => array(
                        'id'    => array('type' => 'integer', 'include_in_all' => true),
                        'title' => array('type' => 'string', 'include_in_all' => true)
                    ),
                ),
                'name'     => array('type' => 'string', 'include_in_all' => true),
                'composer' => array('type' => 'string', 'include_in_all' => true),
                '_boost'   => array('type' => 'float', 'include_in_all' => false)
            )
        );

        // Send mapping to type
        $mapping->send();

    }
}
