<?php

namespace App\Form;

use Kunstmaan\MediaBundle\Form\Type\MediaType;
use App\Entity\TwoColImageTextImage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class TwoColImageTextImageAdminType extends AbstractType
{
    /**
     * Builds the form.
     *
     * This method is called for each type in the hierarchy starting form the
     * top most type. Type extensions can further modify the form.
     *
     * @param FormBuilderInterface $builder The form builder
     * @param array                $options The options
     *
     * @see FormTypeExtensionInterface::buildForm()
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('image', MediaType::class, [
            'mediatype' => 'image',
            'required' => true,
            'constraints' => [
                new NotBlank(),
            ]
        ]);
        $builder->add('imageAltText', TextType::class, [
            'required' => true,
            'constraints' => [
                new NotBlank(),
            ]
        ]);
        $builder->add('caption', TextType::class, [
            'required' => false,
        ]);

        $builder->add('displayOrder', HiddenType::class);
    }

    /**
     * Sets the default options for this type.
     *
     * @param OptionsResolver $resolver the resolver for the options
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TwoColImageTextImage::class,
        ]);
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'two_col_image_text_image_type';
    }
}
