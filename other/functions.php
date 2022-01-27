<?php

function load($data) {           // добавляем новое значение в массив с ключом 'value'
    foreach ($_POST as $key => $value) {
        if (array_key_exists($key, $data)) {
            $data[$key]['value'] = trim($value);
        }
    }
    return $data; 
}

function validate($data) {   // Функция валидации
    $errors = '';
    foreach ($data as $key => $value) {     // в случае незаполненного обязательного поля выводим сообщение об ошибке
        if ($data[$key]['required'] && empty($data[$key]['value'])) {
            $errors .= "<li>!Вы не заполнили поле {$data[$key]['field_name']}</li>";
        }
    }
    if (validatePhone($data)){            // вызов функции валидации поля 'phone'
        $errors .= validatePhone($data); 
    }
    if (validateName($data)){            // вызов функции валидации поля 'name'
        $errors .= validateName($data); 
    }
    if (validateSurename($data)){            // вызов функции валидации поля 'surename'
        $errors .= validateSurename($data); 
    }
    return $errors;
}


 function validatePhone($data) {  // функция валидация для поля 'phone'
    $phone = $data['phone']['value'];
    if (!preg_match ("/^[0-9]*$/", $data['phone']['value']) || iconv_strlen($phone,'UTF-8') < 10 && iconv_strlen($phone,'UTF-8') > 0){  
        $error = "<li> значение поля {$data['phone']['field_name']} должно быть больше или равно 10 символам, должно состоять только из цифр</li>";  
    }
    return $error;
 }

 function validateName($data) {  // функция валидация для поля 'name'
     $name = $data['name']['value'];
        if (!preg_match ("/^[a-zA-zа-яёА-ЯЁ-]*$/iu", $name) || iconv_strlen($name,'UTF-8') < 3 && iconv_strlen($name,'UTF-8') > 0 || iconv_strlen($name,'UTF-8') > 150){  
            $error = "<li> значение поля {$data['name']['field_name']}  должно быть больше 2ух символов, может содержать буквы и тире, максимальная длина 150 символов</li>";  
        }
    return $error;
 }

 function validateSurename($data) {  // функция валидация для поля 'surename'
    $surename = $data['surename']['value'];
    if (!preg_match ("/^[a-zA-zа-яёА-ЯЁ-]*$/iu", $surename) || iconv_strlen($surename,'UTF-8') < 3 && iconv_strlen($surename,'UTF-8') > 0 || iconv_strlen($surename,'UTF-8') > 150){  
       $error = "<li> значение поля {$data['surename']['field_name']}  должно быть больше 2ух символов, может содержать буквы и тире, максимальная длина 150 символов</li>";  
   }
   return $error;
}