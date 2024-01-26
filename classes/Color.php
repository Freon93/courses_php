<?php

namespace classes;

use Exception;

class Color
{
    private int $red = 0;
    private int $green = 0;
    private int $blue = 0;

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

    public function setRed($red): void
    {
        $ValidationError = $this->colorValidate('Red', $red);

        if (!$ValidationError) {
            $this->red = $red;
        } else {
            echo $ValidationError->getMessage() . '<br>';
        }
    }

    public function setGreen($green): void
    {
        $ValidationError = $this->colorValidate('Green', $green);

        if (!$ValidationError) {
            $this->green = $green;
        } else {
            echo $ValidationError->getMessage() . '<br>';
        }
    }

    public function setBlue($blue): void
    {
        $ValidationError = $this->colorValidate('Green', $blue);

        if (!$ValidationError) {
            $this->blue = $blue;
        } else {
            echo $ValidationError->getMessage() . '<br>';
        }
    }

    public function equals(Color $obj): bool
    {
        return $this->getRed() === $obj->getRed()
            && $this->getGreen() === $obj->getGreen()
            && $this->getBlue() === $obj->getBlue();
    }

    public function mix(Color $obj): Color
    {
        $r =  round(($this->getRed() + $obj->getRed()) / 2);
        $g = round(($this->getGreen() + $obj->getGreen()) / 2);
        $b = round(($this->getBlue() + $obj->getBlue()) / 2);

        return new Color($r, $g, $b);
    }

    protected function colorValidate($colorName, $colorValue): false|Exception
    {
        try {
            if ($colorValue < 0 || $colorValue > 255) {
                throw new Exception($colorName . ' must be in range between 0 and 255');
            }

            return false;
        } catch (Exception $err) {
            return $err;
        }
    }

    public static function random(): Color
    {
        return new Color(rand(0, 255), rand(0, 255), rand(0, 255));
    }
}
