<?php

namespace App\Entity;

use App\Repository\SmBonosRepository;
use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Entity(repositoryClass=SmBonosRepository::class)
 */
class SmBonos 
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $estado;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $bono;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $departamento;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $motivo;

    /**
     * @ORM\ManyToOne(targetEntity=SmUsuario::class)
     */
    private $SmUsuario;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getBono(): ?string
    {
        return $this->bono;
    }

    public function setBono(string $bono): self
    {
        $this->bono = $bono;

        return $this;
    }

    public function getDepartamento(): ?string
    {
        return $this->departamento;
    }

    public function setDepartamento(string $departamento): self
    {
        $this->departamento = $departamento;

        return $this;
    }

    public function getMotivo(): ?string
    {
        return $this->motivo;
    }

    public function setMotivo(?string $motivo): self
    {
        $this->motivo = $motivo;

        return $this;
    }

    public function getSmUsuario(): ?SmUsuario
    {
        return $this->SmUsuario;
    }

    public function setSmUsuario(?SmUsuario $SmUsuario): self
    {
        $this->SmUsuario = $SmUsuario;

        return $this;
    }
}
