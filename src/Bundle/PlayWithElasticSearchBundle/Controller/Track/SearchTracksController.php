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
            ->handle(
                SearchTracksCommand::instance(
                    $request->get('album_title'),
                    $request->get('track_name'),
                    $request->get('composer'),
                    $this->get('request')->get('page', 1)
                )
            );

        return $this->render(
            '@PlayWithElasticSearch/Track/search-tracks.html.twig',
            [
                'tracks' => $trackResources,
                'album_title' => $request->get('album_title'),
                'track_name' => $request->get('track_name'),
                'composer' => $request->get('composer')
            ]
        );
    }
}
