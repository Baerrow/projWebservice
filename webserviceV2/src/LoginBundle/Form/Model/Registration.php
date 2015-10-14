<?php

namespace LoginBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;
use UserBundle\Entity\User;

class Registration{
    /**
     * @Assert\Type(type="UserBundle\Entity\User")
     * @Assert\Valid()
     */
    protected $user;

    public function setUser(User $user){
        $this->user = $user;
    }

    public function getUser(){
        return $this->user;
    }
}