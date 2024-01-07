<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\VinoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Enum\TipoVino;
use App\Enum\DenominacionOrigen;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Doctrine\Orm\Filter\BooleanFilter;

#[ORM\Entity(repositoryClass: VinoRepository::class)]
//#[ApiResource]
#[ApiResource(
    normalizationContext: ['groups' => ['vino.read']],
    denormalizationContext: ['groups' => ['vino.write']]
)]
#[
    ApiFilter(OrderFilter::class, properties: ["tipo", "denominacion_origen", "maduracion", "ecologico", "bodega", "denominacionOrigen"]),
    ApiFilter(SearchFilter::class, properties: ["id"=> "exact", "nombre"=> "partial", "tipo"=> "partial", "denominacion_origen"=> "partial", "maduracion"=> "partial", "bodega"=> "exact", "comida"=> "partial", "denominacionOrigen"=> "partial"]),
    ApiFilter(BooleanFilter::class, properties: ['ecologico'])
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

    #[ORM\Column(type: 'string', enumType: TipoVino::class)]
    #[Groups(['vino.read', 'vino.write'])]
    private ?TipoVino  $tipo = null;

    #[ORM\Column(type: 'string', enumType: DenominacionOrigen::class)]
    #[Groups(['vino.read', 'vino.write'])]
    private ?DenominacionOrigen $denominacion_origen = null;

    #[ORM\Column(length: 150, nullable: true)]
    #[Groups(['vino.read', 'vino.write'])]
    private ?string $maduracion = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['vino.read', 'vino.write'])]
    private ?bool $ecologico = null;

    #[ORM\ManyToOne(targetEntity: Bodega::class)]
    #[ORM\JoinColumn(name: "bodega_id", referencedColumnName: "id")]
    #[Groups(['vino.read', 'vino.write'])]
    private ?Bodega $bodega = null;

    #[ORM\ManyToMany(targetEntity: Comida::class, inversedBy: 'vino')]
    #[Groups(['vino.read', 'vino.write'])]
    private Collection $comida;

    #[ORM\ManyToMany(targetEntity: VariedadUva::class, inversedBy: 'vinos')]
    #[Groups(['vino.read', 'vino.write'])]
    private Collection $variedad_uva;

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

    public function getTipo(): ?TipoVino
    {
        return $this->tipo;
    }

    public function setTipo(?TipoVino $tipo): self
    {
        $this->tipo = $tipo;
        return $this;
    }

    public function getDenominacionOrigen(): ?DenominacionOrigen
    {
        return $this->denominacion_origen;
    }

    public function setDenominacionOrigen(DenominacionOrigen $denominacion_origen): self
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

}
