<?php

namespace src\Model;

class Calendar
{
    protected array $months = [1 => 'Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

    protected array $arrayDays = [1 => 'lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

    protected int $year;

    protected int $month;

    protected string $date;

    protected string $firstDayOfMonth;

    protected int $firstDayInt;

    protected int $lastDay;

    protected int $lastDayInt;

    protected string $lastDayOfMonth;

    protected int $start;
    protected int $numDays;

    public function __construct(array $post)
    {
        $this->year = intval($post['year']);
        $this->month = intval($post['month']);
        $this->date = $this->months[$this->month] . ' ' . $this->year;
        $this->lastDay = date("t", mktime(0, 0, 0, $this->month, 1, $this->year));
        $this->firstDayOfMonth = date("l", mktime(0, 0, 0, $this->month, 1, $this->year));
        $this->firstDayInt = date("N", mktime(0, 0, 0, $this->month, 1, $this->year));
        $this->lastDayInt = date("N", mktime(0, 0, 0, $this->month, $this->lastDay, $this->year));
        $this->lastDayOfMonth = date("l", mktime(0, 0, 0, $this->month, $this->lastDay, $this->year));
        $this->start = date('j', strtotime('last day of previous month', strtotime($this->year . '-' . $this->month)));
        $this->numDays = date('t', strtotime($this->year . '-' . $this->month));
    }

    // GETTERS

    public function getCalendar() :array {
        $calendarData = [
            'arrayDays' => $this->arrayDays,
            'date' => $this->date,
            'months' => $this->months,
            'start' => $this->start,
            'firstDayInt' => $this->firstDayInt,
            'numDays' => $this->numDays,
            'lastDayInt' => $this->lastDayInt,
        ];
        return $calendarData;
    }

    
}