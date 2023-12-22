<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Cache;

//Clase para verificar que no se creen mas de tres periodos
class MaxThreeSubmissions implements Rule
{
    public function passes($attribute, $value)
    {
        $formKey = 'form_id_' . $value;

        $submissions = Cache::get($formKey, 0);

        return $submissions < 3;
    }


    public function message()
    {
        return 'Has alcanzado el límite de envíos para este formulario.';
    }
}
