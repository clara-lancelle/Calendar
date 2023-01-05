<?php 

function validation(array $array) {

    $errors = [];

    if(!empty($array['month'])) {
        if(!preg_match('/^[0-1]{0,1}[0-9]{1}$/', $array['month']) && $array['month'] >= 1 && $array['month'] <= 12) {
            $errors['month'] = 'Le mois est incorrect, il doit être compris entre 1 et 12.';
        }
    } else {
        $errors['month'] = 'Le mois n\'est pas renseigné.';
    }

    if(!empty($array['year'])) {
        if(preg_match('/^((19[0-9]{2})||(201[0-9]{1})||(202[0-3]{1}))$/', $array['year'])) {
        } else {
            $errors['year'] = 'L\'année est incorrect, il doit être compris entre 1 et 12.';
        }
    } else {
        $errors['year'] = 'L\'année n\'est pas renseigné.';
    }

        return $errors;
}

// get the first && last day of the month of the year

function getCalendar(array $array) {
 
    $year = intval($array['year']);
    $month = intval($array['month']);
    $months = ['', 'Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    $arrayDays = [1 => 'lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    $date = $months[$month] . ' ' . $year;
    $firstDayOfMonth = date("l", mktime(0, 0, 0, $month, 1, $year));
    $firstDayInt = date('N', mktime(0, 0, 0, $month, 1, $year));
    $lastDay = date("t", mktime(0, 0, 0, $month, 1, $year));
    $lastDayInt = date("N",mktime(0, 0, 0, $month, $lastDay, $year));
    $lastDayOfMonth = date("l",  mktime(0, 0, 0, $month, $lastDay, $year));
    $start = date('j', strtotime('last day of previous month', strtotime($year.'-'.$month)));
    $numDays = date('t', strtotime($year . '-' . $month));
    

    return [
        'firstDayOfMonth' => $firstDayOfMonth,
        'lastDayOfMonth' => $lastDayOfMonth,
        'lastDayInt' => $lastDayInt,
        'lastDay' => $lastDay,
        'date' => $date,
        'arrayDays' => $arrayDays,
        'start' => $start,
        'numDays' => $numDays,
        'firstDayInt' => $firstDayInt,

    ];
}