<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
// use Symfony\Component\Validator\Constraints as Assert;




#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['Correo'], message: 'There is already an account with this Correo')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $Nombre = null;

    #[ORM\Column(length: 4096)]
    private ?string $Contraseña = null;

    #[ORM\Column(length: 50)]
    private ?string $Correo = null;
    
    #[ORM\Column(length: 20)]
    private ?string $rol = null;


    public function __construct()
    {
        //array para saber las preguntas del usuario 
        $this->pregunta = new ArrayCollection();
        // $this->respuesta = new ArrayCollection();
        //atributos del usuario
    }

    //RELACIONES
     /**
     * @var Collection<int, Pregunta>
     */
    #[ORM\OneToMany(targetEntity: Pregunta::class, mappedBy: 'user')]
    private Collection $pregunta;

    /**
     * @var Collection<int, Respuesta>
     */
    #[ORM\OneToMany(targetEntity: Respuesta::class, mappedBy: 'user', orphanRemoval: true)]
    private Collection $respuesta;



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

    /**
     * @return Collection<int, Pregunta>
     */
    public function getPregunta(): Collection
    {
        return $this->pregunta;
    }

    public function addPreguntum(Pregunta $preguntum): static
    {
        if (!$this->pregunta->contains($preguntum)) {
            $this->pregunta->add($preguntum);
            $preguntum->setUser($this);
        }

        return $this;
    }

    public function removePreguntum(Pregunta $preguntum): static
    {
        if ($this->pregunta->removeElement($preguntum)) {
            // set the owning side to null (unless already changed)
            if ($preguntum->getUser() === $this) {
                $preguntum->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Respuesta>
     */
    public function getRespuesta(): Collection
    {
        return $this->respuesta;
    }

    public function addRespuestum(Respuesta $respuestum): static
    {
        if (!$this->respuesta->contains($respuestum)) {
            $this->respuesta->add($respuestum);
            $respuestum->setUser($this);
        }

        return $this;
    }

    public function removeRespuestum(Respuesta $respuestum): static
    {
        if ($this->respuesta->removeElement($respuestum)) {
            // set the owning side to null (unless already changed)
            if ($respuestum->getUser() === $this) {
                $respuestum->setUser(null);
            }
        }

        return $this;
    }

    public function getRoles(): array {
        //Devuelvo los posibles roles del usuario 
        //array donde tengo los roles del usuario
        $rol = ['ROLE_USER']; 
        if($this->Correo === 'djantor1402@g.educaand.es'){
            $rol = ['ROLE_USER','ROLE_ADMIN'];
        }

        return $rol;
    }

    public function eraseCredentials(): void
    {
        // Si estás almacenando datos sensibles como contraseñas, aquí los eliminarías.
        // $this->Contraseña = null;
    }

    public function getUserIdentifier(): string
    {
        //devuelve un identificador único, como el correo electrónico.
        return $this->Correo;  
    }
    public function getPassword(): ?string
    {
        return $this->Contraseña;  // Retorna la contraseña que es almacenada (probablemente hasheada)
    }

    public function getRol(): ?string
    {
        return $this->rol;
    }

    public function setRol(string $rol): static
    {
        $this->rol = $rol;

        return $this;
    }
}
