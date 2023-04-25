<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[Vich\Uploadable]
class Book
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageName = null;

    // NOTE: This is not a mapped field of entity metadata, just a simple property.
    #[ORM\OneToMany(mappedBy: 'book',  targetEntity: BookImages::class, orphanRemoval: true, cascade: ['persist'])]
    private ?Collection $bookImages;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[Vich\UploadableField(mapping: 'bookRead', fileNameProperty: 'bookRead')]
    private ?string $bookRead = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $summary = null;
    

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

    public function __toString()
    {
        $this->getTitle();
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

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setBookRead(?string $bookRead): void
    {
        $this->bookRead = $bookRead;
    }

    public function getBookRead(): ?string
    {
        return $this->bookRead;
    }

    /*---------------bookImages------------------*/

    /**
     * @return Collection<int, BookImage>
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
            // set the owning side to null (unless already changed)
            if ($bookImage->getBook() === $this) {
                $bookImage->setBook(null);
            }
        }

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $bookRead
     */
    public function setBookImages(?File $bookRead = null): void
    {
        $this->bookRead = $bookRead;

        if (null !== $bookRead) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

}
