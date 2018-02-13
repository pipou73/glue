<?php

declare(strict_types=1);

namespace AppBundle\Form\Type;

use Rewind\Bundle\MediaBundle\Form\Type\ImageType;

/**
 * Class BookImageType
 *
 * @package AppBundle\Form\Type
 */
class BookImageType extends ImageType
{
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'app_book_image';
    }
}
