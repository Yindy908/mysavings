<br><hr>
<?php
require 'login_submit.php';

if(!isset($_SESSION['id'])){
    header('location: login.php');
    exit;
}else{
    echo $_SESSION['id'];
}

?>


<h1>adicionar ganhos</h1>

<form action="new_savings_submit.php" method="POST">
    <label>escreva seus novos ganhos</label><br>
    <input type="text" name="earning" required="required"><br>
    <label>escreva seus novos gastos</label><br>
    <input type="text" name="spending" required="required"><br>
    <input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
    <input type="submit" value="Salvar">
</form>