<?php 
include("database/connection.php");

// Consulta para el gráfico de barras
$queryBar = $connection->query("
  SELECT 
    DATE_FORMAT(e.fechaIngreso, '%Y-%m') as month,
    SUM(e.costo) as total_cost,
    COUNT(*) as quantity
  FROM equipos e
  GROUP BY month
");

foreach($queryBar as $data)
{
  $months[] = $data['month'];
  $totalCost[] = $data['total_cost'];
  $quantity[] = $data['quantity'];
}

// Consulta para el gráfico de torta con relación a la tabla 'marca'
$queryPieMarca = $connection->query("
  SELECT 
    m.marca,
    COUNT(*) as cantidad,
    SUM(e.costo) as total_cost_pie
  FROM equipos e
  JOIN marcas m ON e.marca_id = m.id
  GROUP BY m.marca
");

foreach($queryPieMarca as $data)
{
  $marcas[] = $data['marca'];
  $cantidadMarca[] = $data['cantidad'];
  $totalCostPieMarca[] = $data['total_cost_pie'];
}

// Consulta para el gráfico de área polar con relación a la tabla 'tipo'
$queryPolarAreaTipo = $connection->query("
  SELECT 
    t.tipo,
    COUNT(*) as cantidad
  FROM equipos e
  JOIN tipo t ON e.tipo_id = t.id
  GROUP BY t.tipo
");

foreach($queryPolarAreaTipo as $data)
{
  $tipos[] = $data['tipo'];
  $cantidadTipo[] = $data['cantidad'];
}

$queryHorizontalBar = $connection->query("
  SELECT 
    f.nombre as funcionario,
    SUM(e.costo) as total_cost
  FROM equipos e
  JOIN funcionarios f ON e.funcionario_id = f.id
  GROUP BY f.nombre
");

foreach($queryHorizontalBar as $data)
{
  $funcionarios[] = $data['funcionario'];
  $totalCostFuncionario[] = $data['total_cost'];
}


$queryPolarAreaIngreso = $connection->query("
  SELECT 
    f.formaIngreso,
    COUNT(*) as cantidad
  FROM equipos e
  JOIN formaIngresos f ON e.formaIngreso_id = f.id
  GROUP BY f.formaIngreso
");

foreach($queryPolarAreaIngreso as $data)
{
  $formaIngresos[] = $data['formaIngreso'];
  $cantidadFormaIngreso[] = $data['cantidad'];
}

// Función para generar una paleta de colores única
function generarPaletaColores($cantidad)
{
  $colores = [];
  for ($i = 0; $i < $cantidad; $i++) {
    // Genera colores aleatorios en formato rgba
    $colores[] = 'rgba(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ', 0.2)';
  }
  return $colores;
}

// Obtener una paleta de colores única para cada barra
$coloresBarras = generarPaletaColores(count($funcionarios));

?>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 ">
      

      <div style="width: 100%;">
         <canvas id="myDoughnutChartTipo"></canvas>
      </div>


    </div>

    <div class="col-lg-4">


      <div style="width: 100%; ">
        <canvas id="myPieChartMarca"></canvas>
      </div>
      </div>
    <div class="col-lg-4">
        <div style="width: 100%; ">
            <canvas id="myDoughnutChartTipo2"></canvas>
    </div>
</div>


    </div>

  
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 text-center">
    <div style="width: 80%;" >
  <canvas id="myChart"></canvas>
</div>
    </div>
  </div>
</div>


<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 text-center">
    <div style="width: 80%; ">
  <canvas id="myHorizontalBarChart"></canvas>
</div>
    </div>
  </div>
</div>






<script>
  // Configuración para el gráfico de barras
  const labelsBar = <?php echo json_encode($months) ?>;
  const dataBar = {
    labels: labelsBar,
    datasets: [{
      label: 'Costos por mes',
      data: <?php echo json_encode($totalCost) ?>,
      backgroundColor: <?php echo json_encode($coloresBarras) ?>,
      borderColor: 'rgb(75, 192, 192)',
      borderWidth: 1
    }]
  };

  const configBar = {
    type: 'bar',
    data: dataBar,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins: {
        tooltip: {
          callbacks: {
            label: function(context) {
              var index = context.dataIndex;
              var cost = <?php echo json_encode($totalCost) ?>[index];
              var quantity = <?php echo json_encode($quantity) ?>[index];

              return 'Costo: ' + cost + ', Cantidad: ' + quantity;
            }
          }
        }
      }
    }
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    configBar
  );

  // Configuración para el primer gráfico de torta (por marca)
  const labelsPieMarca = <?php echo json_encode($marcas) ?>;
  const dataPieMarca = {
    labels: labelsPieMarca,
    datasets: [{
      data: <?php echo json_encode($cantidadMarca) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const configPieMarca = {
    type: 'pie',
    data: dataPieMarca,
    options: {
      plugins: {
        datalabels: {
          color: '#fff',
          formatter: (value, context) => {
            var index = context.dataIndex;
            var totalCostPie = <?php echo json_encode($totalCostPieMarca) ?>[index];
            var quantity = <?php echo json_encode($cantidadMarca) ?>[index];

            return 'Costo total: ' + totalCostPie + ', Cantidad: ' + quantity;
          },
          anchor: 'end',
          align: 'start',
          offset: 10
        }
      }
    }
  };

  var myPieChartMarca = new Chart(
    document.getElementById('myPieChartMarca'),
    configPieMarca
  );

  const labelsDoughnutTipo = <?php echo json_encode($tipos) ?>;
const dataDoughnutTipo = {
  labels: labelsDoughnutTipo,
  datasets: [{
    data: <?php echo json_encode($cantidadTipo) ?>,
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};

const configDoughnutTipo = {
  type: 'doughnut',
  data: dataDoughnutTipo,
  options: {
    plugins: {
      datalabels: {
        color: '#fff',
        formatter: (value, context) => {
          var index = context.dataIndex;
          var quantity = <?php echo json_encode($cantidadTipo) ?>[index];

          return 'Cantidad: ' + quantity;
        },
        anchor: 'end',
        align: 'start',
        offset: 10
      }
    }
  }
};

var myDoughnutChartTipo = new Chart(
  document.getElementById('myDoughnutChartTipo'),
  configDoughnutTipo
);


// Configuración para el gráfico de barras horizontales
const labelsHorizontalBar = <?php echo json_encode($funcionarios) ?>;
const dataHorizontalBar = {
  labels: labelsHorizontalBar,
  datasets: [{
    label: 'Costo por funcionario',
    data: <?php echo json_encode($totalCostFuncionario) ?>,
    backgroundColor: <?php echo json_encode($coloresBarras) ?>, // Utiliza los colores generados
    borderColor: 'rgb(75, 192, 192)',
    borderWidth: 1
  }]
};

const configHorizontalBar = {
  type: 'bar',
  data: dataHorizontalBar,
  options: {
    indexAxis: 'y',
    scales: {
      x: {
        beginAtZero: true
      }
    }
  }
};

var myHorizontalBarChart = new Chart(
  document.getElementById('myHorizontalBarChart'),
  configHorizontalBar
);





const labelsDoughnutTipo2 = <?php echo json_encode($formaIngresos) ?>;
const dataDoughnutTipo2 = {
  labels: labelsDoughnutTipo2,
  datasets: [{
    data: <?php echo json_encode($cantidadFormaIngreso) ?>,
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};

const configDoughnutTipo2 = {
  type: 'doughnut',
  data: dataDoughnutTipo2,
  options: {
    plugins: {
      datalabels: {
        color: '#fff',
        formatter: (value, context) => {
          var index = context.dataIndex;
          var quantity = <?php echo json_encode($cantidadFormaIngreso) ?>[index];

          return 'Cantidad: ' + quantity;
        },
        anchor: 'end',
        align: 'start',
        offset: 10
      }
    }
  }
};

var myDoughnutChartTipo2 = new Chart(
  document.getElementById('myDoughnutChartTipo2'),
  configDoughnutTipo2
);

</script>