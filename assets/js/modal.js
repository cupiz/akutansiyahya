console.log('hello');

function zeroPad(num, places) {
  var zero = places - num.toString().length + 1;
  return Array(+(zero > 0 && zero)).join("0") + num;
}
// Update Function
// Update Revenue
$(function () {

  $("body").on("click", ".btneditpemasukan", function() {
    var id_pemasukan = $(this).attr('data-id');
    $.ajax({
          url: "http://localhost/akutansi/Main/json_pemasukan/" + id_pemasukan,
          method: "POST",
          success: function(data) {
            data = JSON.parse(data);
            $('#update-pemasukan').find('#id').val(data.id);
            $('#update-pemasukan').find('#tanggal').val(data.tanggal);
            $('#update-pemasukan').find('#jumlah').val(data.jumlah);
            $('#update-pemasukan').find('#jenis_pemasukan').val(data.jenis_pemasukan);
            $('#update-pemasukan').find('#penerima').val(data.penerima);
            $('#update-pemasukan').find('#deskripsi').text(data.deskripsi);
            }
        });
    });

  // Update Expense
  $("body").on("click", ".btneditpengeluaran", function() {
    var id_pengeluaran = $(this).attr('data-id');
    $.ajax({
          url: "http://localhost/akutansi/Main/json_pengeluaran/" + id_pengeluaran,
          method: "POST",
          success: function(data) {
            data = JSON.parse(data);
            $('#update-pengeluaran').find('#id_beban').val(data.id);
            $('#update-pengeluaran').find('#tanggal').val(data.tanggal);
            $('#update-pengeluaran').find('#jumlah').val(data.jumlah);
            $('#update-pengeluaran').find('#jenis_beban').val(data.jenis_beban);
            $('#update-pengeluaran').find('#penerima').val(data.penerima);
            $('#update-pengeluaran').find('#deskripsi').text(data.deskripsi);
            }
        });
      });

    //Update Crevenue
    $("body").on("click", ".btneditjenispemasukan", function() {
      var id_jenis_pemasukan = $(this).attr('data-id');
      $.ajax({
          url: "http://localhost/akutansi/Main/json_jenis_pemasukan/" + id_jenis_pemasukan,
          method: "POST",
          success: function(data) {
            data = JSON.parse(data);
            $('#update-Crevenue').find('#id_jenis').val(data.id);
            $('#update-Crevenue').find('#jenis_pemasukan').val(data.jenis_pemasukan);
            }
        });
      });

      //Update Cexpense
      $("body").on("click", ".btneditjenispengeluaran", function() {
        var id_jenis_pengeluaran = $(this).attr('data-id');
        console.log(id_jenis_pengeluaran);
        $.ajax({
              url: "http://localhost/akutansi/Main/json_jenis_pengeluaran/" + id_jenis_pengeluaran,
              method: "POST",
              success: function(data) {
                data = JSON.parse(data);
                $('#update-Cexpense').find('#id_jenis').val(data.id);
                $('#update-Cexpense').find('#jenis_pengeluaran').val(data.jenis_beban);
                }
            });
          });

  //Delete Function
  //Delete Revenue
  $("body").on("click", ".btndelpemasukan", function() {
    var id_pemasukan = $(this).attr('data-id');
    var url = "http://localhost/akutansi/Main/delete_revenue/" + id_pemasukan;
    $('.btndelpemasukanmodal').attr("href", url);
      });

    //Delete Expense
    $("body").on("click", ".btndelpengeluaran", function() {
      var id_pengeluaran = $(this).attr('data-id');
      var url = "http://localhost/akutansi/Main/delete_expense/" + id_pengeluaran;
      $('.btndelpengeluaranmodal').attr("href", url);
        });

    //delete Crevenue
    $("body").on("click", ".btndeljenispemasukan", function() {
      var id_jenis_pemasukan = $(this).attr('data-id');
      var url = "http://localhost/akutansi/Main/delete_jenis_revenue/" + id_jenis_pemasukan;
      $('.btndeljenispemasukanmodal').attr("href", url);
            });

   //delete Cexpense
   $("body").on("click", ".btndeljenispengeluaran", function() {
     var id_jenis_pengeluaran = $(this).attr('data-id');
     var url = "http://localhost/akutansi/Main/delete_jenis_expense/" + id_jenis_pengeluaran;
     $('.btndeljenispengeluaranmodal').attr("href", url);
           });

   //delete User
   $("body").on("click", ".btnDeleteUser", function() {
     var id_user = $(this).attr('data-id');
     var url = "http://localhost/akutansi/Main/user_hapus/" + id_user;
     $('.btnDeleteUsermodal').attr("href", url);
        });

   //reset password
   $("body").on("click", ".tblResetUser", function() {
    var id_reset = $(this).attr('user-id');
    var url = "http://localhost/akutansi/Main/user_reset/" + id_reset;
             $('.btnresetnmodal').attr("href", url);
           });

    //Profile
    //ubah Profil
      $("body").on("click", ".tblUbahProfil", function() {
        var id_karyawan = $(this).attr('profil-id');
          $.ajax({
                url: "http://localhost/akutansi/Main/get_profil/" +id_karyawan,
                method: "POST",
                success: function(data) {
                  data = JSON.parse(data);
                  $('#update-profil').find('#id').val(data.id);
                  $('#update-profil').find('#nama').val(data.nama);
                  $('#update-profil').find('#alamat').val(data.alamat);
                  $('#update-profil').find('#email').val(data.email);
                  $('#update-profil').find('#nomor').val(data.nomor);
                  }
              });
            });

  //BAR CHART
  var bar = new Morris.Bar({
    element: 'bar-chart',
    behaveLikeLine: true,
    parseTime : false,
    data: [],
    xkey: 'bulan',
    ykeys: ['total_pemasukan', 'total_pengeluaran'],
    labels: ['Pemasukan', 'Pengeluaran'],
    pointFillColors: ['#707f9b'],
    pointStrokeColors: ['#ffaaab'],
    lineColors: ['#f26c4f', '#00a651', '#00bff3'],
    redraw: true
  });

  $.ajax({
     url: "http://localhost/akutansi/Laporan/json",
     data: 0,
     dataType: 'json',
     success: function(data){
        console.log('bar chart')
         console.table(data);
         bar.setData(data);  // Helps to recreate your chart with result data's
         ajaxProfit();
     }
   });

   let d = new Date();
   let bulan = zeroPad(Number(d.getMonth())+1, 2);
   let tahun = d.getFullYear();

   $.ajax({
      url: "http://localhost/akutansi/Main/revenue/" + tahun + "/"+bulan,
      success: function(data) {
        console.log('test 123');
        // donut1.setData(data);
        Morris.Donut({
          element: 'pie-chart',
          data: data,
          backgroundColor: '#ccc',
          labelColor: '#060',
          colors: [
            '#5998ff',
            '#10ed8e',
            '#fcae11',
            '#f7db04'
         ],
          resize: true
        });
      }
    });

  $('#dropdownbulan').change(function(){
    let d = new Date();
    let bulan = zeroPad($(this).val(), 2);
    let tahun = d.getFullYear();

    $('#pie-chart').empty();

    $.ajax({
       url: "http://localhost/akutansi/Main/revenue/" + tahun + "/"+bulan,
       success: function(data) {
         Morris.Donut({
           element: 'pie-chart',
           data: data,
           backgroundColor: '#ccc',
           labelColor: '#060',
           colors: [
             '#5998ff',
             '#10ed8e',
             '#fcae11',
             '#f7db04'
          ],
           resize: true
         });
       }
     });
  });

  let d2 = new Date();
  let bulan2 = zeroPad(Number(d2.getMonth())+1, 2);
  let tahun2 = d2.getFullYear();

  $.ajax({
     url: "http://localhost/akutansi/Main/expense/" + tahun2 + "/"+bulan2,
     success: function(data) {
       console.log('test 123');
       // donut1.setData(data);
       Morris.Donut({
         element: 'pie-chart2',
         data: data,
         backgroundColor: '#ccc',
         labelColor: '#060',
         colors: [
           '#5998ff',
           '#10ed8e',
           '#fcae11',
           '#f7db04'
        ],
         resize: true
       });
     }
   });

  $('#dropdownbulan2').change(function(){
    let d = new Date();
    let bulan = zeroPad($(this).val(), 2);
    let tahun = d.getFullYear();

    $('#pie-chart2').empty();
    $.ajax({
       url: "http://localhost/akutansi/Main/expense/" + tahun + "/"+bulan,
       success: function(data) {
         Morris.Donut({
           element: 'pie-chart2',
           data: data,
           backgroundColor: '#ccc',
           labelColor: '#060',
           colors: [
             '#5998ff',
             '#10ed8e',
             '#fcae11',
             '#f7db04'
          ],
           resize: true
         });
       }
     });
  });

  $('#import-file').change(function(){
    $.ajax({
       url: "http://localhost/akutansi/Main/import_pemasukan",
       success: function(data) {
       }
     });
  });

});
