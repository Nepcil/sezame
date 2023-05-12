<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[Vich\Uploadable]
class Book
{
    use TimestampableEntity;

    //NOTE: variables------------------------------
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $summary = null;

    //NOTE: mapping Cattegory->book------------------
    #[ORM\ManyToOne(inversedBy: 'book', targetEntity: Category::class, )]
    #[ORM\JoinColumn(nullable: true, onDelete: 'CASCADE')]
    private ?Category $category = null;

    //NOTE: mapping Book->BooKImages------------------
    #[ORM\OneToMany(mappedBy: 'book', targetEntity: BookImages::class, orphanRemoval: true, cascade: ['persist'])]
    private Collection $bookImages;
    
    //NOTE: Constructor--------------------------------
    public function __construct()
    {
        $this->bookImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * @return Collection<int, BookImages>
     */
    public function getBookImages(): Collection
    {
        return $this->bookImages;
    }

    public function addBookImage(BookImages $bookImage): self
    {
        if (!$this->bookImages->contains($bookImage)) {
            $this->bookImages->add($bookImage);
            $bookImage->setBook($this);
        }

        return $this;
    }

    public function removeBookImage(BookImages $bookImage): self
    {
        if ($this->bookImages->removeElement($bookImage)) {

            if ($bookImage->getBook() === $this) {
                $bookImage->setBook(null);
            }
        }
        return $this;
    }

}
