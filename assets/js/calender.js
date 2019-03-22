$(function() {
  $('#calendar').fullCalendar({
    header: {
      left: 'prev, next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
    },
    editable: true,
    eventLimit: true,
    events: function (start, end, timezone, callback) {
        $.ajax({
          url: 'http://localhost/akutansi/Home/json',
          dataType: 'json',
          data: {
            start: start.unix(),
            end: end.unix()
          },
          error: function (xhr, type, exception) {
            alert("Error: " + exception);
          },
          success: function (msg) {
            console.log(msg);
            var events = msg.events;
            callback(events);
          }
        });
      },
      eventClick: function(calEvent, jsEvent, view) {
        $('#flowmodalTittle').html(calEvent.title);
        $.ajax({
            url: "http://localhost/akutansi/Main/json_calender/" + calEvent.id,
            method: "POST",
            success: function(data) {
              data = JSON.parse(data);
              $('#flowtModaljumlah').text(data.jumlah);
              $('#flowtModaljenis').text(data.jenis);
              $('#flowtModalpengirim').text(data.penerima);
              $('#flowtModaldeskripsi').text(data.deskripsi);
              }
          });
          $('#flowModal').modal();
        }

  });
});
