<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

    $id = $_SESSION["id"];
    $sql = $pdo->prepare("SELECT monthly_earnings FROM client WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();
    $earning[] = $sql->fetchAll();


echo print_r($earning);

?>



<h1>AAAAAAAAAAAAAAAAAAAAAAA</h1>
    

<div>
    <canvas id="myChart"></canvas>
  </div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
//setup blocko

const earning = <?php echo json_encode($earning)?>

const data = {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: earning,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
    }]
};

//config bllock
const config = {
    type: 'bar',
    data,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
};

//render block
const myChart = new Chart(
    document.getElementById('myChart'),
    config
);
</script>

</body>
</html>





