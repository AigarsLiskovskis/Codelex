<?php

class Lights
{

    private float $lowBeams;
    private float $highBeams;

    public function __construct(int $lowBeams, int $highBeams)
    {
        $this->lowBeams = $lowBeams;
        $this->highBeams = $highBeams;
    }

    public function decreaseLowBeamIntensity($level): void
    {
        if ($this->lowBeams > 0 && $this->lowBeams <= 100) {
            $this->lowBeams -= $level;
        }
    }

    public function decreaseHighBeamIntensity($level): void
    {
        if ($this->highBeams > 0 && $this->highBeams <= 100) {
            $this->highBeams -= $level;
        }
    }

    public function getLowBeams(): int
    {
        return $this->lowBeams;
    }

    public function getHighBeams(): int
    {
        return $this->highBeams;
    }

    public function resetLights($level): void
    {
        $this->lowBeams = $level;
        $this->highBeams = $level;
    }
}
