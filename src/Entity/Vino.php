<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\VinoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VinoRepository::class)]
#[ApiResource]
class Vino
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $nombre = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $tipo = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $denominacion_origen = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $maduracion = null;

    #[ORM\Column(nullable: true)]
    private ?bool $ecologico = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $variedad_uva = null;

    #[ORM\ManyToOne]
    private ?Bodega $bodega = null;

    #[ORM\ManyToMany(targetEntity: Comida::class, inversedBy: 'vino')]
    private Collection $comida;

    public function __construct()
    {
        $this->comida = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(?string $tipo): static
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getDenominacionOrigen(): ?string
    {
        return $this->denominacion_origen;
    }

    public function setDenominacionOrigen(?string $denominacion_origen): static
    {
        $this->denominacion_origen = $denominacion_origen;

        return $this;
    }

    public function getMaduracion(): ?string
    {
        return $this->maduracion;
    }

    public function setMaduracion(?string $maduracion): static
    {
        $this->maduracion = $maduracion;

        return $this;
    }

    public function isEcologico(): ?bool
    {
        return $this->ecologico;
    }

    public function setEcologico(?bool $ecologico): static
    {
        $this->ecologico = $ecologico;

        return $this;
    }

    public function getVariedad_uva(): ?string
    {
        return $this->variedad_uva;
    }

    public function setVariedad_uva(?string $variedad_uva): static
    {
        $this->variedad_uva = $variedad_uva;

        return $this;
    }

    public function getBodega(): ?Bodega
    {
        return $this->bodega;
    }

    public function setBodega(?Bodega $bodega): static
    {
        $this->bodega = $bodega;

        return $this;
    }

    /**
     * @return Collection<int, Comida>
     */
    public function getComida(): Collection
    {
        return $this->comida;
    }

    public function addComida(Comida $comida): static
    {
        if (!$this->comida->contains($comida)) {
            $this->comida->add($comida);
        }

        return $this;
    }

    public function removeComida(Comida $comida): static
    {
        $this->comida->removeElement($comida);

        return $this;
    }

}
