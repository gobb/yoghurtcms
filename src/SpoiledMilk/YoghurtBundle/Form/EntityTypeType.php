<?php

namespace SpoiledMilk\YoghurtBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EntityTypeType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', 'text')
                ->add('namePlural', 'text', array(
                    'label' => 'Name (plural)',
                    'required' => false))
                ->add('slug', 'text', array(
                    'attr' => array(
                        'placeholder' => 'Leave blank for default'
                        )))
                ->add('fields', 'collection', array(
                    'type' => new FieldType()))
                ->add('entityTypeVocabularies', 'collection', array(
                    'label' => 'Vocabularies',
                    'type' => new EntityTypeVocabularyType()
                ))
        ;
    }

    public function getName() {
        return 'spoiledmilk_yoghurtbundle_entitytypetype';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'SpoiledMilk\YoghurtBundle\Entity\EntityType',
            'cascade_validation' => true,
        ));
    }

}
