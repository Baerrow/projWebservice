<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Audio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AudioRepository")
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
     * @ORM\Column(name="Name", type="string", length=255, unique=true)
     * @Assert\NotBlank()
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
     * @Assert\NotBlank()
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Saga", type="boolean")
     */
    private $saga;

    /**
     * @var guid
     *
     * @ORM\Column(name="Genre", type="guid", length=255)
     */
    private $genre;

    /**
     * @var guid
     *
     * @ORM\Column(name="Author", type="guid", length=255)
     * @Assert\NotBlank()
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="Link", type="text", unique=true)
     * @Assert\NotBlank()
     */
    private $link;

    /**
     * @var guid
     *
     * @ORM\Column(name="UploadBy", type="guid", length=255)
     */
    private $uploadBy;

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
     * Set saga
     *
     * @param boolean $saga
     *
     * @return Audio
     */
    public function setSaga($saga)
    {
        $this->saga = $saga;

        return $this;
    }

    /**
     * Get saga
     *
     * @return boolean
     */
    public function getSaga()
    {
        return $this->saga;
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
     * @return string
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
     * Set uploadBy
     *
     * @param guid $uploadBy
     *
     * @return Audio
     */
    public function setUploadBy($uploadBy)
    {
        $this->uploadBy = $uploadBy;

        return $this;
    }

    /**
     * Get uploadBy
     *
     * @return guid
     */
    public function getUploadBy()
    {
        return $this->uploadBy;
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
}

