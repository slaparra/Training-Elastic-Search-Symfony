<?php

namespace Bundle\PlayWithElasticSearchBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Mediatype
 *
 * @ORM\Table(name="MediaType", uniqueConstraints={@ORM\UniqueConstraint(name="IPK_MediaType", columns={"MediaTypeId"})})
 * @ORM\Entity
 */
class MediaType
{
    /**
     * @var integer
     *
     * @ORM\Column(name="MediaTypeId", type="integer", nullable=false)
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
     * @ORM\OneToMany(targetEntity="Bundle\PlayWithElasticSearchBundle\Entity\Track", mappedBy="mediaType", fetch="EXTRA_LAZY")
     */
    private $tracks;

    /**
     * Get mediatypeid
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
     * @return MediaType
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
     * @return MediaType
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
