<?php

namespace src\Controller\Util;

final class Validation 
{
    protected array $errors = [];
    protected int $month;
    protected int $year;

    public function __construct($array)
    {
        $this->month = intval($array['month']);
        $this->year = intval($array['year']);
    }

    public function validateDates() :array 
    {
        if(!empty($this->month)) {
            if(!preg_match('/^[0-1]{0,1}[0-9]{1}$/', $this->month) && $this->month >= 1 && $this->month <= 12) {
                $this->errors['month'] = 'Le mois est incorrect, il doit être compris entre 1 et 12.';
            }
        } else {
            $this->errors['month'] = 'Le mois n\'est pas renseigné.';
        }
    
        if(!empty($this->year)) {
            if(preg_match('/^((19[0-9]{2})||(201[0-9]{1})||(202[0-3]{1}))$/', $this->year)) {
            } else {
                $this->errors['year'] = 'L\'année est incorrect, il doit être compris entre 1 et 12.';
            }
        } else {
            $this->errors['year'] = 'L\'année n\'est pas renseigné.';
        }
    
            return $this->errors;
    }
}