<?php

function prnt($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

if (isset($_POST['name']) && isset($_POST['phone'])) {

    $contacts = json_decode(file_get_contents('contacts.json'), true);
    
    $newContact = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'phone' => $_POST['phone'],
    ];

    
    $contacts['contacts'][] = $newContact;

    if (file_put_contents('contacts.json', json_encode($contacts))) {
        echo json_encode([
            'error' => 0
        ]);
    } else {
        echo json_encode([
            'error' => 1,
            'message' => 'Ошибка записи файла'
        ]);
    }
}
