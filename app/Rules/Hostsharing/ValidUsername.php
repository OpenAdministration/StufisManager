<?php

namespace App\Rules\Hostsharing;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Spatie\Regex\Regex;

class ValidUsername implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // full pattern: ^([a-z]{3}[0-9]{2})-([a-z0-9_]{2,20})$
        if(!Regex::match('/^([a-z0-9_]{2,20})$/', $attribute)->hasMatch()){
            $fail(":attribute is not a valid username.");
        }
    }
}
