<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
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
     * @ORM\Column(type="string", length=255)
     */
    private $photo_url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $instagram_login;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebook_login;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $twitter_login;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkedIn_login;

    /**
     * @ORM\OneToOne(targetEntity=InstagramIds::class, mappedBy="instagram_login", cascade={"persist", "remove"})
     */
    private $instagramIds;

    /**
     * @ORM\OneToOne(targetEntity=TwitterIds::class, mappedBy="twitter_login", cascade={"persist", "remove"})
     */
    private $twitterIds;

    /**
     * @ORM\OneToOne(targetEntity=LinkedInIds::class, mappedBy="linkedIn_login", cascade={"persist", "remove"})
     */
    private $linkedInIds;

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

    public function getInstagramLogin(): ?string
    {
        return $this->instagram_login;
    }

    public function setInstagramLogin(?string $instagram_login): self
    {
        $this->instagram_login = $instagram_login;

        return $this;
    }

    public function getFacebookLogin(): ?string
    {
        return $this->facebook_login;
    }

    public function setFacebookLogin(?string $facebook_login): self
    {
        $this->facebook_login = $facebook_login;

        return $this;
    }

    public function getTwitterLogin(): ?string
    {
        return $this->twitter_login;
    }

    public function setTwitterLogin(?string $twitter_login): self
    {
        $this->twitter_login = $twitter_login;

        return $this;
    }

    public function getLinkedInLogin(): ?string
    {
        return $this->linkedIn_login;
    }

    public function setLinkedInLogin(?string $linkedIn_login): self
    {
        $this->linkedIn_login = $linkedIn_login;

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

    public function getInstagramIds(): ?InstagramIds
    {
        return $this->instagramIds;
    }

    public function setInstagramIds(?InstagramIds $instagramIds): self
    {
        // unset the owning side of the relation if necessary
        if ($instagramIds === null && $this->instagramIds !== null) {
            $this->instagramIds->setInstagramLogin(null);
        }

        // set the owning side of the relation if necessary
        if ($instagramIds !== null && $instagramIds->getInstagramLogin() !== $this) {
            $instagramIds->setInstagramLogin($this);
        }

        $this->instagramIds = $instagramIds;

        return $this;
    }

    public function getTwitterIds(): ?TwitterIds
    {
        return $this->twitterIds;
    }

    public function setTwitterIds(?TwitterIds $twitterIds): self
    {
        // unset the owning side of the relation if necessary
        if ($twitterIds === null && $this->twitterIds !== null) {
            $this->twitterIds->setTwitterLogin(null);
        }

        // set the owning side of the relation if necessary
        if ($twitterIds !== null && $twitterIds->getTwitterLogin() !== $this) {
            $twitterIds->setTwitterLogin($this);
        }

        $this->twitterIds = $twitterIds;

        return $this;
    }

    public function getLinkedInIds(): ?LinkedInIds
    {
        return $this->linkedInIds;
    }

    public function setLinkedInIds(?LinkedInIds $linkedInIds): self
    {
        // unset the owning side of the relation if necessary
        if ($linkedInIds === null && $this->linkedInIds !== null) {
            $this->linkedInIds->setLinkedInLogin(null);
        }

        // set the owning side of the relation if necessary
        if ($linkedInIds !== null && $linkedInIds->getLinkedInLogin() !== $this) {
            $linkedInIds->setLinkedInLogin($this);
        }

        $this->linkedInIds = $linkedInIds;

        return $this;
    }
}
