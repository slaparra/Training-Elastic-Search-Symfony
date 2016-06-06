<?php

namespace Bundle\PlayWithElasticSearchBundle\Command\PlayList;

use Elastica\Client;
use Elastica\Index;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CreateElasticSearchPlayListIndexCommand
 */
class CreateElasticSearchPlayListIndexCommand extends ContainerAwareCommand
{
    /** @var Client */
    private $elasticaClient;

    /** @var  Index */
    private $playListIndex;

    protected function configure()
    {
        $this
            ->setName('bundle:play_with_elasticsearch:create_elasticsearch_playlist_index')
            ->setDescription(
                'Create playlist index command'
            );
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->elasticaClient = new Client();
        $this->playListIndex = $this->elasticaClient->getIndex('playlist');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->createPlaylistIndex();
        $this->createMapping();
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
        $mapping->setType($this->playListIndex->getType('track'));
        $mapping->setParam('index_analyzer', 'indexAnalyzer');
        $mapping->setParam('search_analyzer', 'searchAnalyzer');

        // Define boost field
        $mapping->setParam('_boost', array('name' => '_boost', 'null_value' => 1.0));

        // Set mapping
        $mapping->setProperties(
            [
                'id' => [
                    'type' => 'integer',
                    'include_in_all' => false
                ],
                'album' => [
                    'type' => 'object',
                    'properties' => [
                        'id' => [
                            'type' => 'integer',
                            'include_in_all' => true
                        ],
                        'title' => [
                            'type' => 'string',
                            'include_in_all' => true
                        ]
                    ],
                ],
                'name' => [
                    'type' => 'string',
                    'include_in_all' => true
                ],
                'playList' => [
                    'type' => 'object',
                    'properties' => [
                        'id' => [
                            'type' => 'integer',
                            'include_in_all' => true
                        ],
                        'name' => [
                            'type' => 'string',
                            'include_in_all' => true
                        ]
                    ],
                ],
                'composer' => [
                    'type' => 'string',
                    'include_in_all' => true
                ]
            ]
        );

        // Send mapping to type
        $mapping->send();
    }
}
