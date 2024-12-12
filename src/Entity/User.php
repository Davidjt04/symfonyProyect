<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $Nombre = null;

    #[ORM\Column(length: 30)]
    private ?string $Contraseña = null;

    #[ORM\Column(length: 50)]
    private ?string $Correo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): static
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getContraseña(): ?string
    {
        return $this->Contraseña;
    }

    public function setContraseña(string $Contraseña): static
    {
        $this->Contraseña = $Contraseña;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->Correo;
    }

    public function setCorreo(string $Correo): static
    {
        $this->Correo = $Correo;

        return $this;
    }
}
