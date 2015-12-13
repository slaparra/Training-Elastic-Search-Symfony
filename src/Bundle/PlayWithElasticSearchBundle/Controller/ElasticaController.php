<?php

namespace Bundle\PlayWithElasticSearchBundle\Controller;

use Bundle\PlayWithElasticSearchBundle\Entity\Track;
use Elastica\Client;
use Elastica\Index;
use Elastica\Query;
use Elastica\Query\MatchAll;
use Elastica\Search;
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

    /** @var Index */
    private $playListIndex;

    /** @var \Elastica\Type  */
    private $trackType;

    public function __construct()
    {
        $this->elasticaClient = new Client();
        $this->playListIndex  = $this->elasticaClient->getIndex('playlist');
        $this->trackType      = $this->playListIndex->getType('track');
    }

    public function searchAction()
    {
        $trackType = $this->playListIndex->getType('track');
        $search    = new Search($this->elasticaClient);

        $search
            ->addIndex($this->playListIndex)
            ->addType($trackType);

        $query = new Query();

        $query
            ->setSize(5)
            ->setSort(['name' => 'asc'])
            ->setFields(['name', 'ids', 'id', 'composer'])
            ->setExplain(true)
            ->setVersion(true)
            ->setHighlight(['fields' => 'composer'])
//            ->setSource(['obj1.*', 'obj2.'])
//            ->setFrom(50)
//            ->setMinScore(0.5)
        ;

        $query->setQuery(new MatchAll());

//        $query->addAggregation(new \Elastica\Aggregation\Range('name'));
//        $term = new \Elastica\Suggest\Term('name', 'field');
//        $term->setText('aaaaa');
//        $query->setSuggest(new \Elastica\Suggest($term));
//        $query->setFacets([new \Elastica\Facet\Range('name')]);

        $search->setQuery($query);

        $resultSet       = $search->search();
        $numberOfEntries = $search->count();
        $results         = $resultSet->getResults();
        $totalResults    = $resultSet->getTotalHits();

        return $this->render(
            'PlayWithElasticSearchBundle:Elastica:search.html.twig',
            [
                'query'           => $query,
                'numberOfEntries' => $numberOfEntries,
                'resultSet'       => $resultSet,
                'results'         => $results,
                'totalResults'    => $totalResults
            ]
        );
    }

    public function addDocumentAction()
    {
        $id = time();
        $albumId = time() + 1;

        $trackDocument = $this->addTrackDocument($id, 'fake name', 'fake composer', $albumId, 'fake album title');

        // Add track to type
        $this->trackType->addDocument($trackDocument);

        // Refresh Index
        $this->trackType->getIndex()->refresh();

        return $this->render(
            'PlayWithElasticSearchBundle:Elastica:add-document.html.twig',
            ['document' => $trackDocument]
        );
    }


    /**
     * @param integer $id
     * @param string  $name
     * @param string  $composer
     * @param integer $albumId
     * @param string  $albumTitle
     *
     * @return \Elastica\Document
     */
    public function addTrackDocument($id, $name, $composer, $albumId, $albumTitle)
    {
        // Create a document
        $track = array(
            'id'       => $id,
            'album'    => array(
                'id'    => $albumId,
                'title' => $albumTitle
            ),
            'name'     => $name,
            'composer' => $composer,
            '_boost'   => 1.0
        );

        // First parameter is the id of document.
        return new \Elastica\Document($id, $track);

    }

    public function createIndexAction()
    {
        $this->createPlaylistIndex();
        $this->createMapping();

        return $this->render(
            'PlayWithElasticSearchBundle:Elastica:index-created.html.twig',
            [
                'client'  => $this->playListIndex->getClient(),
                'index'   => $this->playListIndex,
                'mapping' => $this->playListIndex->getMapping()
            ]
        );
    }

    private function createPlaylistIndex()
    {
        // Create the index new
        $this->playListIndex->create(
            array(
                'number_of_shards'   => 4,
                'number_of_replicas' => 1,
                'analysis'           => array(
                    'analyzer' => array(
                        'indexAnalyzer'  => array(
                            'type'      => 'snowball',
                            'tokenizer' => 'standard',
                            'filter'    => array('lowercase', 'mySnowball'),
                            'language'  => 'Spanish',
                            'stopwords' => 'de, en, el, a'
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

    public function createMapping()
    {
        // Define mapping
        $mapping = new \Elastica\Type\Mapping();
        $mapping->setType($this->trackType);
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
