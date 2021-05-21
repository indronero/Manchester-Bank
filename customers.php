<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="customers.css">
    <title>CUSTOMERS</title>
</head>
<body>
<header class="site-header">
        <nav>
        <div class="manu"><img src="images/manchester-united.png"></div>
            <div class="logo">
                <h1>MANCHESTER BANK</h1>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li class="active"><a href="customers.php">CUSTOMERS</a></li>
                    <li><a href="transaction.php">TRANSACTIONS</a></li>
                </ul>
            </div>
        </nav>
<div class="main-div">
    <h1>CUSTOMERS</h1>

    <div class="center-div">
        <div class="table-responsive">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email-Id</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Current Balance</th>
                        <th>Transaction</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    include 'connection.php';
                    
                    $selectquery = "select * from customers";
                    
                    $query = mysqli_query($conn,$selectquery);
                    
                    $nums = mysqli_num_rows($query);
                    
                    while($res = mysqli_fetch_array($query)){
                ?>

                        <tr>
                            <td><?php echo $res['id'] ?></td>
                            <td><?php echo $res['name'] ?></td>
                            <td><?php echo $res['email'] ?></td>
                            <td><?php echo $res['phonenumber'] ?></td>
                            <td><?php echo $res['gender'] ?></td>
                            <td><?php echo $res['age'] ?></td>
                            <td><?php echo $res['balance'] ?></td>
                            <td><a href="transfer.php?id=<?php echo $res['id'] ;?>"><button type="button" class="btn">Transfer</button></a></td>
                        </tr>

                <?php
                    }
                ?>
                </tbody>
            </table>
            <br>
            <br>
        </div>
    </div>
</div>
</header>

</body>
</html>