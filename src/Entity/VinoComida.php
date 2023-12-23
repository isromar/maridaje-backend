<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VinoComida
 *
 * @ORM\Table(name="vino_comida", indexes={@ORM\Index(name="vino_id", columns={"vino_id"}), @ORM\Index(name="comida_id", columns={"comida_id"})})
 * @ORM\Entity
 */
class VinoComida
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
     * @var \Vino
     *
     * @ORM\ManyToOne(targetEntity="Vino")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vino_id", referencedColumnName="id")
     * })
     */
    private $vino;

    /**
     * @var \Comida
     *
     * @ORM\ManyToOne(targetEntity="Comida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comida_id", referencedColumnName="id")
     * })
     */
    private $comida;


}
