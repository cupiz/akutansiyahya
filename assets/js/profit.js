$(function () {
  var barProfit = new Morris.Bar({
  element: 'bar-chart-profit',
  behaveLikeLine: true,
  parseTime : false,
  data: [],
  xkey: 'bulan',
  ykeys: ['profit'],
  labels: ['Profit'],
  pointFillColors: ['#707f9b'],
  pointStrokeColors: ['#ffaaab'],
  lineColors: ['#f26c4f', '#00a651', '#00bff3'],
  redraw: true
});


$.ajax({
 url: "http://localhost/akutansi/Laporan/profit",
 data: 0,
 dataType: 'json',
 success: function(data){
     console.log(data);
     barProfit.setData(data);  // Helps to recreate your chart with result data's
 }
});
function print() {
  window.print();
}
});
