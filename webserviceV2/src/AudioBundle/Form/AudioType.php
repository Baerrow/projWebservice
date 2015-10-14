<?php

namespace AudioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AudioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('number')
            ->add('description')
            ->add('isSaga')
            ->add('genre')
            ->add('author')
            ->add('link')
            ->add('uploadedBy')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AudioBundle\Entity\Audio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'audiobundle_audio';
    }
}
