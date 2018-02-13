<?php

declare(strict_types=1);

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Rewind\Bundle\MediaBundle\Model\Image;
use Gedmo\Mapping\Annotation as Gedmo;
use Rewind\Bundle\AdminBundle\Traits\SortableTrait;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * Description of BookImage.
 *
 * @author Philippe Vesin
 *
 * @ORM\Table(name="app_book_image")
 * @ORM\Entity
 */
class BookImage extends Image implements ResourceInterface {

    use SortableTrait;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")s
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * {@inheritdoc}
     * @Gedmo\SortableGroup()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Book", inversedBy="image")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $owner;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $path;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}