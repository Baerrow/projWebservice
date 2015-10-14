<?php

namespace AudioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Audio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AudioBundle\Entity\AudioRepository")
 */
class Audio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="Number", type="float")
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text")
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsSaga", type="boolean")
     */
    private $isSaga = false;

    /**
     * @var guid
     *
     * @ORM\Column(name="Genre", type="guid")
     */
    private $genre;

    /**
     * @var guid
     *
     * @ORM\Column(name="Author", type="guid")
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="Link", type="text")
     */
    private $link;

    /**
     * @var guid
     *
     * @ORM\Column(name="UploadedBy", type="guid", nullable=true)
     */
    private $uploadedBy;


    /**
     * Get id
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
     * @return Audio
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
     * Set number
     *
     * @param float $number
     *
     * @return Audio
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return float
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Audio
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set isSaga
     *
     * @param boolean $isSaga
     *
     * @return Audio
     */
    public function setIsSaga($isSaga)
    {
        $this->isSaga = $isSaga;

        return $this;
    }

    /**
     * Get isSaga
     *
     * @return boolean
     */
    public function getIsSaga()
    {
        return $this->isSaga;
    }

    /**
     * Set genre
     *
     * @param guid $genre
     *
     * @return Audio
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return guid
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set author
     *
     * @param guid $author
     *
     * @return Audio
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return guid
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Audio
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set uploadedBy
     *
     * @param guid $uploadedBy
     *
     * @return Audio
     */
    public function setUploadedBy($uploadedBy)
    {
        $this->uploadedBy = $uploadedBy;

        return $this;
    }

    /**
     * Get uploadedBy
     *
     * @return guid
     */
    public function getUploadedBy()
    {
        return $this->uploadedBy;
    }
}
