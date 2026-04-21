(function () {
    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    const $searchInput = $('#searchInput');

    $searchInput.on('keyup', function () {
        var value = $(this).val();
        $("#table tbody tr").filter(function() {
            $(this).toggle($(this).text().indexOf(value) > -1);
        });
    });

    $('body').on('click', '#register_btn', function (e) {
        e.preventDefault();
        form = $('#createUser'),
        url = $(form).attr('action');
        $(form).find('.invalid-feedback').text('');

        let request = {
            name: $(form).find('#register-name').val(),
            surname: $(form).find('#register-surname').val(),
            email: $(form).find('#register-email').val(),
            role: $(form).find('#register-role').val(),
            password: $(form).find('#register-password').val(),
            password_confirmation: $(form).find('#register-password-confirm').val()
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $.ajax({
            url: url,
            data: JSON.stringify(request),
            type: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            success: function (response) {
                if (response.type == 'success') {
                    window.location.href = response.redirect;
                } else {
                    $.each(response.errors, function(index, value) {
                        $(form).find('.error_'+index).css('display', 'block');
                        $(form).find('.error_'+index).text(value);                        
                    });
                }
            },
            error: function (xhr, status, error) {
                alert('Server error. contact to Administrator');
            }
        });
    });

    $('.edit_permissions').on('click', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        var permissions = $('input[name="permissions"]:checked').map(function() {
            return this.value; // Return the value of each checked checkbox
        }).get();

        let request = {
            permissions: permissions,
        };

        $.ajax({
            url: '/backend/edit/role/permission/'+$(this).data('id'),
            data: JSON.stringify(request),
            type: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            success: function (response) {
                if (response.type == 'success') {
                    window.location.href = response.redirect;
                }
            },
            error: function (xhr, status, error) {
                alert('Server error. contact to Administrator');
            }
        });
    });
    if ($.isFunction($.fn.mask)) {
        $('input[type="tel"]').mask('+994(88) 888-88-88').data('start', 0).on('click', function() {
            const start = $(this).val().indexOf('_');
            if(!$(this).data('start')) $(this).data('start', start);
            if(start == $(this).data('start')) $(this)[0].setSelectionRange(start, start);
        });
    }

    $('body').on('click', '#createTicket', function (e) {
        e.preventDefault();
        form = '#newTicketForm',
        url = $(form).attr('action');
        $(form).find('.invalid-feedback').text('');

        var formData = new FormData();
        data = $(form+' input, '+form+' select, '+form+' textarea').serializeArray();
        files = $(form).find('#ticketAttachments')[0].files;

		$.each(data, function (key, input) {
			formData.append(input.name, input.value);
		});

		$.each(files, function(i, file) {
            formData.append('file[]', file);
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $.ajax({
            url: url,
            data: formData,
            type: 'POST',
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                if (response.type == 'success') {
                    window.location.href = response.redirect;
                } else {
                    $.each(response.errors, function(index, value) {
                        $(form).find('.error_'+index).css('display', 'block');
                        $(form).find('.error_'+index).text(value);                        
                    });
                }
            },
            error: function (xhr, status, error) {
                alert('Server error. contact to Administrator');
            }
        });
    });

    $('body').on('click', '#replyTicket', function (e) {
        e.preventDefault();
        form = '#ticketReply',
        url = $(form).attr('action');
        $(form).find('.invalid-feedback').text('');

        var formData = new FormData();
        data = $(form+' input, '+form+' textarea').serializeArray();
        files = $(form).find('#ticketAttachments')[0].files;

		$.each(data, function (key, input) {
			formData.append(input.name, input.value);
		});

		$.each(files, function(i, file) {
            formData.append('file[]', file);
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $.ajax({
            url: url,
            data: formData,
            method: 'POST',
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#loading').removeClass('d-none');
            },
            success: function (response) {
                if (response.type == 'error') {
                    $.each(response.errors, function(index, value) {
                        $(form).find('.error_'+index).css('display', 'block');
                        $(form).find('.error_'+index).text(value);                        
                    });
                } else {
                    $('#loading').addClass('d-none');
                    //$('#chat_body').append(response);
                    $('#ticketReply').trigger('reset');
                }
            },
            error: function (xhr, status, error) {
                alert('Server error. contact to Administrator');
            }
        });
    });
})();