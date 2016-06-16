<?php

namespace Bundle\PlayWithElasticSearchBundle\Command\Track;

use Atrapalo\Domain\Model\PlayList\Entity\PlayList;
use Atrapalo\Domain\Model\Track\Entity\Track;
use Doctrine\Common\Collections\Collection;
use Elastica\Client;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ImportTracksFromDbToElastic
 */
class ImportTracksFromDbToTrackIndexCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('bundle:play_with_elasticsearch:import_tracks_from_db_to_track_index')
            ->setDescription(
                'Import all Tracks to index in track index'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $tracks = $this->getTracks();
        $documents = $this->createTrackDocuments($tracks);
        $this->addDocumentsToPlayListIndex($documents);
    }

    /**
     * @return PlayList[]
     */
    protected function getTracks()
    {
        $trackRepository = $this->getContainer()
            ->get('atrapalo.infrastructure.model.track.repository.track_repository');

        return $trackRepository->findAll();
    }

    /**
     * @param Track[] $tracks
     *
     * @return array
     */
    protected function createTrackDocuments(array $tracks)
    {
        $documents = [];

        foreach ($tracks as $track) {
            $documents[] = $this->createTrackDocument(
                $track->id(),
                $track->name(),
                $track->composer(),
                $track->album()->id(),
                $track->album()->title(),
                $track->genre()->id(),
                $track->genre()->name(),
                $track->mediaType()->id(),
                $track->mediaType()->name(),
                $track->playLists()
            );
        }

        return $documents;
    }

    /**
     * @param integer $id
     * @param string  $name
     * @param string  $composer
     * @param int     $albumId
     * @param string  $albumTitle
     * @param int     $genreId
     * @param string  $genreName
     * @param int     $mediaTypeId
     * @param string  $mediaTypeName
     * @param Collection $playLists
     *
     * @return \Elastica\Document
     */
    public function createTrackDocument(
        $id,
        $name,
        $composer,
        $albumId,
        $albumTitle,
        $genreId,
        $genreName,
        $mediaTypeId,
        $mediaTypeName,
        Collection $playLists
    ) {
        // Create a document
        $track = [
            'id' => $id,
            'album' => [
                'id' => $albumId,
                'title' => $albumTitle
            ],
            'name' => $name,
            'playList' => $this->buildPlayListToIndex($playLists),
            'genre' => [
                'id' => $genreId,
                'name' => $genreName
            ],
            'mediaType' => [
                'id' => $mediaTypeId,
                'name' => $mediaTypeName
            ],
            'composer' => $composer
        ];

        // First parameter is the id of document.
        return new \Elastica\Document($id, $track);
    }

    /**
     * @param $documents
     */
    protected function addDocumentsToPlayListIndex($documents)
    {
        $elasticaClient = new Client();

        $playListIndex = $elasticaClient->getIndex('track_index');
        $trackType = $playListIndex->getType('track');

        $trackType->addDocuments($documents);
        $trackType->getIndex()->refresh();
    }

    /**
     * @param Collection $playLists
     *
     * @return array
     */
    protected function buildPlayListToIndex(Collection $playLists)
    {
        $playListObjects = [];
        /** @var PlayList $playList */
        foreach ($playLists as $playList) {
            $playListObjects[] = ['id' => $playList->id(), 'name' => $playList->name()];
        }

        return $playListObjects;
    }
}
