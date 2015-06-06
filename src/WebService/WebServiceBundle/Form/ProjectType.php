<?php

namespace WebService\WebServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjectType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descProject','textarea',array( 'attr' => array('class' => 'form-control','placeholder' => 'Enter description')))
            ->add('host','text',array( 'attr' => array('class' => 'form-control','placeholder' => 'Enter host')))
            ->add('dbName','text',array( 'attr' => array('class' => 'form-control','placeholder' => 'Enter data base name')))
            ->add('loginDb','text',array( 'attr' => array('class' => 'form-control','placeholder' => 'Enter data base login')))
            ->add('pwdDb','text',array( 'attr' => array('class' => 'form-control','placeholder' => 'Enter data base password')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebService\WebServiceBundle\Entity\Project'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'webservice_webservicebundle_project';
    }
}
