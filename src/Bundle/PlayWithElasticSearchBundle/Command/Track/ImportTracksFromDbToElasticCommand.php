<?php

namespace Bundle\PlayWithElasticSearchBundle\Command\Track;

use Atrapalo\Domain\Model\Track\Entity\Track;
use Elastica\Client;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ImportTracksFromDbToElastic
 */
class ImportTracksFromDbToElasticCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('bundle:play_with_elasticsearch:import_tracks_from_db_to_elastic')
            ->setDescription(
                'Import Tracks from playlists to index in elasticsearch'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $tracks = $this->getTracks();
        $documents = $this->createTrackDocuments($tracks);
        $this->addDocumentsToPlayListIndex($documents);
    }

    /**
     * @return Track[]
     */
    protected function getTracks()
    {
        $trackRepository = $this->getContainer()
            ->get('atrapalo.infrastructure.model.track.repository.track_repository');

        return $trackRepository->findAll();
    }

    /**
     * @param $tracks
     *
     * @return array
     */
    protected function createTrackDocuments($tracks)
    {
        $documents = [];

        /** @var Track $track */
        foreach ($tracks as $track) {
            $documents[] = $this->createTrackDocument(
                $track->id(),
                $track->name(),
                $track->composer(),
                $track->album()->id(),
                $track->album()->title()
            );
        }

        return $documents;
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
    public function createTrackDocument($id, $name, $composer, $albumId, $albumTitle)
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

    /**
     * @param $documents
     */
    protected function addDocumentsToPlayListIndex($documents)
    {
        $elasticaClient = new Client();

        $playListIndex = $elasticaClient->getIndex('playlist');
        $trackType = $playListIndex->getType('track');

        $trackType->addDocuments($documents);
        $trackType->getIndex()->refresh();
    }
}
