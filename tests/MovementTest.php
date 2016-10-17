<?php

namespace Sensorario\Tests;

use DateTime;
use PHPUnit_Framework_TestCase;
use Sensorario\KakeboEntities\Movement;

class MovementTest
    extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->movement = new Movement();
    }

    /** @dataProvider dates */
    public function test($date)
    {
        $this->movement->setDay($date);

        $this->assertEquals(
            $date,
            $this->movement->getDay()
        );
    }

    public function dates()
    {
        return array(
            array(new DateTime('10-09-1982')),
            array('10-09-1982'),
        );
    }

    public function testWheneverDayIsSetByStringJsonSerializationConvertsItInDateTime()
    {
        $datetimeAsString = '10-09-1982';
        $this->movement->setDay($datetimeAsString);

        $this->assertEquals([
                'amount' => null,
                'description' => null,
                'date' => (new DateTime($datetimeAsString))->format('Y-m-d'),
                'time' => (new DateTime($datetimeAsString))->format('H:i:s'),
            ],
            $this->movement->jsonSerialize()
        );
    }

    public function testDescription()
    {
        $description = 'description ' . rand(1111,9999);
        $amount      = rand(1111,9999);

        $this->movement
            ->setDescription($description)
            ->setAmount($amount)
        ;

        $this->assertEquals(
            $description,
            $this->movement->getDescription()
        );

        $this->assertEquals(
            $amount,
            $this->movement->getAmount()
        );
    }
}
