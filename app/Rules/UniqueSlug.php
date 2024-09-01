<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UniqueSlug implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    protected $table;
    protected $id;

    public function __construct($table, $id)
    {
        $this->table = $table;
        $this->id = $id;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $slug = generateSlug($value);
        $count = DB::table($this->table)
            ->where('slug', $slug)
            ->where('id', '!=', $this->id)
            ->count();

        if ($count > 0) {
            $fail("The $attribute has to be already used.");
        }
    }
}
