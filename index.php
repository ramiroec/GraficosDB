<?php 
$db = new mysqli('sql.freedb.tech', 'freedb_graficos', 'yZTA2C%!d%pks8R', 'freedb_graficos');
$sql = "select * from Equipos";
$resultado = $db->query($sql); ?>
<script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
<?php 
 while($fila = $resultado->fetch_assoc())
 print "['$fila[Nombre]', $fila[Cantidad]],";
?>
        ]);
        var options = {'title':'De que equipos son en el aula', 'width':500,'height':300};
        var chart = new google.visualization.PieChart(document.getElementById('grafico'));
        chart.draw(data, options);
      }    </script>
  </head>
  <body><div id="grafico"></div>

