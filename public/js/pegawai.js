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
        url: '/pegawai',
        type: 'POST',
        data: {
            nip: $('#nip').val(),
            nama: $('#nama').val(),
            tgl_lahir: $('#tgl_lahir').val(),
            j_kelamin: $('#j_kelamin').val(),
            no_telepon: $('#no_telepon').val(),
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
                if (response.errors['tgl_lahir'] == undefined) {
                    $('#tgl_lahir').removeClass('is-invalid');
                    $('#tgl_lahir-feedback').hide();
                } else {
                    $('#tgl_lahir-feedback').text(response.errors['tgl_lahir']);
                    $('#tgl_lahir').addClass('is-invalid');
                }
                if (response.errors['j_kelamin'] == undefined) {
                    $('#j_kelamin').removeClass('is-invalid');
                    $('#j_kelamin-feedback').hide();
                } else {
                    $('#j_kelamin-feedback').text(response.errors['j_kelamin']);
                    $('#j_kelamin').addClass('is-invalid');
                }
                if (response.errors['no_telepon'] == undefined) {
                    $('#no_telepon').removeClass('is-invalid');
                    $('#no_telepon-feedback').hide();
                } else {
                    $('#no_telepon-feedback').text(response.errors['no_telepon']);
                    $('#no_telepon').addClass('is-invalid');
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
        url: '/pegawai/' + id,
        type: 'PUT',
        data:
        {
            id: id,
            nip: $('#nip').val(),
            nama: $('#nama').val(),
            tgl_lahir: $('#tgl_lahir').val(),
            j_kelamin: $('#j_kelamin').val(),
            no_telepon: $('#no_telepon').val(),
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
                if (response.errors['tgl_lahir'] == undefined) {
                    $('#tgl_lahir').removeClass('is-invalid');
                    $('#tgl_lahir-feedback').hide();
                } else {
                    $('#tgl_lahir-feedback').text(response.errors['tgl_lahir']);
                    $('#tgl_lahir').addClass('is-invalid');
                }
                if (response.errors['j_kelamin'] == undefined) {
                    $('#j_kelamin').removeClass('is-invalid');
                    $('#j_kelamin-feedback').hide();
                } else {
                    $('#j_kelamin-feedback').text(response.errors['j_kelamin']);
                    $('#j_kelamin').addClass('is-invalid');
                }
                if (response.errors['no_telepon'] == undefined) {
                    $('#no_telepon').removeClass('is-invalid');
                    $('#no_telepon-feedback').hide();
                } else {
                    $('#no_telepon-feedback').text(response.errors['no_telepon']);
                    $('#no_telepon').addClass('is-invalid');
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
            $('#id').val(response.user_id)
            $('#nip').val(response.nip)
            $('#nama').val(response.nama)
            $('#tgl_lahir').val(response.tgl_lahir)
            $('#j_kelamin').val(response.j_kelamin)
            $('#no_telepon').val(response.no_telepon)
            $('#jabatan_id').val(response.jabatan_id)
            $('#cabang_id').val(response.cabang_id)
            $('#alamat').val(response.alamat)
            $('#addPegawaiLabel').text('Edit Pegawai')
            $('#save').text('Edit')
            $('#save').attr('id', 'edit')
        }
    });
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