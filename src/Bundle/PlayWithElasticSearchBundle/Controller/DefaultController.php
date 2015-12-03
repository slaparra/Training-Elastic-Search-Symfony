<?php

namespace Bundle\PlayWithElasticSearchBundle\Controller;

use Redis;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $cache = new \Doctrine\Common\Cache\RedisCache();
        $redis = new Redis();
        $redis->connect('localhost', 6379);
        $cache->setRedis($redis);
        $cacheFunctionId = __FUNCTION__;

        if($cachedResponse = $cache->fetch($cacheFunctionId)) {
            return $cachedResponse;
        }

        $response = $this->render(
            'PlayWithElasticSearchBundle:Playlists:index.html.twig',
            ['playlists' => $this->get('playlist_repository')->findAll()]
        );
        $cache->save($cacheFunctionId, $response, 60);

        return $response;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function tracksAction($id)
    {
        $cache = new \Doctrine\Common\Cache\ApcCache();
        $cacheFunctionId = __FUNCTION__.$id;

        if($cachedResponse = $cache->fetch($cacheFunctionId)) {
            return $cachedResponse;
        }

        $response = $this->render(
            'PlayWithElasticSearchBundle:Playlists:tracks.html.twig',
            ['playlist' => $this->get('playlist_repository')->withTracks($id)]
        );

        $cache->save($cacheFunctionId, $response, 60);

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
