$('#addPegawaiModal').on('shown.bs.modal', function () {
    $(this).find('[autofocus]').focus();
    $('#addPegawaiModal').find('.form-control').removeClass('is-invalid');
    $('#addPegawaiModal').find('.invalid-feedback').hide();
});

$(document).on('click', '#addPegawai', function () {
    $('#addPegawaiLabel').text('Pendaftaran Pegawai')
    $('#addPegawaiModal').find('input').val('');
    $('#addPegawaiModal').find('select').val('');
    $('#edit').attr('id', 'save')
    $('#save').text('Daftar')
});

$(document).on('click', '#save', function (e) {
    e.preventDefault();
    $.ajax({
        url: 'pegawai',
        type: 'POST',
        data: {
            name: $('#name').val(),
            rarity: $('#rarity').val(),
            birthday: $('#birthday').val(),
            constellation: $('#constellation').val(),
            weapon: $('#weapon').val(),
            vision: $('#vision').val(),
            region: $('#region').val()
        },
        success: function (response) {
            if (response.status == 400) {
                $('#addCharModal').find('.invalid-feedback').show();
                if (response.errors['name'] == undefined) {
                    $('#name').removeClass('is-invalid');
                    $('#name-feedback').hide();
                } else {
                    $('#name-feedback').text(response.errors['name']);
                    $('#name').addClass('is-invalid');
                }
                if (response.errors['rarity'] == undefined) {
                    $('#rarity').removeClass('is-invalid');
                    $('#rarity-feedback').hide();
                } else {
                    $('#rarity-feedback').text(response.errors['rarity']);
                    $('#rarity').addClass('is-invalid');
                }
                if (response.errors['weapon'] == undefined) {
                    $('#weapon').removeClass('is-invalid');
                    $('#weapon-feedback').hide();
                } else {
                    $('#weapon-feedback').text(response.errors['weapon']);
                    $('#weapon').addClass('is-invalid');
                }
                if (response.errors['vision'] == undefined) {
                    $('#vision').removeClass('is-invalid');
                    $('#vision-feedback').hide();
                } else {
                    $('#vision-feedback').text(response.errors['vision']);
                    $('#vision').addClass('is-invalid');
                }
                if (response.errors['birthday'] == undefined) {
                    $('#birthday').removeClass('is-invalid');
                    $('#birthday-feedback').hide();
                } else {
                    $('#birthday-feedback').text(response.errors['birthday']);
                    $('#birthday').addClass('is-invalid');
                }
                if (response.errors['constellation'] == undefined) {
                    $('#constellation').removeClass('is-invalid');
                    $('#constellation-feedback').hide();
                } else {
                    $('#constellation-feedback').text(response.errors['constellation']);
                    $('#constellation').addClass('is-invalid');
                }
                if (response.errors['region'] == undefined) {
                    $('#region').removeClass('is-invalid');
                    $('#region-feedback').hide();
                } else {
                    $('#region-feedback').text(response.errors['region']);
                    $('#region').addClass('is-invalid');
                }
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    timer: 1500,
                    showConfirmButton: false,
                });
                $('#addCharModal').find('.form-control').val('');
                $('#addCharModal').find('.form-control').removeClass('is-invalid');
                $('#addCharModal').find('.invalid-feedback').hide();
                $('#addCharModal').modal('hide');
                table.ajax.reload();
            }
        }
    });
});

// $(document).on('click', '#edit', function (e) {
//     e.preventDefault();
//     let id = $('#id').val()
//     $.ajax({
//         url: 'charAjax/' + id,
//         type: 'PUT',
//         data: {
//             id: id,
//             name: $('#name').val(),
//             rarity: $('#rarity').val(),
//             birthday: $('#birthday').val(),
//             constellation: $('#constellation').val(),
//             weapon: $('#weapon').val(),
//             vision: $('#vision').val(),
//             region: $('#region').val()
//         },
//         success: function (response) {
//             if (response.status == 400) {
//                 $('#addCharModal').find('.invalid-feedback').show();
//                 if (response.errors['name'] == undefined) {
//                     $('#name').removeClass('is-invalid');
//                     $('#name-feedback').hide();
//                 } else {
//                     $('#name-feedback').text(response.errors['name']);
//                     $('#name').addClass('is-invalid');
//                 }
//                 if (response.errors['rarity'] == undefined) {
//                     $('#rarity').removeClass('is-invalid');
//                     $('#rarity-feedback').hide();
//                 } else {
//                     $('#rarity-feedback').text(response.errors['rarity']);
//                     $('#rarity').addClass('is-invalid');
//                 }
//                 if (response.errors['weapon'] == undefined) {
//                     $('#weapon').removeClass('is-invalid');
//                     $('#weapon-feedback').hide();
//                 } else {
//                     $('#weapon-feedback').text(response.errors['weapon']);
//                     $('#weapon').addClass('is-invalid');
//                 }
//                 if (response.errors['vision'] == undefined) {
//                     $('#vision').removeClass('is-invalid');
//                     $('#vision-feedback').hide();
//                 } else {
//                     $('#vision-feedback').text(response.errors['vision']);
//                     $('#vision').addClass('is-invalid');
//                 }
//                 if (response.errors['birthday'] == undefined) {
//                     $('#birthday').removeClass('is-invalid');
//                     $('#birthday-feedback').hide();
//                 } else {
//                     $('#birthday-feedback').text(response.errors['birthday']);
//                     $('#birthday').addClass('is-invalid');
//                 }
//                 if (response.errors['constellation'] == undefined) {
//                     $('#constellation').removeClass('is-invalid');
//                     $('#constellation-feedback').hide();
//                 } else {
//                     $('#constellation-feedback').text(response.errors['constellation']);
//                     $('#constellation').addClass('is-invalid');
//                 }
//                 if (response.errors['region'] == undefined) {
//                     $('#region').removeClass('is-invalid');
//                     $('#region-feedback').hide();
//                 } else {
//                     $('#region-feedback').text(response.errors['region']);
//                     $('#region').addClass('is-invalid');
//                 }
//             } else {
//                 Swal.fire({
//                     icon: 'success',
//                     title: 'Success',
//                     text: response.message,
//                     timer: 1500,
//                     showConfirmButton: false,
//                 });
//                 $('#addCharModal').find('.form-control').val('');
//                 $('#addCharModal').find('.form-control').removeClass('is-invalid');
//                 $('#addCharModal').find('.invalid-feedback').hide();
//                 $('#addCharModal').modal('hide');
//                 table.ajax.reload();
//             }
//         }
//     });
// });

// function editForm(url) {
//     $.ajax({
//         type: "GET",
//         url: url,
//         dataType: "json",
//         success: function (response) {
//             $('#id').val(response.id)
//             $('#name').val(response.name)
//             $('#rarity').val(response.rarity)
//             $('#rarity').trigger('change')
//             $('#weapon').val(response.weapon)
//             $('#weapon').trigger('change')
//             $('#vision').val(response.vision)
//             $('#vision').trigger('change')
//             $('#birthday').val(response.birthday)
//             $('#constellation').val(response.constellation)
//             $('#region').val(response.region)
//             $('#addCharModalLabel').text('Edit Character')
//             $('#save').text('Edit')
//             $('#save').attr('id', 'edit')
//         }
//     });
// }
// function deleteChar(url) {
//     Swal.fire({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, delete it!'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 type: "DELETE",
//                 url: url,
//                 dataType: "json",
//                 success: function (response) {
//                     Swal.fire({
//                         icon: 'success',
//                         title: 'Success',
//                         text: response.message,
//                         timer: 1500,
//                         showConfirmButton: false,
//                     });
//                 }
//             })
//         }
//         table.ajax.reload();

//     })
// }