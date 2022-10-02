
<!DOCTYPE html>
<html><head>

<script src="js/jquery.min.js"></script>

</head>
<body>


</body>
</html>





<?php


if ($_FILES['xml']['name'] == "output.xml"){

    $tmp_name = $_FILES["xml"]["tmp_name"];
    $name = $_FILES["xml"]["name"];
    move_uploaded_file($tmp_name, "../php/$name");

   
    ?>

    <script>window.location.href = "../php/vuln.php";</script>

    <?php


}elseif ($_FILES['xml']['name'] == "output2.xml") {
   
    $tmp_name = $_FILES["xml"]["tmp_name"];
    $name = $_FILES["xml"]["name"];
    move_uploaded_file($tmp_name, "../php/$name");

   
    ?>

    <script>window.location.href = "../php/vuln_cve.php";</script>

    <?php


}elseif ($_FILES['xml']['name'] == "output3.xml") {
    
    $tmp_name = $_FILES["xml"]["tmp_name"];
    $name = $_FILES["xml"]["name"];
    move_uploaded_file($tmp_name, "../php/$name");

   
    ?>

    <script>window.location.href = "../php/hosts.php";</script>

    <?php



}else{

    ?>

<script>alert("La subida no es correcta, porfavor cargue el archivo indicado")</script>
<script>window.location.href = "../form/form.php";</script>
<?php


}











/*echo "Nombre: ".$_FILES['xml']['name']."<br>";
echo "peso: ".$_FILES['xml']['size']."<br>";
echo "tipo: ".$_FILES['xml']['type']."<br>";
echo "tmp: ".$_FILES['xml']['tmp_name']."<br>";*/


?>