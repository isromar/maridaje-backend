<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\VinoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;

#[ORM\Entity(repositoryClass: VinoRepository::class)]
//#[ApiResource]
#[ApiResource(
    normalizationContext: ['groups' => ['vino.read']],
    denormalizationContext: ['groups' => ['vino.write']]
)]
#[
    ApiFilter(OrderFilter::class, properties: ["nombre", "tipo"]),
    ApiFilter(SearchFilter::class, properties: ["nombre"=> "partial", "comida.nombre"=> "partial", "bodega.id"=> "exact"])
]

class Vino
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    #[Groups(['vino.read', 'vino.write'])]
    private ?string $nombre = null;

    #[ORM\Column(length: 150, nullable: true)]
    #[Groups(['vino.read', 'vino.write'])]
    private ?string $maduracion = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['vino.read', 'vino.write'])]
    private ?bool $ecologico = null;

    #[ORM\ManyToOne]
    #[Groups(['vino.read', 'vino.write'])]
    private ?Bodega $bodega = null;

    #[ORM\ManyToMany(targetEntity: Comida::class, inversedBy: 'vino')]
    #[Groups(['vino.read', 'vino.write'])]
    private Collection $comida;

    #[ORM\ManyToMany(targetEntity: VariedadUva::class, inversedBy: 'vinos')]
    #[Groups(['vino.read', 'vino.write'])]
    private Collection $variedad_uva;

    #[ORM\ManyToOne]
    #[Groups(['vino.read', 'vino.write'])]
    private ?DenominacionOrigen $denominacionOrigen = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['vino.read', 'vino.write'])]
    private ?TipoVino $tipoVino = null;

    public function __construct()
    {
        $this->comida = new ArrayCollection();
        $this->variedad_uva = new ArrayCollection();
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

    public function getMaduracion(): ?string
    {
        return $this->maduracion;
    }

    public function setMaduracion(?string $maduracion): static
    {
        $this->maduracion = $maduracion;

        return $this;
    }

    public function isEcologico(): ?string
    {
        if ($this->ecologico === 1 || $this->ecologico === true) {
            return 'sí';
        } else {
            return 'no';
        }
    }

    public function setEcologico(?bool $ecologico): static
    {
        $this->ecologico = $ecologico;

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

    /**
     * @return Collection<int, VariedadUva>
     */
    public function getVariedadUva(): Collection
    {
        return $this->variedad_uva;
    }

    public function addVariedadUva(VariedadUva $variedadUva): static
    {
        if (!$this->variedad_uva->contains($variedadUva)) {
            $this->variedad_uva->add($variedadUva);
        }

        return $this;
    }

    public function removeVariedadUva(VariedadUva $variedadUva): static
    {
        $this->variedad_uva->removeElement($variedadUva);

        return $this;
    }

    public function getDenominacionOrigen(): ?DenominacionOrigen
    {
        return $this->denominacionOrigen;
    }

    public function setDenominacionOrigen(?DenominacionOrigen $denominacionOrigen): static
    {
        $this->denominacionOrigen = $denominacionOrigen;

        return $this;
    }

    public function getTipoVino(): ?TipoVino
    {
        return $this->tipoVino;
    }

    public function setTipoVino(?TipoVino $tipoVino): static
    {
        $this->tipoVino = $tipoVino;

        return $this;
    }

}
