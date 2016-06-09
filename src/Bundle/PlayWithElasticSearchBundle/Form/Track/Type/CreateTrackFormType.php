<?php

namespace Bundle\PlayWithElasticSearchBundle\Form\Track\Type;

use Bundle\PlayWithElasticSearchBundle\Form\Album\Resource\AlbumResource;
use Bundle\PlayWithElasticSearchBundle\Form\Track\Resource\CreateTrackFormResource;
use Doctrine\Common\Collections\ArrayCollection;
use Ladybug\Plugin\Extra\Type\CollectionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class CreateTrackFormType
 */
class CreateTrackFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'label' => 'Name',
                    'required' => true,
                    'attr' => ['maxlength' => 255]
                ]
            )
            ->add(
                'album',
                ChoiceType::class,
                [
                    'choices' => $options['albums'],
                    'label' => 'Album'
                ]
            )
            ->add(
                'playlist',
                ChoiceType::class,
                [
                    'choices' => $options['play_lists'],
                    'label' => 'PlayList'
                ]
            )
            ->add('composer', TextType::class)
            ->add(
                'genre',
                ChoiceType::class,
                [
                    'choices' => $options['genres'],
                    'label' => 'Genre'
                ]
            )
            ->add(
                'media_type',
                ChoiceType::class,
                [
                    'choices' => $options['media_types'],
                    'label' => 'Media type'
                ]
            )
            ->add('milliseconds', IntegerType::class)
            ->add('bytes', IntegerType::class)
            ->add('unitprice', TextType::class)
            ->add(
                'save',
                SubmitType::class,
                ['label' => 'Save']
            )
            ->setAction($options['action'])
            ->setMethod('POST');
    }


//    /** @var MediaType */
//    private $mediaType;
//
//    /** @var Genre */
//    private $genre;
//
//    /** @var string */
//    private $composer;
//
//    /** @var int */
//    private $milliseconds;
//
//    /** @var int */
//    private $bytes;
//
//    /** @var string */
//    private $unitPrice;


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'csrf_protection' => true,
                'csrf_field_name' => '_token',
                'data_class' => CreateTrackFormResource::class,
                'albums' => [],
                'play_lists' => [],
                'genres' => [],
                'media_types' => []
            ]
        );
    }
}
