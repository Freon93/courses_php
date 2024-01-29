<?php

namespace Classes;

use Exception;

class Color
{
    private int $red = 0;
    private int $green = 0;
    private int $blue = 0;

    /**
     * @throws Exception
     */
    public function __construct(int $red, int $green, int $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    public function getRed(): int
    {
        return $this->red;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    /**
     * @throws Exception
     */
    public function setRed($red): void
    {
        if ($this->colorValidate('Red', $red)) {
            $this->red = $red;
        }
    }

    /**
     * @throws Exception
     */
    public function setGreen($green): void
    {
        if ($this->colorValidate('Green', $green)) {
            $this->green = $green;
        }
    }

    /**
     * @throws Exception
     */
    public function setBlue($blue): void
    {
        if ($this->colorValidate('Blue', $blue)) {
            $this->blue = $blue;
        }
    }

    public function equals(Color $obj): bool
    {
        return $this->getRed() === $obj->getRed()
            && $this->getGreen() === $obj->getGreen()
            && $this->getBlue() === $obj->getBlue();
    }

    /**
     * @throws Exception
     */
    public function mix(Color $obj): Color
    {
        $r =  round(($this->getRed() + $obj->getRed()) / 2);
        $g = round(($this->getGreen() + $obj->getGreen()) / 2);
        $b = round(($this->getBlue() + $obj->getBlue()) / 2);

        return new Color($r, $g, $b);
    }

    /**
     * @throws Exception
     */
    protected function colorValidate($colorName, $colorValue): true
    {
        if ($colorValue < 0 || $colorValue > 255) {
            throw new Exception($colorName . ' must be in range between 0 and 255');
        }

        return true;
    }

    /**
     * @throws Exception
     */
    public static function random(): Color
    {
        return new Color(rand(0, 255), rand(0, 255), rand(0, 255));
    }
}
