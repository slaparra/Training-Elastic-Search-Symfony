<?php

namespace Bundle\PlayWithElasticSearchBundle\Controller\Track;

use Atrapalo\Application\Model\Track\GetTrack\GetTrackCommand;
use Atrapalo\Application\Model\Track\SearchTracks\SearchTracksCommand;
use Atrapalo\Infrastructure\Model\Track\Resource\TrackResource;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class GetTrackController
 */
class GetTrackController extends Controller
{
    /**
     * @param $trackId
     *
     * @return Response
     */
    public function trackAction($trackId)
    {
        /** @var TrackResource $trackResource */
        $trackResource = $this->get('atrapalo.application.model.track.get_track.get_track_command_handler')
            ->handle(GetTrackCommand::instance($trackId));

        $albumTracks = $this->get('atrapalo.application.model.track.search_tracks.search_tracks_command_handler')
            ->handle(SearchTracksCommand::instance(null, null, null, 1, $trackResource->album()->id()));

        return $this->render(
            'PlayWithElasticSearchBundle:Playlists:track.html.twig',
            ['track' => $trackResource, 'albumTracks' => $albumTracks]
        );
    }
}
