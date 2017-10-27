<?php

namespace CitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PacienteNotas
 *
 * @ORM\Table(name="TBL_PACIENTE_NOTAS")
 * @ORM\Entity(repositoryClass="CitasBundle\Repository\PacienteNotasRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class PacienteNotas
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA", type="datetime")
     */
    private $dateAt;

    /**
     * @var \CitasBundle\Entity\Medicos
     *
     * @ORM\ManyToOne(targetEntity="CitasBundle\Entity\Medicos")
     * @ORM\JoinColumn(name="DOCTOR", referencedColumnName="ID")
     */
    private $doctor;

    /**
     * @var \CitasBundle\Entity\Pacientes
     *
     * @ORM\ManyToOne(targetEntity="CitasBundle\Entity\Pacientes")
     * @ORM\JoinColumn(name="PACIENTE", referencedColumnName="ID")
     */
    private $patient;

    /**
     * @var string
     *
     * @ORM\Column(name="INFORMACION", type="text")
     */
    private $information;

    /**
     * @var string
     *
     * @ORM\Column(name="PRESCRIPCION", type="text", nullable=true)
     */
    private $prescription;

    /**
     * @var bool
     *
     * @ORM\Column(name="ACTIVO", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\PrePersist()
     */
    public function setPrePersistData() {
        $this->dateAt = new \DateTime();
        $this->isActive = true;
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
     * Set dateAt
     *
     * @param \DateTime $dateAt
     *
     * @return PacienteNotas
     */
    public function setDateAt($dateAt)
    {
        $this->dateAt = $dateAt;

        return $this;
    }

    /**
     * Get dateAt
     *
     * @return \DateTime
     */
    public function getDateAt()
    {
        return $this->dateAt;
    }

    /**
     * Set information
     *
     * @param string $information
     *
     * @return PacienteNotas
     */
    public function setInformation($information)
    {
        $this->information = $information;

        return $this;
    }

    /**
     * Get information
     *
     * @return string
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * Set prescription
     *
     * @param string $prescription
     *
     * @return PacienteNotas
     */
    public function setPrescription($prescription)
    {
        $this->prescription = $prescription;

        return $this;
    }

    /**
     * Get prescription
     *
     * @return string
     */
    public function getPrescription()
    {
        return $this->prescription;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return PacienteNotas
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set doctor
     *
     * @param \CitasBundle\Entity\Medicos $doctor
     *
     * @return PacienteNotas
     */
    public function setDoctor(\CitasBundle\Entity\Medicos $doctor = null)
    {
        $this->doctor = $doctor;

        return $this;
    }

    /**
     * Get doctor
     *
     * @return \CitasBundle\Entity\Medicos
     */
    public function getDoctor()
    {
        return $this->doctor;
    }

    /**
     * Set patient
     *
     * @param \CitasBundle\Entity\Pacientes $patient
     *
     * @return PacienteNotas
     */
    public function setPatient(\CitasBundle\Entity\Pacientes $patient = null)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return \CitasBundle\Entity\Pacientes
     */
    public function getPatient()
    {
        return $this->patient;
    }
}