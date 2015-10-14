<?php 

namespace LoginBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use UserBundle\Entity\User;
use UserBundle\Form\UserType;

class RegistrationType extends AbstractType
{
	/**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	->add('User', new UserType())
        	->add('Valider', 'submit');
    }

	/**
     * @return string
     */
    public function getName()
    {
        return 'userbundle_registration';
    }
}