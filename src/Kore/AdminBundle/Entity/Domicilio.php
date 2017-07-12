<?php

namespace Kore\AdminBundle\Entity;

/**
 * Domicilio
 */
class Domicilio
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $direccion;

    /**
     * @var string
     */
    private $rol;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \DateTime
     */
    private $deleted_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $solicitudes;

    /**
     * @var \Kore\AdminBundle\Entity\Persona
     */
    private $persona;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->solicitudes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return (string) $this->direccion;
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
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Domicilio
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set rol
     *
     * @param string $rol
     *
     * @return Domicilio
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return string
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $created_at
     *
     * @return Domicilio
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updated_at
     *
     * @return Domicilio
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set deleted_at
     *
     * @param \DateTime $deleted_at
     *
     * @return Domicilio
     */
    public function setDeletedAt($deleted_at)
    {
        $this->deleted_at = $deleted_at;

        return $this;
    }

    /**
     * Get deleted_at
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * Add solicitude
     *
     * @param \Kore\AdminBundle\Entity\Solicitud $solicitude
     *
     * @return Domicilio
     */
    public function addSolicitude(\Kore\AdminBundle\Entity\Solicitud $solicitude)
    {
        $this->solicitudes[] = $solicitude;

        return $this;
    }

    /**
     * Remove solicitude
     *
     * @param \Kore\AdminBundle\Entity\Solicitud $solicitude
     */
    public function removeSolicitude(\Kore\AdminBundle\Entity\Solicitud $solicitude)
    {
        $this->solicitudes->removeElement($solicitude);
    }

    /**
     * Get solicitudes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSolicitudes()
    {
        return $this->solicitudes;
    }

    /**
     * Set persona
     *
     * @param \Kore\AdminBundle\Entity\Persona $persona
     *
     * @return Domicilio
     */
    public function setPersona(\Kore\AdminBundle\Entity\Persona $persona = null)
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * Get persona
     *
     * @return \Kore\AdminBundle\Entity\Persona
     */
    public function getPersona()
    {
        return $this->persona;
    }

    /**
     * @var integer
     */
    private $unidadvecinal;


    /**
     * Set unidadvecinal
     *
     * @param integer $unidadvecinal
     *
     * @return Domicilio
     */
    public function setUnidadvecinal($unidadvecinal)
    {
        $this->unidadvecinal = $unidadvecinal;

        return $this;
    }

    /**
     * Get unidadvecinal
     *
     * @return integer
     */
    public function getUnidadvecinal()
    {
        return $this->unidadvecinal;
    }
}
