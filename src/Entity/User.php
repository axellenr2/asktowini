<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 * fields={"email"},
 * message="l'email que vous avez indiquer est déjà utiliser"
 * )
 */
class User implements UserInterface 
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8",minMessage="Votre mot de passe doit dépasser 8 caractère")
     *@Assert\EqualTo(propertyPath="confirm_password", message="Votre mot de passe n'est pas identique")
     */
    private $password;
    /** 
    * @Assert\EqualTo(propertyPath="password", message="Votre mot de passe n'est pas identique")
    */
    public $confirm_password;

    /**
     * @ORM\Column(type="string")
     */
    private $roles = '[]';

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    public function eraseCredentials(){}
    public function getSalt(){}

   

   public function getRoles(): array
    {
        $roles = (array)json_decode($this->roles);
        // guarantee every user at least has ROLE_USER
        if (!in_array('ROLE_USER', $roles)) $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = json_encode($roles);

        return $this;
    }


    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }
}
