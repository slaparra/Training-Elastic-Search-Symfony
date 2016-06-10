<?php

namespace Bundle\PlayWithElasticSearchBundle\Controller\Track;

use Atrapalo\Application\Model\Track\CreateTrack\CreateTrackCommand;
use Atrapalo\Infrastructure\Model\Track\Resource\TrackResource;
use Bundle\PlayWithElasticSearchBundle\Form\Album\Resource\AlbumResource;
use Bundle\PlayWithElasticSearchBundle\Form\Genre\Resource\GenreResource;
use Bundle\PlayWithElasticSearchBundle\Form\MediaType\Resource\MediaTypeResource;
use Bundle\PlayWithElasticSearchBundle\Form\PlayList\Resource\PlayListResource;
use Bundle\PlayWithElasticSearchBundle\Form\Track\Type\CreateTrackFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CreateTrackController
 */
class CreateTrackController extends Controller
{
    public function createTrackFormAction(Request $request)
    {
        $form = $this->createForm(CreateTrackFormType::class, null, $this->buildFormOptions());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                /** @var TrackResource $trackResource */
                $trackResource = $this
                    ->get('atrapalo.application.model.track.create_track.create_track_command_handler')
                    ->handle(
                        CreateTrackCommand::instance(
                            $form->get('name')->getData(),
                            $form->get('album')->getData(),
                            $form->get('media_type')->getData(),
                            $form->get('genre')->getData(),
                            $form->get('composer')->getData(),
                            $form->get('milliseconds')->getData(),
                            $form->get('bytes')->getData(),
                            $form->get('unitprice')->getData(),
                            $form->get('playlist')->getData()
                        )
                    );

                $this->addFlash('notice', 'Guardado correctamente');

                return $this->redirectToRoute('app_track', ['trackId'=> $trackResource->id()]);
            } catch (\Exception $e) {
                $this->addFlash('error', 'Ha habido un error al guardar el track: '.$e->getMessage());
            }
        }

        return $this->render(
            'PlayWithElasticSearchBundle:Track:create-track.html.twig',
            ['form' => $form->createView()]
        );
    }

    /**
     * @return array
     */
    private function buildFormOptions()
    {
        //@TODO: get resources from use cases, not hardcoded
        return [
            'action' => $this->generateUrl('app_create_track'),
            'albums' => [
                1 => new AlbumResource(1, 'For Those About To Rock We Salute You'),
                2 => new AlbumResource(2, 'Balls to the Wall'),
                3 => new AlbumResource(3, 'Restless and Wild'),
                4 => new AlbumResource(4, 'Let There Be Rock')
            ],
            'play_lists' => [
                1 => new PlayListResource(1, 'Music'),
                2 => new PlayListResource(2, 'Movies'),
                3 => new PlayListResource(3, 'Tv Shows')
            ],
            'genres' => [
                1 => new GenreResource(1, 'Rock'),
                2 => new GenreResource(2, 'Jazz'),
                3 => new GenreResource(3, 'Metal'),
                4 => new GenreResource(4, 'Alternative & Punk')
            ],
            'media_types' => [
                1 => new MediaTypeResource(1, 'MPEG audio file'),
                2 => new MediaTypeResource(2, 'Protected AAC audio file'),
                3 => new MediaTypeResource(3, 'Protected MPEG-4 video file'),
                4 => new MediaTypeResource(4, 'Purchased AAC audio file'),
                5 => new MediaTypeResource(5, 'AAC audio file')
            ]

        ];
    }
}
