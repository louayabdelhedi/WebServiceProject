<?php

namespace WebService\WebServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ModelType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameModel','text',array( 'attr' => array('class' => 'form-control','placeholder' => 'Enter model')))
            ->add('descModel','textarea',array( 'attr' => array('class' => 'form-control','placeholder' => 'Enter model description ')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebService\WebServiceBundle\Entity\Model'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'webservice_webservicebundle_model';
    }
}
