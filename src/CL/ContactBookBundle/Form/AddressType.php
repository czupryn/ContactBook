<?php

namespace CL\ContactBookBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('city')
            ->add('street')
            ->add('number')
            ->add('flatNumber')
            ->add('contact')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CL\ContactBookBundle\Entity\Address'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cl_contactbookbundle_address';
    }
}
