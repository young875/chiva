<?php

namespace App\Entity;


use Symfony\Component\Validator\Constraints as Assert;


class Contact {

    const TITRE =[
        'MME.' => 'MME.',
        'M.' => 'M.'
    ];


    /**
     * @var string
     * @Assert\NotNull()
     * @Assert\Length(min="3", max="255")
     */
    private $titre;


    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="255")
     */
    private $prenom;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="255")
     */
    private $sujet;

    /**
     * @return string
     */
    public function getSujet(): string
    {
        return $this->sujet;
    }

    /**
     * @param string $sujet
     * @return Contact
     */
    public function setSujet(string $sujet): Contact
    {
        $this->sujet = $sujet;
        return $this;
    }

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="255")
     */
    private $nom;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $mail;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/[0-9]/"
     * )
     */
    private $telephone;


    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="255")
     */
    private $message;

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     * @return Contact
     */
    public function setTitre(string $titre): Contact
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return Contact
     */
    public function setPrenom(string $prenom): Contact
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Contact
     */
    public function setNom(string $nom): Contact
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * @param string|null $mail
     * @return Contact
     */
    public function setMail(?string $mail): Contact
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     * @return Contact
     */
    public function setTelephone(string $telephone): Contact
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Contact
     */
    public function setMessage(string $message): Contact
    {
        $this->message = $message;
        return $this;
    }


}