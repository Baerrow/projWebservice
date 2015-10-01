<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\UserRepository")
 * @UniqueEntity(fields="email", message="Email already taken")
 */
class User
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
     * @ORM\Column(name="Email", type="string", length=255, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsAdmin", type="boolean")
     */
    private $isAdmin = false;

    /**
     * @var array
     *
     * @ORM\Column(name="Listen", type="json_array", nullable=true)
     */
    private $listen = null;

    /**
     * @var array
     *
     * @ORM\Column(name="Uploaded", type="json_array", nullable=true)
     */
    private $uploaded = null;


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
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set isAdmin
     *
     * @param boolean $isAdmin
     *
     * @return User
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * Get isAdmin
     *
     * @return boolean
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * Set listen
     *
     * @param array $listen
     *
     * @return User
     */
    public function setListen($listen)
    {
        $this->listen = $listen;

        return $this;
    }

    /**
     * Get listen
     *
     * @return array
     */
    public function getListen()
    {
        return $this->listen;
    }

    /**
     * Set uploaded
     *
     * @param array $uploaded
     *
     * @return User
     */
    public function setUploaded($uploaded)
    {
        $this->uploaded = $uploaded;

        return $this;
    }

    /**
     * Get uploaded
     *
     * @return array
     */
    public function getUploaded()
    {
        return $this->uploaded;
    }
}

