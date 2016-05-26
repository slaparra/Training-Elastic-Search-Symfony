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
        $response = $this->render(
            'PlayWithElasticSearchBundle:Playlists:index.html.twig',
            ['playlists' => $this->get('playlist_repository')->findAll()]
        );

        return $response;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function tracksAction($id)
    {
        $playListRepositoryImpl = $this->get('playlist_repository');
        $response = $this->render(
            'PlayWithElasticSearchBundle:Playlists:tracks.html.twig',
            ['playlist' => $this->get('playlist_repository')->withTracks($id)]
        );

        return $response
            ->setPublic()
            ->setEtag(md5(time()));
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
