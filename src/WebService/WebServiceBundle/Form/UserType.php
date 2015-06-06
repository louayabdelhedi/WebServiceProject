<?php

namespace WebService\WebServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName','text',array( 'attr' => array('class' => 'form-control','placeholder' => 'Enter your first name')))
            ->add('lastName','text',array( 'attr' => array('class' => 'form-control','placeholder' => 'Enter your last name')))
            ->add('login','text',array( 'attr' => array('class' => 'form-control','placeholder' => 'Enter login')))
            ->add('password','password',array( 'attr' => array('class' => 'form-control','placeholder' => 'Enter your password')))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebService\WebServiceBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'webservice_webservicebundle_user';
    }
}
