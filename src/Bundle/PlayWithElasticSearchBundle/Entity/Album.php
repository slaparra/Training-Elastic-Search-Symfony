<?php

namespace Bundle\PlayWithElasticSearchBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Album
 *
 * @ORM\Table(name="Album", uniqueConstraints={@ORM\UniqueConstraint(name="IPK_Album", columns={"AlbumId"})}, indexes={@ORM\Index(name="IFK_AlbumArtistId", columns={"ArtistId"})})
 * @ORM\Entity
 */
class Album
{
    /**
     * @var integer
     *
     * @ORM\Column(name="AlbumId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Title", type="string", length=160, nullable=false)
     */
    private $title;

    /**
     * @var Artist
     *
     * @ORM\ManyToOne(targetEntity="Bundle\PlayWithElasticSearchBundle\Entity\Artist", inversedBy="albums")
     * @ORM\JoinColumn(name="ArtistId", referencedColumnName="ArtistId")
     */
    private $artist;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="Bundle\PlayWithElasticSearchBundle\Entity\Track", mappedBy="album")
     */
    private $tracks;

    /**
     * Get albumid
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Album
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set artist
     *
     * @param Artist $artist
     *
     * @return Album
     */
    public function setArtist(Artist $artist = null)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist
     *
     * @return Artist
     */
    public function getArtist()
    {
        return $this->artist;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tracks = new ArrayCollection();
    }

    /**
     * Add track
     *
     * @param Track $track
     *
     * @return Album
     */
    public function addTrack(Track $track)
    {
        $this->tracks[] = $track;

        return $this;
    }

    /**
     * Remove track
     *
     * @param Track $track
     */
    public function removeTrack(Track $track)
    {
        $this->tracks->removeElement($track);
    }

    /**
     * Get tracks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTracks()
    {
        return $this->tracks;
    }
}
