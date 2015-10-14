<?php

namespace GenreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GenreBundle\Entity\GenreRepository")
 */
class Genre
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
     * @var array
     *
     * @ORM\Column(name="AssociateAudio", type="json_array", nullable=true)
     */
    private $associateAudio = null;


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
     * @return Genre
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
     * Set associateAudio
     *
     * @param array $associateAudio
     *
     * @return Genre
     */
    public function setAssociateAudio($associateAudio)
    {
        $this->associateAudio = $associateAudio;

        return $this;
    }

    /**
     * Get associateAudio
     *
     * @return array
     */
    public function getAssociateAudio()
    {
        return $this->associateAudio;
    }
}
