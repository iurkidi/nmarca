<?php

namespace uni\bundle\marcaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class anunciosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('texto')
            ->add('compania')
            ->add('noticiass')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'uni\bundle\marcaBundle\Entity\anuncios'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'uni_bundle_marcabundle_anuncios';
    }
}
