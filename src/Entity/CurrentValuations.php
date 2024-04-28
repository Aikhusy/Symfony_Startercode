<?php

namespace App\Entity;

use App\Repository\CurrentValuationsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CurrentValuationsRepository::class)]
class CurrentValuations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $CurrentPERatio = null;

    #[ORM\Column]
    private ?float $ForwardPERatio = null;

    #[ORM\Column]
    private ?float $CurrentPriceToSales = null;

    #[ORM\Column]
    private ?float $CurrentPriceToBookValue = null;

    #[ORM\OneToOne(inversedBy: 'currentValuations', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Stocks $fk_stocks = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrentPERatio(): ?float
    {
        return $this->CurrentPERatio;
    }

    public function setCurrentPERatio(float $CurrentPERatio): static
    {
        $this->CurrentPERatio = $CurrentPERatio;

        return $this;
    }

    public function getForwardPERatio(): ?float
    {
        return $this->ForwardPERatio;
    }

    public function setForwardPERatio(float $ForwardPERatio): static
    {
        $this->ForwardPERatio = $ForwardPERatio;

        return $this;
    }

    public function getCurrentPriceToSales(): ?float
    {
        return $this->CurrentPriceToSales;
    }

    public function setCurrentPriceToSales(float $CurrentPriceToSales): static
    {
        $this->CurrentPriceToSales = $CurrentPriceToSales;

        return $this;
    }

    public function getCurrentPriceToBookValue(): ?float
    {
        return $this->CurrentPriceToBookValue;
    }

    public function setCurrentPriceToBookValue(float $CurrentPriceToBookValue): static
    {
        $this->CurrentPriceToBookValue = $CurrentPriceToBookValue;

        return $this;
    }

    public function getFkStocks(): ?Stocks
    {
        return $this->fk_stocks;
    }

    public function setFkStocks(Stocks $fk_stocks): static
    {
        $this->fk_stocks = $fk_stocks;

        return $this;
    }
}
