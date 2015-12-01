<?php

namespace Bundle\PlayWithElasticSearchBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="Track", uniqueConstraints={@ORM\UniqueConstraint(name="IPK_Track", columns={"TrackId"})}, indexes={@ORM\Index(name="IFK_TrackMediaTypeId", columns={"MediaTypeId"}), @ORM\Index(name="IFK_TrackGenreId", columns={"GenreId"}), @ORM\Index(name="IFK_TrackAlbumId", columns={"AlbumId"})})
 * @ORM\Entity(repositoryClass="TrackRepository")
 * @ORM\Cache(usage="READ_ONLY")
 */
class Track
{
    /**
     * @var integer
     *
     * @ORM\Column(name="TrackId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=200, nullable=false)
     */
    private $name;

    /**
     * @var Album
     *
     * @ORM\ManyToOne(targetEntity="Bundle\PlayWithElasticSearchBundle\Entity\Album", inversedBy="tracks")
     * @ORM\JoinColumn(name="AlbumId", referencedColumnName="AlbumId")
     */
    private $album;

    /**
     * @var MediaType
     *
     * @ORM\ManyToOne(targetEntity="Bundle\PlayWithElasticSearchBundle\Entity\MediaType", inversedBy="tracks")
     * @ORM\JoinColumn(name="MediaTypeId", referencedColumnName="MediaTypeId")
     */
    private $mediaType;

    /**
     * @var Genre
     *
     * @ORM\ManyToOne(targetEntity="Bundle\PlayWithElasticSearchBundle\Entity\Genre", inversedBy="tracks")
     * @ORM\JoinColumn(name="GenreId", referencedColumnName="GenreId")
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="Composer", type="string", length=220, nullable=true)
     */
    private $composer;

    /**
     * @var integer
     *
     * @ORM\Column(name="Milliseconds", type="integer", nullable=false)
     */
    private $milliseconds;

    /**
     * @var integer
     *
     * @ORM\Column(name="Bytes", type="integer", nullable=true)
     */
    private $bytes;

    /**
     * @var string
     *
     * @ORM\Column(name="UnitPrice", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $unitPrice;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="Bundle\PlayWithElasticSearchBundle\Entity\InvoiceLine", mappedBy="track", fetch="EXTRA_LAZY")
     */
    private $invoiceLines;

    /**
     * Get trackid
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
     * @return Track
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
     * Set composer
     *
     * @param string $composer
     *
     * @return Track
     */
    public function setComposer($composer)
    {
        $this->composer = $composer;

        return $this;
    }

    /**
     * Get composer
     *
     * @return string
     */
    public function getComposer()
    {
        return $this->composer;
    }

    /**
     * Set milliseconds
     *
     * @param integer $milliseconds
     *
     * @return Track
     */
    public function setMilliseconds($milliseconds)
    {
        $this->milliseconds = $milliseconds;

        return $this;
    }

    /**
     * Get milliseconds
     *
     * @return integer
     */
    public function getMilliseconds()
    {
        return $this->milliseconds;
    }

    /**
     * Set bytes
     *
     * @param integer $bytes
     *
     * @return Track
     */
    public function setBytes($bytes)
    {
        $this->bytes = $bytes;

        return $this;
    }

    /**
     * Get bytes
     *
     * @return integer
     */
    public function getBytes()
    {
        return $this->bytes;
    }

    /**
     * Set unitprice
     *
     * @param string $unitPrice
     *
     * @return Track
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * Get unitprice
     *
     * @return string
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->invoiceLines = new ArrayCollection();
    }

    /**
     * Set album
     *
     * @param Album $album
     *
     * @return Track
     */
    public function setAlbum(Album $album = null)
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Get album
     *
     * @return Album
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * Set mediaType
     *
     * @param MediaType $mediaType
     *
     * @return Track
     */
    public function setMediaType(MediaType $mediaType = null)
    {
        $this->mediaType = $mediaType;

        return $this;
    }

    /**
     * Get mediaType
     *
     * @return MediaType
     */
    public function getMediaType()
    {
        return $this->mediaType;
    }

    /**
     * Set genre
     *
     * @param Genre $genre
     *
     * @return Track
     */
    public function setGenre(Genre $genre = null)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return Genre
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Get invoiceLines
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInvoiceLines()
    {
        return $this->invoiceLines;
    }

    /**
     * Add invoiceLine
     *
     * @param InvoiceLine $invoiceLine
     *
     * @return Track
     */
    public function addInvoiceLine(InvoiceLine $invoiceLine)
    {
        $this->invoiceLines[] = $invoiceLine;

        return $this;
    }

    /**
     * Remove invoiceLine
     *
     * @param InvoiceLine $invoiceLine
     */
    public function removeInvoiceLine(InvoiceLine $invoiceLine)
    {
        $this->invoiceLines->removeElement($invoiceLine);
    }
}
