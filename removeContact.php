<?php

function prnt($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

if (isset($_POST['id'])) {
    
    $contacts = json_decode(file_get_contents('contacts.json'), true);
    
    $newContacts = [];

    foreach($contacts['contacts'] as $item) {
        if ($item['id'] != $_POST['id']) {
            $newContacts[] = $item;
        }
    }

    $contacts['contacts'] = $newConctacts;

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
} else {
    echo json_encode([
        'error' => 1,
        'message' => 'Не указан ID'
    ]);
}