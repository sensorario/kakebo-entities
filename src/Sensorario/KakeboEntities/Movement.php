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
    private $id;

    /**
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $amount;

    /**
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @ORM\Column(name="day", type="datetime", length=14, nullable=false)
     */
    private $day;

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
