<?php

namespace Bundle\PlayWithElasticSearchBundle\Controller\Track;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class GetPlayListTracksController
 */
class GetPlayListTracksController extends Controller
{
    /**
     * @param int $playListId
     *
     * @return Response
     */
    public function getPlayListTracksAction(int $playListId)
    {
        //@todo extract to use case
        $playListRepositoryImpl = $this->get('atrapalo.infrastructure.model.playlist.repository.playlist_repository');

        return $this->render(
            'PlayWithElasticSearchBundle:Playlists:tracks.html.twig',
            ['playlist' => $playListRepositoryImpl->withTracks($playListId)]
        );
    }
}
