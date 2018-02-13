<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use Rewind\Bundle\MediaBundle\Model\ImageAwareInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Rewind\Bundle\AdminBundle\Traits\SortableTrait;
use Rewind\Bundle\MediaBundle\Model\ImageInterface;
use Rewind\Bundle\MediaBundle\Traits\ImageAwareTrait;
use Sylius\Component\Resource\Model\ResourceInterface;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\TranslatableTrait;

/**
 * Author.
 *
 * @author pvesin
 *
 * @ORM\Table(name="app_book")
 * @ORM\Entity
 * @Gedmo\Loggable
 */
class Book implements ResourceInterface, TranslatableInterface, ImageAwareInterface
{
    use TranslatableTrait {
        __construct as private initializeTranslatableCollection;
    }
    use SortableTrait;
    use ImageAwareTrait;


    /**
     * @var ImageInterface
     *
     * @ORM\OneToOne(targetEntity="BookImage", mappedBy="owner", orphanRemoval=true, cascade={"all"})
     */
    protected $image;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="code", type="string")
     */
    protected $code;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $enabled;

    /**
     * Author constructor.
     */
    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

    /**
     * @return Integer
     */
    public function getId(): ?Int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCode(): ?String
    {
        return $this->code;
    }

    /**
     * @param $code
     *
     * @return null|ResourceInterface
     */
    public function setCode($code): ?ResourceInterface
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return BookTranslation
     */
    protected function createTranslation(): BookTranslation
    {
        return new BookTranslation();
    }

    /**
     * @return bool
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * @param $enabled
     *
     * @return null|ResourceInterface
     */
    public function setEnabled($enabled): ?ResourceInterface
    {
        $this->enabled = $enabled;

        return $this;
    }


}