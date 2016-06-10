<?php

namespace Atrapalo\Application\Model\Track\CreateTrack;

use Atrapalo\Application\Model\Command\Command;

/**
 * Class CreateTrackCommand
 */
class CreateTrackCommand implements Command
{
    /** @var string */
    private $name;

    /** @var int */
    private $albumId;

    /** @var int */
    private $mediaTypeId;

    /** @var int */
    private $genreId;

    /** @var string */
    private $composer;

    /** @var int */
    private $milliseconds;

    /** @var int */
    private $bytes;

    /** @var float */
    private $unitPrice;

    /** @var int */
    private $playListId;

    private function __construct(
        string $name,
        int $albumId,
        int $mediaTypeId,
        int $genreId,
        string $composer,
        int $milliseconds,
        int $bytes,
        float $unitPrice,
        int $playListId
    ) {
        $this->name = $name;
        $this->albumId = $albumId;
        $this->mediaTypeId = $mediaTypeId;
        $this->genreId = $genreId;
        $this->composer = $composer;
        $this->milliseconds = $milliseconds;
        $this->bytes = $bytes;
        $this->unitPrice = $unitPrice;
        $this->playListId = $playListId;
    }

    public static function instance(
        string $name,
        int $albumId,
        int $mediaTypeId,
        int $genreId,
        string $composer,
        int $milliseconds,
        int $bytes,
        float $unitPrice,
        int $playListId
    ): CreateTrackCommand {
        return new static(
            $name,
            $albumId,
            $mediaTypeId,
            $genreId,
            $composer,
            $milliseconds,
            $bytes,
            $unitPrice,
            $playListId
        );
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function albumId(): int
    {
        return $this->albumId;
    }

    /**
     * @return int
     */
    public function mediaTypeId(): int
    {
        return $this->mediaTypeId;
    }

    /**
     * @return int
     */
    public function genreId(): int
    {
        return $this->genreId;
    }

    /**
     * @return string
     */
    public function composer(): string
    {
        return $this->composer;
    }

    /**
     * @return int
     */
    public function milliseconds(): int
    {
        return $this->milliseconds;
    }

    /**
     * @return int
     */
    public function bytes(): int
    {
        return $this->bytes;
    }

    /**
     * @return float
     */
    public function unitPrice(): float
    {
        return $this->unitPrice;
    }

    /**
     * @return int
     */
    public function playListId(): int
    {
        return $this->playListId;
    }
}
