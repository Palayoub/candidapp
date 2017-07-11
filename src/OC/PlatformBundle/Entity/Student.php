<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Entity\StudentRepository")
 */
class Student
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
     /**
     * @var smallint
     *
     * @ORM\Column(name="statut", type="smallint")
     */
    private $statut;
    /**
     * @var integer
     *
     * @ORM\Column(name="cne", type="bigint")
     */
    private $cne;
    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=45)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45)
     */
    private $nom;

    /**
     * @var float
     *
     * @ORM\Column(name="moyenbac", type="float")
     */
    private $moyenbac;
    /**
     * @var string
     *
     * @ORM\Column(name="etablissement", type="string")
     */
    private $etablissement;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    public function __construct()
    {
    $this->date = new \Datetime();
    $this->statut = -1;
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Student
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Student
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set moyenbac
     *
     * @param float $moyenbac
     * @return Student
     */
    public function setMoyenbac($moyenbac)
    {
        $this->moyenbac = $moyenbac;

        return $this;
    }

    /**
     * Get moyenbac
     *
     * @return float 
     */
    public function getMoyenbac()
    {
        return $this->moyenbac;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Student
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set cne
     *
     * @param integer $cne
     * @return Student
     */
    public function setCne($cne)
    {
        $this->cne = $cne;

        return $this;
    }

    /**
     * Get cne
     *
     * @return integer 
     */
    public function getCne()
    {
        return $this->cne;
    }

    /**
     * Set etablissement
     *
     * @param string $etablissement
     * @return Student
     */
    public function setEtablissement($etablissement)
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    /**
     * Get etablissement
     *
     * @return string 
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }

    /**
     * Set statut
     *
     * @param boolean $statut
     * @return Student
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return boolean 
     */
    public function getStatut()
    {
        return $this->statut;
    }
}
