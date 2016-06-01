<?php

namespace Bundle\PlayWithElasticSearchBundle\Controller;

use Atrapalo\Application\Model\PlayList\CommandHandler\SearchPlaylists\SearchPlayListsCommand;
use Atrapalo\Application\Model\Track\GetTrack\GetTrackCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @return Response
     */
    public function playListsAction()
    {
        $playListResources = $this
            ->get('atrapalo.application.model.playlist.search_playlists.search_playlists_command_handler')
            ->handle(SearchPlayListsCommand::instance());

        return $this->render(
            'PlayWithElasticSearchBundle:Playlists:index.html.twig',
            ['playlists' => $playListResources]
        );
    }

    /**
     * @param int $playListId
     *
     * @return Response
     */
    public function playListTracksAction(int $playListId)
    {
        $playListRepositoryImpl = $this->get('atrapalo.infrastructure.model.playlist.repository.playlist_repository');
        $response = $this->render(
            'PlayWithElasticSearchBundle:Playlists:tracks.html.twig',
            ['playlist' => $playListRepositoryImpl->withTracks($playListId)]
        );

        return $response
            ->setPublic()
            ->setEtag(md5(time()));
    }

    /**
     * @param $playListId
     * @param $trackId
     *
     * @return Response
     */
    public function trackAction($playListId, $trackId)
    {
        $trackResource = $this->get('atrapalo.application.model.track.get_track.get_track_command_handler')
            ->handle(GetTrackCommand::instance($trackId));

        return $this->render('PlayWithElasticSearchBundle:Playlists:track.html.twig', ['track' => $trackResource]);
    }
}
