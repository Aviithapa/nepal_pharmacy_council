<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UpdateUniqueValidate implements ValidationRule
{

    protected $table;
    protected $id;

    public function __construct($table, $id)
    {
        $this->table = $table;
        $this->id = $id;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $count = DB::table($this->table)
            ->where($attribute, $value)
            ->where('id', '!=', $this->id)
            ->count();

        if ($count > 0) {
            $fail("The $attribute has to be already used.");
        }
    }
}
