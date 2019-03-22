$(document).ready(function(){

 load_data();

 function load_data()
 {
  $.ajax({
   url:"http://localhost/akutansi/Import/fetch/" ,
   method:"POST",
   success:function(data){
    $('#data_pemasukan').html(data);
   }
  })
 }

 $('#import_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"http://localhost/akutansi/Import/import/" ,
   method:"POST",
   data:new FormData(this),
   contentType:false,
   cache:false,
   processData:false,
   success:function(data){
    $('#file').val('');
    load_data();
    alert(data);
   }
  })
 });

});
