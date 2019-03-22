$(document).ready(function() {
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
        },
        editable: true,
        eventLimit: true,
        eventSources: [{
            color: '#3C8DBC',
            textColor: '#FFF',
            events: function(start, end, timezone, callback) {
                $.ajax({
                    url: base_url + 'core/project_get_json',
                    dataType: 'json',
                    data: {
                        start: start.unix(),
                        end: end.unix()
                    },
                    success: function(msg) {
                        var events = msg.events;
                        callback(events);
                    }
                });
            }
        }],
        eventClick: function(calEvent, jsEvent, view) {
            $('#projectModalTitle').html(calEvent.title);
            $('#projectModalMulai').html(moment(calEvent.start).format('D MMM Y'));
            $('#projectModalAkhir').html(moment(calEvent.end).format('D MMM Y'));
            projectStatus(calEvent.status);

            // Load data karyawan
            $.ajax({
                    url: base_url + 'core/project_get_json_by_id/' + calEvent.id,
                    type: 'POST',
                    dataType: 'json'
                })
                .done(function(data) {
                    $('#data-karyawan').html('');
                    $('.btn-lihat-catatan').addClass("btn-disabled");
                    $('.btn-lihat-catatan').prop("disabled", true);
                    $(".btn-lihat-catatan").attr("onclick", "noCatatan()");

                    if ($.trim(data)) {
                        for (var i = 0; i < data.length; i++) {
                            $content = "<tr>";
                            $content += "<td>" + data[i].nama_karyawan + "</td>";
                            $content += "</tr>";

                            $('#data-karyawan').append($content);

                            $(".btn-lihat-catatan").attr("onclick", "window.location.href=\'" + base_url + "admin/catatan/" + data[i].id_project + "\'");
                            $('.btn-lihat-catatan').removeClass("btn-disabled");
                            $('.btn-lihat-catatan').prop("disabled", false);
                        }
                    } else {
                        $content = "<tr><td>Tidak ada data</td></tr>";
                        $('#data-karyawan').append($content);
                    }
                });

            //Tamplikan
            $('#projectModal').modal();
        }
    });

    $('#password, #password2').on('keyup', function() {
        if ($('#password').val() != $('#password2').val()) {
            $('#pw1').addClass('has-error');
            $('#pw1').removeClass('has-success');

            $('#pw2').addClass('has-error');
            $('#pw2').removeClass('has-success');

            $('.help-block').text('Password tidak sesuai!');
        } else if (!$('#password').val() || !$('#password2').val()) {
            $('#pw1').addClass('has-error');
            $('#pw1').removeClass('has-success');

            $('#pw2').addClass('has-error');
            $('#pw2').removeClass('has-success');

            $('.help-block').text('Password tidak boleh kosong!');
        } else {
            $('#pw1').addClass('has-success');
            $('#pw1').removeClass('has-error');

            $('#pw2').addClass('has-success');
            $('#pw2').removeClass('has-error');

            $('.help-block').text('');
        }
    });

    $('.tabel_data').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false,
        'lengthMenu': [
            [5, 10, 20, 50, -1],
            [5, 10, 20, 50, "All"]
        ]
    });
});

function projectStatus($id_status) {
    var view = $('#projectModalStatus');
    view.removeClass();

    if ($id_status == 1) {
        view.html("Selesai");
        view.addClass("label label-success");
    } else if ($id_status == 2) {
        view.html("Diproses");
        view.addClass("label label-primary");
    } else if ($id_status == 3) {
        view.html("Ditolak");
        view.addClass("label label-danger");
    }
}

function noCatatan() {
    showBSModal({ title: 'Informasi', body: 'Tidak ada catatan untuk project ini!' });
}