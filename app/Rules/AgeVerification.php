<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AgeVerification implements Rule
{
    protected $dob;

    public function __construct($dob)
    {
        $this->dob = $dob;
    }

    public function passes($attribute, $value)
    {

        if (!$this->dob) {
            return false;
        }

        $dob = new \DateTime($this->dob);
        $now = new \DateTime();
        $age = $dob->diff($now)->y;

        return $age >= 18;
    }

    public function message()
    {
        return 'The selected date of birth does not meet the minimum age requirement.';
    }
}
