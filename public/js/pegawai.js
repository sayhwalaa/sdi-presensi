$('#addPegawaiModal').on('shown.bs.modal', function () {
    $(this).find('[autofocus]').focus();
    $('#addPegawaiModal').find('.form-control').removeClass('is-invalid');
    $('#addPegawaiModal').find('.invalid-feedback').hide();
});

$(document).on('click', '#addPegawai', function () {
    $('#addPegawaiLabel').text('Pendaftaran Pegawai')
    $('#addPegawaiModal').find('input').val('');
    $('#addPegawaiModal').find('select').val('0');
    $('#edit').attr('id', 'save')
    $('#save').text('Daftar')
});

$(document).on('click', '#save', function (e) {
    e.preventDefault();
    $.ajax({
        url: '/resource/pegawai',
        type: 'POST',
        data: {
            nip: $('#nip').val(),
            nama: $('#nama').val(),
            email: $('#email').val(),
            tgl_lahir: $('#tgl_lahir').val(),
            j_k: $('#j_k').val(),
            no_tlp: $('#no_tlp').val(),
            jabatan_id: $('#jabatan_id').val(),
            cabang_id: $('#cabang_id').val(),
            alamat: $('#alamat').val(),
        },
        success: function (response) {
            if (response.status == 400) {
                $('#addPegawaiModal').find('.invalid-feedback').show();
                if (response.errors['nip'] == undefined) {
                    $('#nip').removeClass('is-invalid');
                    $('#nip-feedback').hide();
                } else {
                    $('#nip-feedback').text(response.errors['nip']);
                    $('#nip').addClass('is-invalid');
                }
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
                if (response.errors['tgl_lahir'] == undefined) {
                    $('#tgl_lahir').removeClass('is-invalid');
                    $('#tgl_lahir-feedback').hide();
                } else {
                    $('#tgl_lahir-feedback').text(response.errors['tgl_lahir']);
                    $('#tgl_lahir').addClass('is-invalid');
                }
                if (response.errors['j_k'] == undefined) {
                    $('#j_k').removeClass('is-invalid');
                    $('#j_k-feedback').hide();
                } else {
                    $('#j_k-feedback').text(response.errors['j_k']);
                    $('#j_k').addClass('is-invalid');
                }
                if (response.errors['no_tlp'] == undefined) {
                    $('#no_tlp').removeClass('is-invalid');
                    $('#no_tlp-feedback').hide();
                } else {
                    $('#no_tlp-feedback').text(response.errors['no_tlp']);
                    $('#no_tlp').addClass('is-invalid');
                }
                if (response.errors['jabatan_id'] == undefined) {
                    $('#jabatan_id').removeClass('is-invalid');
                    $('#jabatan_id-feedback').hide();
                } else {
                    $('#jabatan_id-feedback').text(response.errors['jabatan_id']);
                    $('#jabatan_id').addClass('is-invalid');
                }
                if (response.errors['cabang_id'] == undefined) {
                    $('#cabang_id').removeClass('is-invalid');
                    $('#cabang_id-feedback').hide();
                } else {
                    $('#cabang_id-feedback').text(response.errors['cabang_id']);
                    $('#cabang_id').addClass('is-invalid');
                }

            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    timer: 1500,
                    showConfirmButton: false,
                });
                $('#addPegawaiModal').find('.form-control').val('');
                $('#addPegawaiModal').find('.form-control').removeClass('is-invalid');
                $('#addPegawaiModal').find('.invalid-feedback').hide();
                $('#addPegawaiModal').modal('hide');
                $('#pegawai-table').load(' #pegawai-table');
            }
        }
    });
});

$(document).on('click', '#edit', function (e) {
    e.preventDefault();
    let id = $('#id').val()
    console.log(id);
    $.ajax({
        url: '/resource/pegawai/' + id,
        type: 'PUT',
        data:
        {
            id: id,
            nip: $('#nip').val(),
            nama: $('#nama').val(),
            email: $('#email').val(),
            tgl_lahir: $('#tgl_lahir').val(),
            j_k: $('#j_k').val(),
            no_tlp: $('#no_tlp').val(),
            jabatan_id: $('#jabatan_id').val(),
            cabang_id: $('#cabang_id').val(),
            alamat: $('#alamat').val(),

        },
        success: function (response) {
            if (response.status == 400) {
                $('#addPegawaiModal').find('.invalid-feedback').show();
                if (response.errors['nip'] == undefined) {
                    $('#nip').removeClass('is-invalid');
                    $('#nip-feedback').hide();
                } else {
                    $('#nip-feedback').text(response.errors['nip']);
                    $('#nip').addClass('is-invalid');
                }
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

                if (response.errors['tgl_lahir'] == undefined) {
                    $('#tgl_lahir').removeClass('is-invalid');
                    $('#tgl_lahir-feedback').hide();
                } else {
                    $('#tgl_lahir-feedback').text(response.errors['tgl_lahir']);
                    $('#tgl_lahir').addClass('is-invalid');
                }
                if (response.errors['j_k'] == undefined) {
                    $('#j_k').removeClass('is-invalid');
                    $('#j_k-feedback').hide();
                } else {
                    $('#j_k-feedback').text(response.errors['j_k']);
                    $('#j_k').addClass('is-invalid');
                }
                if (response.errors['no_tlp'] == undefined) {
                    $('#no_tlp').removeClass('is-invalid');
                    $('#no_tlp-feedback').hide();
                } else {
                    $('#no_tlp-feedback').text(response.errors['no_tlp']);
                    $('#no_tlp').addClass('is-invalid');
                }
                if (response.errors['jabatan_id'] == undefined) {
                    $('#jabatan_id').removeClass('is-invalid');
                    $('#jabatan_id-feedback').hide();
                } else {
                    $('#jabatan_id-feedback').text(response.errors['jabatan_id']);
                    $('#jabatan_id').addClass('is-invalid');
                }
                if (response.errors['cabang_id'] == undefined) {
                    $('#cabang_id').removeClass('is-invalid');
                    $('#cabang_id-feedback').hide();
                } else {
                    $('#cabang_id-feedback').text(response.errors['cabang_id']);
                    $('#cabang_id').addClass('is-invalid');
                }

            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    timer: 1500,
                    showConfirmButton: false,
                });
                $('#addPegawaiModal').find('.form-control').val('');
                $('#addPegawaiModal').find('.form-control').removeClass('is-invalid');
                $('#addPegawaiModal').find('.invalid-feedback').hide();
                $('#addPegawaiModal').modal('hide');
                $('#pegawai-table').load(' #pegawai-table');
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
            $('#idReset').val('')
            $('#id').val(response.user_id)
            $('#nip').val(response.nip)
            $('#nama').val(response.nama)
            $('#email').val(response.email)
            $('#tgl_lahir').val(response.tgl_lahir)
            $('#j_k').val(response.j_k)
            $('#no_tlp').val(response.no_tlp)
            $('#jabatan_id').val(response.jabatan_id)
            $('#cabang_id').val(response.cabang_id)
            $('#alamat').val(response.alamat)
            $('#addPegawaiLabel').text('Edit Pegawai')
            $('#save').text('Edit')
            $('#save').attr('id', 'edit')
        }
    });
}
$(document).on('click', '#reset', function (e) {
    e.preventDefault();
    let idReset = $('#idReset').val()
    $.ajax({
        url: '/resource/pegawai/' + idReset,
        type: 'PUT',
        data:
        {
            idReset: idReset,
            password: $('#password').val(),
            password_confirmation: $('#password_confirmation').val(),

        },
        success: function (response) {
            if (response.status == 400) {
                $('#resetModal').find('.invalid-feedback').show();
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
                $('#resetModal').find('.form-control').val('');
                $('#resetModal').find('.form-control').removeClass('is-invalid');
                $('#resetModal').find('.invalid-feedback').hide();
                $('#resetModal').modal('hide');
            }
        }
    });
});
function resetForm(id) {
    $('#idReset').val(id)
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
        $('#pegawai-table').load(' #pegawai-table');

    })
}