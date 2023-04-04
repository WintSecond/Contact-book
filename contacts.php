<?php
function prnt($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

$contacts = json_decode(file_get_contents('contacts.json'), true);
$contacts = $contacts['contacts'];

if (isset($_POST['name']) && isset($_POST['phone'])) {
    $newContact = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'phone' => $_POST['phone'],
    ];
    $contacts = json_decode(file_get_contents('contacts.json'), true);
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

// function addContact()
// {
//     if ($_POST['n1'] != '' && $_POST['n2'] != '') {
//     }
// }

// if (isset($_POST['submit'])) {
//     $file = "contacts.json";
//     $arr = array(
//         'id'       => $_POST['id'],
//         'name'     => $_POST['name'],
//         'email'    => $_POST['email'],
//         'phone'    => $_POST['phone'],
//     );
//     $json_string = json_encode($arr, JSON_UNESCAPED_UNICODE);
//     file_put_contents($file, '[' . $json_string . ']', FILE_APPEND);
// }

?>

<?php if(!isset($_POST['name']) && !isset($_POST['phone'])) { ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>

    <section class="contacts">
        <div class="container">
            <input type="search" placeholder="Поиск" id="search">
            <div class="row">
                <div class="col-12">
                    <button type="button" id="contactsAdd" class="contacts__add">+ Добавить контакт</button>
                </div>
            </div>

            <div class="contactList">
                <div class="row">
                    <?php foreach ($contacts as $item) { ?>
                        <div class="col-12">
                            <div class="contacts__item item" id="contact_item<?php echo $item['id'] ?>">
                                <div class="item__info">
                                    <h3 class="item_name"><?php echo $item['name'] ?></h3>
                                    <a class="item_phone" href="tel:${item.phone}"><?php echo $item['phone'] ?></a>
                                </div>
                                <div class="item__actions">
                                    <form method="post">
                                        <button type="button" name="editButton" class="item__edit item__action" id="editButton" data-id="<?php echo $item['id'] ?>">
                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
                                                <g id="XMLID_23_">
                                                    <path id="XMLID_24_" d="M75,180v60c0,8.284,6.716,15,15,15h60c3.978,0,7.793-1.581,10.606-4.394l164.999-165
                                                    c5.858-5.858,5.858-15.355,0-21.213l-60-60C262.794,1.581,258.978,0,255,0s-7.794,1.581-10.606,4.394l-165,165
                                                    C76.58,172.206,75,176.022,75,180z M105,186.213L255,36.213L293.787,75l-150,150H105V186.213z" />
                                                    <path id="XMLID_27_" d="M315,150.001c-8.284,0-15,6.716-15,15V300H30V30H165c8.284,0,15-6.716,15-15s-6.716-15-15-15H15
                                                    C6.716,0,0,6.716,0,15v300c0,8.284,6.716,15,15,15h300c8.284,0,15-6.716,15-15V165.001C330,156.716,323.284,150.001,315,150.001z" />
                                                </g>
                                            </svg>
                                        </button>
                                        <button type="button" name="delButton" class="item__remove item__action" id="delButton" data-id="<?php echo $item['id'] ?>">
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="34.386px" height="34.386px" viewBox="0 0 34.386 34.386" style="enable-background:new 0 0 34.386 34.386;" xml:space="preserve">
                                                <g>
                                                    <path d="M26.361,4.052h-3.564c0.004-0.039,0.021-0.074,0.021-0.114C22.818,1.767,21.051,0,18.881,0h-4.125
                                                c-2.171,0-3.938,1.767-3.938,3.938c0,0.041,0.019,0.075,0.023,0.114H8.025c-1.656,0-3,1.344-3,3v1.167h24.333V7.052
                                                C29.361,5.396,28.018,4.052,26.361,4.052z M12.818,3.938C12.818,2.87,13.688,2,14.756,2h4.125c1.067,0,1.938,0.869,1.938,1.938
                                                c0,0.041,0.019,0.075,0.022,0.114h-8.046C12.799,4.013,12.818,3.978,12.818,3.938z M5.026,31.386c0,1.656,1.344,3,3,3H26.36
                                                c1.656,0,3-1.344,3-3V10.219H5.026V31.386z M24.193,13.72c0-0.552,0.449-1,1-1c0.553,0,1,0.448,1,1v17.373c0,0.554-0.447,1-1,1
                                                c-0.551,0-1-0.446-1-1V13.72z M18.861,13.72c0-0.552,0.447-1,1-1c0.551,0,1,0.448,1,1v17.373c0,0.554-0.449,1-1,1
                                                c-0.553,0-1-0.446-1-1V13.72z M13.526,13.72c0-0.552,0.448-1,1-1c0.552,0,1,0.448,1,1v17.373c0,0.554-0.448,1-1,1
                                                c-0.552,0-1-0.446-1-1V13.72z M8.193,13.72c0-0.552,0.448-1,1-1s1,0.448,1,1v17.373c0,0.554-0.448,1-1,1s-1-0.446-1-1V13.72z" />
                                                </g>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <div class="popup__edit wrapper">
        <form action="contacts.php" method="POST" class="content">
            <input type="hidden" name="id" value="">
            <div class="content__bottom-close">
                <button type="button" class="popup-close">✕</button>
            </div>
            <h3>Изменить контакт</h3>
            <div class="content__name">
                <p>Имя:</p>
                <input type="text" name="name" id="editName" value="">
            </div>
            <div class="content__tel">
                <p>Номер телефона:</p>
                <input type="tel" name="phone" id="editTel" value="">
            </div>
            <button type="submit" id="editButtonSave" class="content_edit button">Сохранить</button>
        </form>
    </div>

    <div class="popup__add wrapper">
        <form action="contacts.php" method="POST" class="content">
            <input type="hidden" name="id" id="addID">
            <div class="content__bottom-close">
                <button type="button" class="popup-close">✕</button>
            </div>
            <h3>Добавить контакт</h3>
            <div class="content__name">
                <p>Имя:</p>
                <input type="text" name="name" id="addName" placeholder="Иван Петрович">
            </div>
            <div class="content__tel">
                <p>Номер телефона:</p>
                <input type="tel" name="phone" id="addTel" placeholder="+7888888888">
            </div>
            <button type="submit" id="addButton" class="content_add button">Добавить</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./jquery.mask.min.js"></script>
    <script src="./scripts.js"></script>
</body>

</html>
<?php } ?>