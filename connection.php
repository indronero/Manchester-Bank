<?php

$username = "id16857186_sparks_bank";
$password = "Doctorwho@1963";
$server = 'localhost';
$db = 'id16857186_manchester_bank';

$conn = mysqli_connect($server,$username,$password,$db);

if($conn){
    ?>

    <!-- <script>
        alert('Connection Successful');
    </script> -->

    <?php
}else{
    die("no connection" . mysqli_connect_error());
}
?>