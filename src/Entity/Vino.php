<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vino
 *
 * @ORM\Table(name="vino", indexes={@ORM\Index(name="bodega_id", columns={"bodega_id"})})
 * @ORM\Entity
 */
class Vino
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tipo", type="string", length=100, nullable=true)
     */
    private $tipo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="denominacion_origen", type="string", length=100, nullable=true)
     */
    private $denominacionOrigen;

    /**
     * @var string|null
     *
     * @ORM\Column(name="maduracion", type="string", length=100, nullable=true)
     */
    private $maduracion;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ecologico", type="boolean", nullable=true)
     */
    private $ecologico;

    /**
     * @var \Bodega
     *
     * @ORM\ManyToOne(targetEntity="Bodega")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bodega_id", referencedColumnName="id")
     * })
     */
    private $bodega;


}
