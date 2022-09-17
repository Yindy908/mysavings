<?php
require 'config.php';

if(!isset($_SESSION['id'])){
    header('location: login.php');
    exit;
}else{
    echo $_SESSION['id'];
}

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $sql = $pdo->prepare("SELECT monthly_earnings, monthly_spending FROM client WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();
    $revenue = $sql->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><a href="logout.php">exit</a></h1>

    <h2><a href="new_savings.php">adicionar ganhos</a></h2>
    <h2><a href="new_spending.php">adicionar gastos</a></h2>
    <h2>seus fundos<h2>
    <?php
        foreach($revenue as $revenues);
    ?>
    <table border="1" width="900px">
        <tr>
            <td><?php echo $revenues['monthly_earnings'] ?></td>
            <td><?php echo $revenues['monthly_spending'] ?></td>
        </tr>
    </table>
    





    <?php
    $newSql = "SELECT * from client WHERE id = $id";
    $result = $pdo->query($newSql);
    if($result->rowCount()>0) {

        $earning = array();
        $spending = array();

        while($row = $result->fetch()){
            $earning[] = $row["monthly_earnings"];
            $spending[] =$row["monthly_spending"];
        }
    }

    

    ?>


<div>
    <canvas id="myChart"></canvas>
  </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
//setup blocko

const earning = <?php echo json_encode($earning);?>;
const spending = <?php echo json_encode($spending);?>;

const data = {
    labels: ['janero', 'janero2', 'janero3', 'fereveiro', 'sabado'],
        datasets: [{
            label: 'deneros',
            data: earning,
            backgroundColor: 'rgba(153, 102, 255, 0.2)',
            borderColor: 'rgba(153, 102, 255, 1)',
            borderWidth: 1
    },{
            label: 'gastos',
            data: spending,
            backgroundColor: 'rgba(1, 102, 255, 0.2)',
            borderColor: 'rgba(1, 102, 255, 1)',
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