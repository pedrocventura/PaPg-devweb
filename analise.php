<?php 

$file = $_FILES["file"];
$data = file_get_contents($file["tmp_name"]);
$data = json_decode($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafico</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Elemento', 'Valor'],
                <?php foreach($data as $key=>$item){
                    $key++;
                    echo "['$key', $item],\n";
                }
                ?>
            ]);

            var options = {
                title: 'Progressão',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>
<div id="curve_chart" style="width: 900px; height: 500px"></div>

<button><a href="index.php">Retornar pra pagina inicial</a> </button>
</body>

</html>