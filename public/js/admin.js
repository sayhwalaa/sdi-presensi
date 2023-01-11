$('#addAdminModal').on('shown.bs.modal', function () {
    $(this).find('[autofocus]').focus();
    $('#addAdminModal').find('.form-control').removeClass('is-invalid');
    $('#addAdminModal').find('.invalid-feedback').hide();
});

$(document).on('click', '#addAdmin', function () {
    $('#addAdminLabel').text('Pendaftaran Admin')
    $('#addAdminModal').find('input').val('');
    $('#addAdminModal').find('select').val('0');
    $('#nama').parent().show()
    $('#email').parent().show()
    $('#password').parent().show()
    $('#password_confirmation').parent().show()
    $('#edit').attr('id', 'save')
    $('#save').text('Daftar')
});

$(document).on('click', '#save', function (e) {
    e.preventDefault();
    $.ajax({
        url: '/resource/admin',
        type: 'POST',
        data: {
            nama: $('#nama').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            password_confirmation: $('#password_confirmation').val(),
        },
        success: function (response) {
            if (response.status == 400) {
                $('#addAdminModal').find('.invalid-feedback').show();
                if (response.errors['nama'] == undefined) {
                    $('#nama').removeClass('is-invalid');
                    $('#nama-feedback').hide();
                } else {
                    $('#nama-feedback').text(response.errors['nama']);
                    $('#nama').addClass('is-invalid');
                }
                if (response.errors['email'] == undefined) {
                    $('#email').removeClass('is-invalid');
                    $('#email-feedback').hide();
                } else {
                    $('#email-feedback').text(response.errors['email']);
                    $('#email').addClass('is-invalid');
                }
                if (response.errors['password'] == undefined) {
                    $('#password').removeClass('is-invalid');
                    $('#password-feedback').hide();
                } else {
                    $('#password-feedback').text(response.errors['password']);
                    $('#password').addClass('is-invalid');
                }
                if (response.errors['password_confirmation'] == undefined) {
                    $('#password_confirmation').removeClass('is-invalid');
                    $('#password_confirmation-feedback').hide();
                } else {
                    $('#password_confirmation-feedback').text(response.errors['password_confirmation']);
                    $('#password_confirmation').addClass('is-invalid');
                }
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    timer: 1500,
                    showConfirmButton: false,
                });
                $('#addAdminModal').find('.form-control').val('');
                $('#addAdminModal').find('.form-control').removeClass('is-invalid');
                $('#addAdminModal').find('.invalid-feedback').hide();
                $('#addAdminModal').modal('hide');
                $('#admin-table').load(' #admin-table');
            }
        }
    });
});

$(document).on('click', '#edit', function (e) {
    e.preventDefault();
    let id = $('#id').val()
    console.log(id);
    $.ajax({
        url: '/resource/admin/' + id,
        type: 'PUT',
        data:
        {
            id: id,
            nama: $('#nama').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            password_confirmation: $('#password_confirmation').val(),

        },
        success: function (response) {
            if (response.status == 400) {
                $('#addAdminModal').find('.invalid-feedback').show();
                if (response.errors['nama'] == undefined) {
                    $('#nama').removeClass('is-invalid');
                    $('#nama-feedback').hide();
                } else {
                    $('#nama-feedback').text(response.errors['nama']);
                    $('#nama').addClass('is-invalid');
                }
                if (response.errors['email'] == undefined) {
                    $('#email').removeClass('is-invalid');
                    $('#email-feedback').hide();
                } else {
                    $('#email-feedback').text(response.errors['email']);
                    $('#email').addClass('is-invalid');
                }
                if (response.errors['password'] == undefined) {
                    $('#password').removeClass('is-invalid');
                    $('#password-feedback').hide();
                } else {
                    $('#password-feedback').text(response.errors['password']);
                    $('#password').addClass('is-invalid');
                }
                if (response.errors['password_confirmation'] == undefined) {
                    $('#password_confirmation').removeClass('is-invalid');
                    $('#password_confirmation-feedback').hide();
                } else {
                    $('#password_confirmation-feedback').text(response.errors['password_confirmation']);
                    $('#password_confirmation').addClass('is-invalid');
                }

            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    timer: 1500,
                    showConfirmButton: false,
                });
                $('#addAdminModal').find('.form-control').val('');
                $('#addAdminModal').find('.form-control').removeClass('is-invalid');
                $('#addAdminModal').find('.invalid-feedback').hide();
                $('#addAdminModal').modal('hide');
                $('#admin-table').load(' #admin-table');
            }
        }
    });
});

function editForm(url) {
    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        success: function (response) {
            $('#id').val(response.id)
            $('#nama').val(response.nama)
            $('#email').val(response.email)
            $('#nama').parent().show()
            $('#email').parent().show()
            $('#password').parent().hide()
            $('#password_confirmation').parent().hide()
            $('#addAdminLabel').text('Edit Admin')
            $('#save').text('Edit')
            $('#save').attr('id', 'edit')
        }
    });
}
$(document).on('click', '#reset', function (e) {
    e.preventDefault();
    let idReset = $('#idReset').val()
    $.ajax({
        url: '/resource/admin/' + idReset,
        type: 'PUT',
        data:
        {
            idReset: idReset,
            password: $('#password').val(),
            password_confirmation: $('#password_confirmation').val(),

        },
        success: function (response) {
            if (response.status == 400) {
                $('#addAdminModal').find('.invalid-feedback').show();
                if (response.errors['password'] == undefined) {
                    $('#password').removeClass('is-invalid');
                    $('#password-feedback').hide();
                } else {
                    $('#password-feedback').text(response.errors['password']);
                    $('#password').addClass('is-invalid');
                }
                if (response.errors['password_confirmation'] == undefined) {
                    $('#password_confirmation').removeClass('is-invalid');
                    $('#password_confirmation-feedback').hide();
                } else {
                    $('#password_confirmation-feedback').text(response.errors['password_confirmation']);
                    $('#password_confirmation').addClass('is-invalid');
                }

            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    timer: 1500,
                    showConfirmButton: false,
                });
                $('#addAdminModal').find('.form-control').val('');
                $('#addAdminModal').find('.form-control').removeClass('is-invalid');
                $('#addAdminModal').find('.invalid-feedback').hide();
                $('#addAdminModal').modal('hide');
            }
        }
    });
});
function resetForm(id) {
    $('#idReset').val(id)
    $('#nama').parent().hide()
    $('#email').parent().hide()
    $('#password').parent().show()
    $('#password_confirmation').parent().show()
    $('#addAdminLabel').text('Change Password')
    $('#save').text('Edit')
    $('#save').attr('id', 'reset')
}
function deleteForm(url) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: url,
                dataType: "json",
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        timer: 1500,
                        showConfirmButton: false,
                    });
                }
            })
        }
        $('#admin-table').load(' #admin-table');

    })
}