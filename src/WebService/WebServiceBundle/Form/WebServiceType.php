<?php

namespace WebService\WebServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WebServiceType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameWS','text',array( 'attr' => array('class' => 'form-control','placeholder' => 'Enter name')))
            ->add('linkWS','text',array( 'attr' => array('class' => 'form-control','placeholder' => 'Enter link')))
            ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebService\WebServiceBundle\Entity\WebService'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'webservice_webservicebundle_webservice';
    }
}
