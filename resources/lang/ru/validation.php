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

    'accepted'             => ' :attribute должен быть принят.',
    'active_url'           => ' :attribute не валидный URL.',
    'after'                => ' :attribute должен быть датой после :date.',
    'after_or_equal'       => ' :attribute должен быть датой после или равен :date.',
    'alpha'                => ' :attribute может содержать только буквы.',
    'alpha_dash'           => ' :attribute может содержать только буквы, цифры и подчёркивания.',
    'alpha_num'            => ' :attribute может содержать только цифры.',
    'array'                => ' :attribute может быть массив.',
    'before'               => ' :attribute может датой до :date.',
    'before_or_equal'      => ' :attribute может быть датой до или равен :date.',
    'between'              => [
        'numeric' => ' :attribute может быть между :min и :max.',
        'file'    => ' :attribute может быть между :min и :max килобайт.',
        'string'  => ' :attribute может быть между :min и :max символов.',
        'array'   => ' :attribute может иметь между :min и :max объектов.',
    ],
    'boolean'              => ' :attribute поле может быть true или false.',
    'confirmed'            => ' :attribute не соответствует подтверждению.',
    'date'                 => ' :attribute неправильный формат даты.',
    'date_format'          => ' :attribute не соответствует формату :format.',
    'different'            => ' :attribute и :other должны различаться.',
    'digits'               => ' :attribute может быть :digits цифровым.',
    'digits_between'       => ' :attribute может быть между :min и :max числами.',
    'dimensions'           => ' :attribute имеет недопустимые размеры изображения.',
    'distinct'             => ' :attribute поле имеет повторяющееся значение.',
    'email'                => ' :attribute должен быть действительным.',
    'exists'               => ' выбранный :attribute не существует.',
    'file'                 => ' :attribute должен быть файлом.',
    'filled'               => ' :attribute должно иметь значение.',
    'image'                => ' :attribute должен быть изображением.',
    'in'                   => ' выбранный :attribute не в списке возможных.',
    'in_array'             => ' :attribute поле не существует в :other.',
    'integer'              => ' :attribute должно быть целым числом.',
    'ip'                   => ' :attribute должно быть правильным IP адресом.',
    'ipv4'                 => ' :attribute должно быть правильным IPv4 адресом.',
    'ipv6'                 => ' :attribute должно быть правильным IPv6 адресом.',
    'json'                 => ' :attribute должно быть правильной JSON строкой.',
    'max'                  => [
        'numeric' => ' :attribute не может быть больше, чем :max.',
        'file'    => ' :attribute не может быть больше, чем :max килобайт.',
        'string'  => ' :attribute не может быть больше, чем :max символов.',
        'array'   => ' :attribute не может иметь элементов больше, чем :max.',
    ],
    'mimes'                => ' :attribute дожен быть файлом типа: :values.',
    'mimetypes'            => ' :attribute дожен быть файлом типа: :values.',
    'min'                  => [
        'numeric' => ' :attribute не может быть меньше :min.',
        'file'    => ' :attribute не может быть меньше :min килобайт.',
        'string'  => ' :attribute не может быть меньше :min символов.',
        'array'   => ' :attribute не может быть меньше :min элементов.',
    ],
    'not_in'               => ' выбранный :attribute неправильный.',
    'numeric'              => ' :attribute должен быть числом.',
    'present'              => ' :attribute поле должно присутствовать.',
    'regex'                => ' :attribute неправильного формата.',
    'required'             => ' :attribute поле обязательно.',
    'required_if'          => ' :attribute поле обязательно, когда :other :value.',
    'required_unless'      => ' :attribute поле обязательно, если :other не :values.',
    'required_with'        => ' :attribute поле обязательно, когда :values is present.',
    'required_with_all'    => ' :attribute поле обязательно, когда :values is present.',
    'required_without'     => ' :attribute поле обязательно, когда :values is not present.',
    'required_without_all' => ' :attribute поле обязательно, когда нет :values.',
    'same'                 => ' :attribute и :other должны соответствовать.',
    'size'                 => [
        'numeric' => ' :attribute должен быть :size.',
        'file'    => ' :attribute должен быть :size килобайт.',
        'string'  => ' :attribute должен быть :size символы.',
        'array'   => ' :attribute должен содержать :size элементов.',
    ],
    'string'               => ' :attribute должен быть строкой.',
    'timezone'             => ' :attribute должен быть правильной зоной.',
    'unique'               => ' :attribute уже существует.',
    'uploaded'             => ' :attribute не получилось загрузить.',
    'url'                  => ' :attribute неправильного формата.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
