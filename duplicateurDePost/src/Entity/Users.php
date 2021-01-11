<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 * @UniqueEntity(
 *  fields={"email"},
 *  message="L'email que vous avez tapé est déjà utilisé"
 * )
 */
class Users implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo_url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\Length(min="8", minMessage="8 caractères minimum")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="confirm_password", message="Vous n'avez pas tapé le même mot de passe")
     */
    public $confirm_password;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $birth_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postal_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\OneToOne(targetEntity=Post::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $post;

    /**
     * @ORM\OneToOne(targetEntity=Facebook::class, mappedBy="usermail", cascade={"persist", "remove"})
     */
    private $facebook;

    /**
     * @ORM\OneToOne(targetEntity=Twitter::class, mappedBy="usermail", cascade={"persist", "remove"})
     */
    private $twitter;

    /**
     * @ORM\OneToOne(targetEntity=Instagram::class, mappedBy="usermail", cascade={"persist", "remove"})
     */
    private $instagram;

    /**
     * @ORM\OneToOne(targetEntity=LinkedIn::class, mappedBy="usermail", cascade={"persist", "remove"})
     */
    private $linkedIn;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPhotoUrl(): ?string
    {
        return $this->photo_url;
    }

    public function setPhotoUrl(string $photo_url): self
    {
        $this->photo_url = $photo_url;

        return $this;
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

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birth_date;
    }

    public function setBirthDate(?\DateTimeInterface $birth_date): self
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    public function setPostalCode(string $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(Post $post): self
    {
        // set the owning side of the relation if necessary
        if ($post->getUser() !== $this) {
            $post->setUser($this);
        }

        $this->post = $post;

        return $this;
    }

    public function getFacebook(): ?Facebook
    {
        return $this->facebook;
    }

    public function setFacebook(Facebook $facebook): self
    {
        // set the owning side of the relation if necessary
        if ($facebook->getUsermail() !== $this) {
            $facebook->setUsermail($this);
        }

        $this->facebook = $facebook;

        return $this;
    }

    public function getTwitter(): ?Twitter
    {
        return $this->twitter;
    }

    public function setTwitter(Twitter $twitter): self
    {
        // set the owning side of the relation if necessary
        if ($twitter->getUsermail() !== $this) {
            $twitter->setUsermail($this);
        }

        $this->twitter = $twitter;

        return $this;
    }

    public function getInstagram(): ?Instagram
    {
        return $this->instagram;
    }

    public function setInstagram(Instagram $instagram): self
    {
        // set the owning side of the relation if necessary
        if ($instagram->getUsermail() !== $this) {
            $instagram->setUsermail($this);
        }

        $this->instagram = $instagram;

        return $this;
    }

    public function getLinkedIn(): ?LinkedIn
    {
        return $this->linkedIn;
    }

    public function setLinkedIn(LinkedIn $linkedIn): self
    {
        // set the owning side of the relation if necessary
        if ($linkedIn->getUsermail() !== $this) {
            $linkedIn->setUsermail($this);
        }

        $this->linkedIn = $linkedIn;

        return $this;
    }
}
