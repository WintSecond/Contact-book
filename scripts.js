// маска для номера телефона
$(() => {
    $('#addTel,#editTel').mask('+7 (000) 000 00 00');
});

// Добавление контакта

$(() => {
    // Открывает окно добавления контака
    $('#contactsAdd').on('click', () => {
        $('.popup__add.wrapper').addClass('active');
    });

    // Клик по фону закрывает окно добавления контакта
    $('.popup__add.wrapper').on('click', (e) => {
        $(e.target).removeClass('active');
    });

    // Клик по крестику закрывает окно добавления контакта
    $('.popup-close').on('click', () => {
        $('.popup__add.wrapper').removeClass('active');
    });
});

// Редактирование контакта

$(() => {
    // Открывает окно редактирование контака
    $(document).on('click', '.item__edit', function () {
        $('.popup__edit.wrapper').addClass('active');
    });

    // Клик по фону закрывает окно редактирования контакта
    $('.popup__edit.wrapper').on('click', (e) => {
        $(e.target).removeClass('active');
    });

    // Клик по крестику закрывает окно редактирования контакта
    $('.popup-close').on('click', () => {
        $('.popup__edit.wrapper').removeClass('active');
    });

});

// Поиск контакта
$(() => {
    $('#search').on('input', function () {
        const searchText = $(this).val().toLowerCase();

        if (searchText.length >= 3) {
            $('.contacts__item .item_name').each(function () {
                const name = $(this).text().toLowerCase();

                if (name.indexOf(searchText) === -1) {
                    $(this).parents('.contacts__item').hide();
                } else {
                    $(this).parents('.contacts__item').show();
                }
            });
        } else if (searchText.length < 3) {
            $('.contacts__item').show();
        }
    });
});

// Удаление контакта
$(() => {
    $(document).on('click', '.item__remove', function () {
        const id = $(this).data('id');

        $(`#contact_item${id}`).parents('.col-12').remove();

        $.ajax({
            url: 'removeContact.php',
            type: 'POST',
            caches: false,
            data: [
                {name: 'id', value: id}
            ],
        }).done(function (response) {
            const r = JSON.parse(response);

            if (!r.error) {
                alert('Контакт удален');
            } else {
                alert(r.message);
            }
        });
    });
});

// отправка формы создания контактов
$(() => {
    $('.popup__add .content').on('submit', function (e) {
        e.preventDefault();

        $('.popup__add .content input[name="id"]').val(Date.now());

        let newItem = $(this).serializeArray();

        console.log(newItem);

        $.ajax({
            url: 'contacts.php',
            type: 'POST',
            caches: false,
            data: newItem,
        }).done(function (response) {
            const r = JSON.parse(response);

            if (!r.error) {
                alert('Контакт добавлен');
            } else {
                alert(r.message);
            }
        });

        $(this)[0].reset();
        $('.popup__add.wrapper').removeClass('active');

    });
});