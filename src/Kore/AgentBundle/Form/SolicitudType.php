<?php

namespace Kore\AgentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SolicitudType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('estado', null, array(
                'label'              => 'solicitud.form.estado',
                'attr'               => array( 'label_col' => 4, 'widget_col' => 8 ),
                'translation_domain' => 'KoreAgentBundle',
                'placeholder'        => 'solicitud.form.placeholder.estado',
                'required'           => true,
            ))
            ->add('tipo', null, array(
                'label'              => 'solicitud.form.tipo',
                'attr'               => array( 'label_col' => 4, 'widget_col' => 8 ),
                'translation_domain' => 'KoreAgentBundle',
                'placeholder'        => 'solicitud.form.placeholder.tipo',
                'required'           => true,
            ))
            ->add('nota', null, array(
                'label'              => 'solicitud.form.nota',
                'attr'               => array( 'label_col' => 4, 'widget_col' => 8 ),
                'translation_domain' => 'KoreAgentBundle',
            ))
            ->add('folio', null, array(
                'label'              => 'solicitud.form.folio',
                'attr'               => array( 'label_col' => 4, 'widget_col' => 8 ),
                'translation_domain' => 'KoreAgentBundle',
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kore\AdminBundle\Entity\Solicitud'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'kore_agentbundle_solicitud';
    }


}
