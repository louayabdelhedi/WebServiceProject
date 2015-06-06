<?php

namespace WebService\WebServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FieldType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameField','text',array( 'attr' => array('class' => 'form-control','placeholder' => 'Enter field name')))
            ->add('typeField','text',array( 'attr' => array('class' => 'form-control','placeholder' => 'Enter type')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebService\WebServiceBundle\Entity\Field'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'webservice_webservicebundle_field';
    }
}
