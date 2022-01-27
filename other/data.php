<?php

$fields = [     // создаем новый массив для валидации
    'name' => [
        'field_name' => 'Имя',
        'required' => 1,
    ],
    'surename' => [
        'field_name' => 'Фамилия',
        'required' => 1,
    ],
    'phone' => [
        'field_name' => 'Мобильный телефон',
        'required' => 1,
    ],
    'comment' => [
        'field_name' => 'Комментарий',
        'required' => 0,
    ]
];
