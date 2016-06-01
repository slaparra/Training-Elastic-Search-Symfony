<?php

namespace Atrapalo\Domain\Model\PlayList\DataTransformer;

use Atrapalo\Domain\Model\PlayList\Entity\PlayList;

/**
 * Interface PlayListDataTransformer
 */
interface PlayListDataTransformer
{
    /**
     * @param PlayList $playList
     *
     * @return mixed
     */
    public function transform(PlayList $playList);
}
