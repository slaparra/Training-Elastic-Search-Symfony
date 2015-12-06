<?php

namespace Bundle\PlayWithElasticSearchBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ElasticaController
 *
 * @package Bundle\PlayWithElasticSearchBundle\Controller
 */
class ElasticaController extends Controller
{
    public function createIndexAction()
    {
        $elasticaIndex = $this->createElasticaIndex();

        return $this->render(
            'PlayWithElasticSearchBundle:Elastica:index-created.html.twig',
            ['index' => $elasticaIndex]
        );
    }

    /**
     * @return \Elastica\Index
     */
    private function createElasticaIndex()
    {
        $elasticaClient = new \Elastica\Client();

        // Load index
        $elasticaIndex = $elasticaClient->getIndex('playlist');

        // Create the index new
        return $elasticaIndex->create(
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
}
