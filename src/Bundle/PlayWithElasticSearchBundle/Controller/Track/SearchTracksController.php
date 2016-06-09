<?php

namespace Bundle\PlayWithElasticSearchBundle\Controller\Track;

use Atrapalo\Application\Model\Track\SearchTracks\SearchTracksCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SearchTracksController
 */
class SearchTracksController extends Controller
{
    public function searchTracksAction(Request $request)
    {
        $trackResources = $this
            ->get('atrapalo.application.model.track.search_tracks.search_tracks_command_handler')
            ->handle(SearchTracksCommand::instance());

        return $this->render(
            '@PlayWithElasticSearch/Track/search-tracks.html.twig',
            [
                'tracks' => $trackResources,
                'playlist_name' => $request->get('playlist_name'),
                'track_name' => $request->get('track_name'),
                'composer' => $request->get('composer')
            ]
        );
    }
}
