<?php

namespace App\Entity;

use App\Entity\Timestamps;
use App\Repository\ConversionMonedaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConversionMonedaRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class ConversionMoneda
{
    use Timestamps;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $from_currency;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $to_currency;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $total;

    public function getId(): ?int
    {
        return $this->id;
    }

  

    public function getFromCurrency(): ?string
    {
        return $this->from_currency;
    }

    public function setFromCurrency(string $from_currency): self
    {
        $this->from_currency = $from_currency;

        return $this;
    }

    public function getToCurrency(): ?string
    {
        return $this->to_currency;
    }

    public function setToCurrency(string $to_currency): self
    {
        $this->to_currency = $to_currency;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): self
    {
        $this->total = $total;

        return $this;
    }

    
}
