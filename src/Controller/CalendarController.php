<?php

namespace src\Controller;

use src\Model\Calendar;
use src\Controller\Util\Validation;

class CalendarController
{

    public function __invoke()
    {
        include(__DIR__ . '/../view/calendarView.php');
    }

    public function generate(): array
    {

        if (count($_POST) > 0) {
            $Validation = new Validation($_POST);
            $errors = $Validation->validateDates();
            if (count($errors) === 0) {

                $Calendar = new Calendar($_POST);
                $calendarData = $Calendar->getCalendar();
                include(__DIR__ . '/../view/calendarView.php');
                return $calendarData;
                    
            } else {
                include(__DIR__ . '/../view/calendarView.php');
                return $errors;
            }
        } else {
            include(__DIR__ . '/../view/calendarView.php');
            return [];
        }
    }

}