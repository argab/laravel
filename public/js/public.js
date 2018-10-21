
$(document).on('click', '.js-modal', function (event)
{
    load_modal($(this), null, event)
});

$(document).on('click', '.js-modal-submit,#modal-submit', function (event)
{
    submit_modal($(this), event)
});

function load_modal(el, modal_id, event)
{
    event.preventDefault();

    event.stopPropagation();

    var t = el ? el : null;
    var mid = t ? $('#' + t.attr('data-modal-id')) : $('#' + modal_id);

    $('<div class="modal-footer">'
        + '<button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button> '
        + '<button type="button" class="btn btn-info js-modal-submit">' + (submitBtn ? submitBtn
            : 'Сохранить') + '</button></div>'
    ).insertAfter(mid.find('.modal-body'));

    if (t ? t.data('modal-title') : null)
    {
        mid.find('.modal-title').remove();

        mid.find('.modal-header').append('<h3 class="modal-title">' + t.data('modal-title') + '</h3>');
    }
    else
    {
        mid.find('.modal-header').find('.modal-title').remove()
    }

    if (t)

        var href = t.data('href') ? t.data('href') : (t.attr('href') ? t.attr('href') : null);

    if (href)
    {
        mid.find('.modal-body').empty();

        $.get(href, function (data)
        {
            if (data.html)
            {
                mid.find('.modal-body').html(data.html);
            }
            else
            {
                mid.find('.modal-body').html(data);
            }
        });
    }

    mid.modal('show');

    return false;
}

function submit_modal(el, event)
{
    event.preventDefault();

    var contents = el ? el.parents('div.modal-content') : $('.modal div.modal-content');

    var form = contents.find('form:visible:first');

    var container = contents.find('.modal-body');

    var formData = new FormData(form[0]);

    $.ajax({
        type:        "POST",
        dataType:    "JSON",
        processData: false,
        contentType: false,
        url:         form.attr('action'),
        data:        formData,
        error:       function (data)
        {
            alert('Данное действие отклонено.');
        },
        success:     function (data)
        {
            if ('redirect' in data)
            {
                location.href = data.redirect;

                return true;
            }

            if ('html' in data)
            {
                (data.container ? contents.find(data.container) : container).html(data.html);

                return true;
            }

            if ('success' in data && data.success)
            {
                location.reload();
            }
            else if ('errors' in data && !$.isEmptyObject(data.errors))
            {
                var arr = $.map(typeof(data.errors) === 'string' ? [data.errors]
                    : data.errors, function (a)
                {
                    return a;
                });

                alert(arr.join(";\n"))
            }
        }
    });
}