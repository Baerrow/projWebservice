<?php

namespace AudioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use AuthorBundle\Entity\Author;
// use AuthorBundle\Form\AuthorType;
use Doctrine\ORM\EntityRepository;

class AudioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'Nom de l\'audio :'))
            ->add('number', 'text', array('label' => 'Numéro de l\'audio dans sa série :'))
            ->add('description', 'textarea', array('label' => 'Description :'))
            ->add('isSaga', 'checkbox', array(
                'label' => 'Fait-il parti d\'une saga ?',
                'required'  => false
                )
            )
            ->add('genre', 'choice', array(
                'label' => 'Genre',
                'choices' => array(
                    'fantasy' => 'fantasy',
                    'horreur' => 'horreur')
                )
            )
            ->add('link', 'text', array('label' => 'Lien de l\'audio :'))
            ->add('uploadedBy', 'text', array('label' => 'Proposé par :'))
            ->add('authors', 'entity', array(
                'class' => 'AuthorBundle:Author',
                'choice_label' => 'name',
                'multiple' => true
                )
            )
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
