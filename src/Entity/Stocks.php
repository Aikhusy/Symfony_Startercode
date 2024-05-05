<?php

namespace App\Entity;

use App\Repository\StocksRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StocksRepository::class)]
class Stocks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::ASCII_STRING)]
    private $code;

    #[ORM\Column]
    private ?bool $isdeleted = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $timestamp = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\ManyToOne(inversedBy: 'stocks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Company $fk_company = null;

    #[ORM\OneToOne(mappedBy: 'fk_stocks', cascade: ['persist', 'remove'])]
    private ?CurrentValuations $currentValuations = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code): static
    {
        $this->code = $code;

        return $this;
    }

    public function isdeleted(): ?bool
    {
        return $this->isdeleted;
    }

    public function setDeleted(bool $isdeleted): static
    {
        $this->isdeleted = $isdeleted;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }

    public function setTimestamp(?\DateTimeInterface $timestamp): static
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getFkCompany(): ?Company
    {
        return $this->fk_company;
    }

    public function setFkCompanys(?Company $fk_company): static
    {
        $this->fk_company = $fk_company;

        return $this;
    }

    public function getCurrentValuations(): ?CurrentValuations
    {
        return $this->currentValuations;
    }

    public function setCurrentValuations(CurrentValuations $currentValuations): static
    {
        // set the owning side of the relation if necessary
        if ($currentValuations->getFkStocks() !== $this) {
            $currentValuations->setFkStocks($this);
        }

        $this->currentValuations = $currentValuations;

        return $this;
    }
}
