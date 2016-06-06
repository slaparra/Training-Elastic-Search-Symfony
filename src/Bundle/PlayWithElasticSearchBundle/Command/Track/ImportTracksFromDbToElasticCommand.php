<?php

namespace Bundle\PlayWithElasticSearchBundle\Command\Track;

use Atrapalo\Domain\Model\PlayList\Entity\PlayList;
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
            foreach ($playList->tracks() as $track) {
                $documents[] = $this->createTrackDocument(
                    $track->id(),
                    $track->name(),
                    $track->composer(),
                    $track->album()->id(),
                    $track->album()->title(),
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
     * @param int     $playListId
     * @param string  $playListName
     *
     * @return \Elastica\Document
     */
    public function createTrackDocument($id, $name, $composer, $albumId, $albumTitle, $playListId, $playListName)
    {
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
