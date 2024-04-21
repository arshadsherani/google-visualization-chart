<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sales Chart</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- Styles -->
        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mt-5">
                    <a href="{{ url('/add') }}">Add Sales</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row align-items-start">
                    <div class="col-md-12 text-center mt-5">
                        <h1>Sales Chart</h1>
                        <div id="curve_chart" style="width: 100%; height: 500px"></div>
                    </div>
            </div>
        </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Total Sales', 'Total Quantity Sold', 'Average Quantity Per Sale'],
          @foreach ($salesData as $item)
          ['Month {{$item->SaleMonth}}',  {{$item->TotalSalesCount}}, {{$item->TotalQuantitySold}}, {{$item->AverageQuantityPerSale}}],
          @endforeach
        ]);

        var options = {
          title: 'Sales Chart',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    </body>
</html>
