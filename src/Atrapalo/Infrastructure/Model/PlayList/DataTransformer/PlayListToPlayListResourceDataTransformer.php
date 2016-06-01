<?php

namespace Atrapalo\Infrastructure\Model\PlayList\DataTransformer;

use Atrapalo\Domain\Model\PlayList\DataTransformer\PlayListDataTransformer;
use Atrapalo\Domain\Model\PlayList\Entity\PlayList;
use Atrapalo\Infrastructure\Model\PlayList\Resource\PlayListResource;

/**
 * Class PlayListToPlayListResourceDataTransformer
 */
class PlayListToPlayListResourceDataTransformer implements PlayListDataTransformer
{
    /**
     * @param PlayList $playList
     *
     * @return mixed
     */
    public function transform(PlayList $playList)
    {
        return PlayListResource::instance($playList->id(), $playList->name());
    }
}
