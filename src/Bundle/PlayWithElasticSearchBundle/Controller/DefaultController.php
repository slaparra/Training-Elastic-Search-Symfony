<?php

namespace Bundle\PlayWithElasticSearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $playlistRepository = $this->get('playlist_repository');

        return $this->render(
            'PlayWithElasticSearchBundle:Playlists:index.html.twig',
            ['playlists'  => $playlistRepository->findAll()]
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function tracksAction($id)
    {
        $playlistRepository = $this->get('playlist_repository');

        return $this->render(
            'PlayWithElasticSearchBundle:Playlists:tracks.html.twig',
            [
                'playlist' => $playlistRepository->withTracks($id)
            ]
        );
    }

    public function trackAction($id, $trackId)
    {
        $trackRepository = $this->get('track_repository');

        return $this->render(
            'PlayWithElasticSearchBundle:Playlists:track.html.twig',
            [
                'track' => $trackRepository->withAlbumMediaTypeAndGenre($trackId)
            ]
        );
    }
}
