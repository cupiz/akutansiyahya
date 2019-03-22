$(function() {
    // =======
    // Project
    // =======

    $('#form_tambah_project').on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            url: base_url + "core/project_tambah",
            method: "POST",
            data: $('#form_tambah_project').serialize(),
            success: function(data) {
                showBSModal({ title: 'Informasi', body: 'Data project berhasil ditambahkan!', onHide: function(e) { location.reload(); } });
            }
        });
    });

    $("body").on("click", ".tblEditProject", function() {
        var id_project = $(this).attr('project-id');

        $.ajax({
            url: base_url + "core/project_lihat/" + id_project,
            method: "POST",
            success: function(data) {
                $('#edit_data_Modal').find('#id_project').val(data.id_project);
                $('#edit_data_Modal').find('#nama_project').val(data.nama_project);
                $('#edit_data_Modal').find('#tanggal_awal').val(data.tanggal_awal);
                $('#edit_data_Modal').find('#tanggal_akhir').val(data.tanggal_akhir);
            }
        });
    });

    $('#form_edit_project').on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            url: base_url + "core/project_edit",
            method: "POST",
            data: $('#form_edit_project').serialize(),
            success: function(data) {
                showBSModal({ title: 'Informasi', body: 'Data project berhasil diedit!', onHide: function(e) { location.reload(); } });
            }
        });
    });

    // ========
    // Karyawan
    // ========

    $('#form_tambah_karyawan').on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            url: base_url + "core/karyawan_tambah",
            method: "POST",
            data: $('#form_tambah_karyawan').serialize(),
            success: function(data) {
                showBSModal({ title: 'Informasi', body: 'Data karyawan berhasil ditambahkan!', onHide: function(e) { location.reload(); } });
            }
        });
    });

    $("body").on("click", ".tblEditKaryawan", function() {
        var id_project = $(this).attr('karyawan-id');

        $.ajax({
            url: base_url + "core/karyawan_lihat/" + id_project,
            method: "POST",
            success: function(data) {
                $('#edit_data_Modal').find('#id_karyawan').val(data.id_karyawan);
                $('#edit_data_Modal').find('#nama_karyawan').val(data.nama_karyawan);
                $('#edit_data_Modal').find('#alamat').val(data.alamat);
                $('#edit_data_Modal').find('#email').val(data.email);
                $('#edit_data_Modal').find('#no_hp').val(data.no_hp);
                $('#edit_data_Modal').find('#kelamin').val(data.kelamin);
            }
        });
    });

    $('#form_edit_karyawan').on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            url: base_url + "core/karyawan_edit",
            method: "POST",
            data: $('#form_edit_karyawan').serialize(),
            success: function(data) {
                showBSModal({ title: 'Informasi', body: 'Data karyawan berhasil diedit!', onHide: function(e) { location.reload(); } });
            }
        });
    });

    // ===========
    // Tim Project
    // ===========

    $("#id_project_dropdown").on("change", function() {
        var id = $(this).val();
        var count = 0;

        $('.chk-group').show();
        $('.chk-label').hide();
        $('.btn-karyawan').attr("disabled", false);

        $.ajax({
            url: base_url + "core/project_get_json_by_id/" + id,
            method: "POST",
            success: function(data) {
                $('.chk-karyawan').each(function() {
                    this.checked = false;
                    this.disabled = false;

                    count++;
                });

                if ($.trim(data)) {
                    for (var i = 0; i < data.length; i++) {
                        $('.karyawan-' + data[i].id_karyawan).prop('checked', true).prop('disabled', true);
                    }
                }

                if (data.length >= count)
                    $('.btn-karyawan').attr("disabled", true);
            }
        });
    });

    $('#form_tim_project').on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            url: base_url + "core/project_set_karyawan",
            method: "POST",
            data: $('#form_tim_project').serialize(),
            success: function(data) {
                showBSModal({ title: 'Informasi', body: data });
            }
        });
    });

    // =======
    // Catatan
    // =======

    $("body").on("click", ".tblTambahCatatan", function() {
        var id_project = $(this).attr('project-id');
        var tzoffset = (new Date()).getTimezoneOffset() * 60000; // Offset in milliseconds
        var localISOTime = (new Date(Date.now() - tzoffset)).toISOString().slice(0, -1);

        $.ajax({
            url: base_url + "core/project_lihat/" + id_project,
            method: "POST",
            success: function(data) {
                $('#add_catatan_Modal').find('#id_project').val(data.id_project);
                $('#add_catatan_Modal').find('#nama_project').val(data.nama_project);
                $('#add_catatan_Modal').find('#waktu').val(localISOTime);
            }
        });
    });

    $('#form_tambah_catatan').on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            url: base_url + "core/project_set_catatan",
            method: "POST",
            data: $('#form_tambah_catatan').serialize(),
            success: function(data) {
                showBSModal({ title: 'Informasi', body: data, onHide: function(e) { location.reload(); } });
            }
        });
    });

    function ajax_load_catatan(id_project) {
        $.ajax({
            url: base_url + "core/project_get_catatan_by_id_project/" + id_project,
            method: "POST",
            success: function(data) {
                let html = '';

                for (var i = 0; i < data.length; i++) {
                    let status = "";
                    if (data[i].status == 0)
                        status = "<a href='" + base_url + "core/project_catatan_konfirmasi/" + data[i].id_project_catatan + "' class='label label-info'>Konfirmasi</a>";
                    // status = "<a data-toggle='modal' data-target='#edit_catatan_Modal' class='label label-warning tblEditCatatan' catatan-id='" + data[i].id_project_catatan + "'><span class='fa fa-pencil'></span> Edit catatan</a>";
                    else
                        status = "<span class='label label-success'>Disetujui</span>";

                    html += '<tr><td>' + (i + 1) + '</td><td>' + (data[i].waktu ? data[i].waktu : "Tidak ada data") + '</td><td>' + data[i].nama_karyawan + '</td><td>' + (data[i].catatan ? data[i].catatan : "Tidak ada data") + '</td><td>' + status + '</td></tr>';
                }

                $('#tbody-catatan').empty();
                $('#table-catatan').append(html);
            }
        });
    }

    $("#id_project_catatan_dropdown_admin").on('change', function(e) {
        var id_project = $(this).val();
        ajax_load_catatan(id_project);
    });

    $("#btn-refresh-catatan").on("click", function(e) {
        var id_project = $("#id_project_catatan_dropdown_admin").val();
        ajax_load_catatan(id_project);
    });

    // ============
    // User Catatan
    // ============

    $("#id_project_catatan_dropdown").on('change', function(e) {
        var id_project = $(this).val();
        var id_karyawan = $('#id_karyawan').val();

        $.ajax({
            url: base_url + "core/project_get_catatan_by_user_project/" + id_karyawan + "/" + id_project,
            method: "POST",
            success: function(data) {
                let html = '';

                for (var i = 0; i < data.length; i++) {
                    let status = "";
                    if (data[i].status == 0)
                        status = "<a data-toggle='modal' data-target='#edit_catatan_Modal' class='label label-warning tblEditCatatan' catatan-id='" + data[i].id_project_catatan + "'><span class='fa fa-pencil'></span> Edit catatan</a>";
                    else
                        status = "<span class='label label-success'>Disetujui</span>";

                    html += '<tr><td>' + (i + 1) + '</td><td>' + (data[i].waktu ? data[i].waktu : "Tidak ada data") + '</td><td>' + (data[i].catatan ? data[i].catatan : "Tidak ada data") + '</td><td>' + status + '</td></tr>';
                }

                $('#tbody-catatan').empty();
                $('#table-catatan').append(html);
            }
        });
    });

    $("body").on("click", ".tblEditCatatan", function() {
        var id_project_catatan = $(this).attr('catatan-id');
        var tzoffset = (new Date()).getTimezoneOffset() * 60000; // Offset in milliseconds
        var localISOTime = (new Date(Date.now() - tzoffset)).toISOString().slice(0, -1);

        $.ajax({
            url: base_url + "core/project_get_catatan_by_id_catatan/" + id_project_catatan,
            method: "POST",
            success: function(data) {
                $('#edit_catatan_Modal').find('#id_project_catatan').val(data.id_project_catatan);
                $('#edit_catatan_Modal').find('#nama_project').val(data.nama_project);
                $('#edit_catatan_Modal').find('#waktu').val(localISOTime);
                $('#edit_catatan_Modal').find('#catatan').val(data.catatan);
            }
        });
    });

    $('#form_edit_catatan').on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            url: base_url + "core/project_catatan_edit",
            method: "POST",
            data: $('#form_edit_catatan').serialize(),
            success: function(data) {
                showBSModal({ title: 'Informasi', body: data, onHide: function(e) { location.reload(); } });
            }
        });
    });

    // ====
    // User
    // ====

    $('#form_tambah_user').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: base_url + "core/user_tambah",
            method: "POST",
            data: $('#form_tambah_user').serialize(),
            success: function(data) {
                showBSModal({ title: 'Informasi', body: "User berhasil ditambahkan", onHide: function(e) { location.reload(); } });
            }
        });
    });

    $("body").on("click", ".tblResetUser", function() {
        var username = $(this).attr('user-id');
        showBSModal({
            title: 'Informasi',
            body: "Apakah Anda ingin mereset password?",
            actions: [{
                label: "Batal",
                cssClass: "btn-default",
                onClick: function(e) {
                    $(e.target).parents('.modal').modal('hide');
                }
            }, {
                label: "Setuju",
                cssClass: "btn-success",
                onClick: function(e) {
                    location.reload();
                }
            }]
        });
    });

    $('#form_ubah_passwords').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: base_url + "core/user_edit",
            method: "POST",
            data: $('#form_ubah_password').serialize(),
            success: function(data) {
                showBSModal({ title: 'Informasi', body: data, onHide: function(e) { location.reload(); } });
            }
        });
    });
});
