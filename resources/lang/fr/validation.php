<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'required'             => 'Le champ :attribute est réquis.',
    'string'               => 'Le champ :attribute doit être une chaîne de charactères.',
    'email'                => 'Le champ :attribute doit être une addresse mail valide.',
    'unique'               => 'La valeur du champ :attribute existe déjà.',
    'confirmed'            => 'Le champs :attribute est différent de la confirmation.',
    'max'                  => [
        'numeric' => 'Le champ :attribute doit contenir :max chiffres au plus.',
        'string'  => 'Le champ :attribute doit contenir :max charactères au plus.'
    ],
    'min'                  => [
        'numeric' => 'Le champ :attribute doit contenir :min chiffres au moins.',
        'string'  => 'Le champ :attribute doit contenir :min charactères au moins.'
    ],

];
