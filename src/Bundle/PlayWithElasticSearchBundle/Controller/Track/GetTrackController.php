<?php

namespace Bundle\PlayWithElasticSearchBundle\Controller\Track;

use Atrapalo\Application\Model\Track\GetTrack\GetTrackCommand;
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
        $trackResource = $this->get('atrapalo.application.model.track.get_track.get_track_command_handler')
            ->handle(GetTrackCommand::instance($trackId));

        return $this->render('PlayWithElasticSearchBundle:Playlists:track.html.twig', ['track' => $trackResource]);
    }
}
