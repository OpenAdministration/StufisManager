<?php

namespace App\Rules\Hostsharing;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueUser implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void {}
}
