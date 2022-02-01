<?php

class Date
{

    protected int $month;
    protected int $day;
    protected int $year;

    public function __construct($month, $day, $year)
    {
        if (checkdate($month, $day, $year)) {
            $this->month = $month;
            $this->day = $day;
            $this->year = $year;
        }
    }


    public function setDay(int $day): void
    {
        $this->day = $day;
    }


    public function setMonth(int $month): void
    {
        $this->month = $month;
    }


    public function setYear(int $year): void
    {
        $this->year = $year;
    }


    public function getDay(): int
    {
        return $this->day;
    }


    public function getMonth(): int
    {
        return $this->month;
    }


    public function getYear(): int
    {
        return $this->year;
    }

    public function displayDate(): string
    {
        if (checkdate($this->month, $this->day, $this->year)) {
            $output = $this->month . "/" . $this->day . "/" . $this->year;
        } else {
            $output = "!!!Wrong date!!!";
        }
        return $output;
    }
}

$e = new Date(1, 1, 1);

while (1) {

    $e->setMonth(rand(0, 15));
    $e->setDay(rand(0, 33));
    $e->setYear(rand(0, 32767));
    echo $e->displayDate() . PHP_EOL;
    sleep(1);
}