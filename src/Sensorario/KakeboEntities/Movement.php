<?php

namespace Sensorario\KakeboEntities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table("movement")
 * @ORM\Entity
 */
class Movement
    implements \JsonSerializable
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=2, nullable=false)
     */
    protected $amount;

    /**
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    protected $description;

    /**
     * @ORM\Column(name="day", type="datetime", length=14, nullable=false)
     */
    protected $day;

    public function getId()
    {
        return $this->id;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    public function getDay()
    {
        return $this->day;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function jsonSerialize()
    {
        return [
            'amount' => $this->amount,
            'description' => $this->description,
            'date' => $this->day->format('Y-m-d'),
            'time' => $this->day->format('H:i:s'),
        ];
    }
}
