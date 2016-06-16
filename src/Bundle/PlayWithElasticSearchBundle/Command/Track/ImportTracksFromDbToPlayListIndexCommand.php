<?php

namespace Bundle\PlayWithElasticSearchBundle\Command\Track;

use Atrapalo\Domain\Model\PlayList\Entity\PlayList;
use Atrapalo\Domain\Model\Track\Entity\Track;
use Elastica\Client;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ImportTracksFromDbToElastic
 */
class ImportTracksFromDbToPlayListIndexCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('bundle:play_with_elasticsearch:import_tracks_from_db_to_playlist_index')
            ->setDescription(
                'Import Tracks from playlists to index in playlist index'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $playLists = $this->getPlayLists();
        $documents = $this->createTrackDocuments($playLists);
        $this->addDocumentsToPlayListIndex($documents);
    }

    /**
     * @return PlayList[]
     */
    protected function getPlayLists()
    {
        $playListRepository = $this->getContainer()
            ->get('atrapalo.infrastructure.model.playlist.repository.playlist_repository');

        return $playListRepository->findAll();
    }

    /**
     * @param PlayList[] $playLists
     *
     * @return array
     */
    protected function createTrackDocuments(array $playLists)
    {
        $documents = [];

        foreach ($playLists as $playList) {
            /** @var Track $track */
            foreach ($playList->tracks() as $track) {
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
                    $playList->id(),
                    $playList->name()
                );
            }
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
     * @param int     $playListId
     * @param string  $playListName
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
        $playListId,
        $playListName
    ) {
        // Create a document
        $track = [
            'id' => $id,
            'album' => [
                'id' => $albumId,
                'title' => $albumTitle
            ],
            'name' => $name,
            'playList' => [
                'id' => $playListId,
                'name' => $playListName
            ],
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

        $playListIndex = $elasticaClient->getIndex('playlist');
        $trackType = $playListIndex->getType('track');

        $trackType->addDocuments($documents);
        $trackType->getIndex()->refresh();
    }
}
