<?php

namespace Bundle\PlayWithElasticSearchBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Playlist
 *
 * @ORM\Table(name="Playlist", uniqueConstraints={@ORM\UniqueConstraint(name="IPK_Playlist", columns={"PlaylistId"})})
 * @ORM\Entity(repositoryClass="PlaylistRepository")
 * @ORM\Cache(usage="READ_ONLY")
 */
class Playlist
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PlaylistId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=120, nullable=true)
     */
    private $name;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="Bundle\PlayWithElasticSearchBundle\Entity\Track")
     * @ORM\JoinTable(
     *      name="PlaylistTrack",
     *      joinColumns={@ORM\JoinColumn(name="PlaylistId", referencedColumnName="PlaylistId")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="TrackId", referencedColumnName="TrackId")}
     * )
     */
    private $tracks;


    /**
     * Get playlistid
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Playlist
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * @return Playlist
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

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Playlist
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getUpdatedAtAsString()
    {
        return $this->updatedAt->format('dmYHis');
    }

    public function countOfTracks()
    {
        return $this->tracks->count();
    }
}
