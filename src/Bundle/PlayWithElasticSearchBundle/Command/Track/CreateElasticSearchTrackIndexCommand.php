<?php

namespace Bundle\PlayWithElasticSearchBundle\Command\Track;

use Elastica\Client;
use Elastica\Index;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CreateElasticSearchTrackIndexCommand
 */
class CreateElasticSearchTrackIndexCommand extends ContainerAwareCommand
{
    /** @var  Index */
    private $trackIndex;

    protected function configure()
    {
        $this
            ->setName('bundle:play_with_elasticsearch:create_track_index')
            ->setDescription(
                'Create track index command'
            );
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->trackIndex = $this->getContainer()->get('ruflin.elastica.client')->getIndex('track_index');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->createPlaylistIndex();
        $this->createMapping();
    }

    private function createPlaylistIndex()
    {
        // Create the index new
        $this->trackIndex->create(
            [
                'number_of_shards' => 4,
                'number_of_replicas' => 1,
                'analysis' => [
                    'analyzer' => [
                        'indexAnalyzer' => [
                            'type' => 'snowball',
                            'tokenizer' => 'standard',
                            'filter' => ['lowercase', 'mySnowball'],
                            'language' => 'English',
                            'stopwords' => 'a, the, in'
                        ],
                        'searchAnalyzer' => [
                            'type' => 'custom',
                            'tokenizer' => 'standard',
                            'filter' => ['standard', 'lowercase', 'mySnowball']
                        ]
                    ],
                    'filter' => [
                        'mySnowball' => [
                            'type' => 'snowball',
                            'language' => 'English'
                        ]
                    ]
                ]
            ],
            true //The argument is an OPTIONAL bool=> (true) Deletes index first if already exists (default = false)
        );
    }

    public function createMapping()
    {
        // Define mapping
        $mapping = new \Elastica\Type\Mapping();
        $mapping->setType($this->trackIndex->getType('track'));

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
                    'type' => 'nested',
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
                'genre' => [
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
                'mediaType' => [
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
