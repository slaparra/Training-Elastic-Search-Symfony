<?php

namespace Bundle\PlayWithElasticSearchBundle\Controller;

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
    public function searchAction()
    {
        //WIP, todo: export to repository and use it in Search Playlists

        $elasticaClient = new Client();
        $playListIndex  = $elasticaClient->getIndex('playlist');
        $trackType = $playListIndex->getType('track');

        $search    = new Search($elasticaClient);

        $search->addIndex($playListIndex)->addType($trackType);

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
}
