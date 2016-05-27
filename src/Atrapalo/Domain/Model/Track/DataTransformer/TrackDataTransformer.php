<?php

namespace Atrapalo\Domain\Model\Track\DataTransformer;

use Atrapalo\Domain\Model\Track\Entity\Track;

/**
 * Interface TrackDataTransformer
 */
interface TrackDataTransformer
{
    /**
     * @param Track $track
     *
     * @return mixed
     */
    public function transform(Track $track);
}
