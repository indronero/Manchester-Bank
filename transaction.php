<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="customers.css">
    <title>TRANSACTION</title>
</head>
<body>
<header class="site-header clearfix">
        <nav>
        <div class="manu"><img src="images/manchester-united.png"></div>
            <div class="logo">
                <h1>MANCHESTER BANK</h1>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="customers.php">CUSTOMERS</a></li>
                    <li class="active"><a href="#">TRANSACTIONS</a></li>
                </ul>
            </div>
        </nav>
<div class="main-div">
    <h1>TRANSACTION HISTORY</h1>

    <div class="center-div">
        <div class="table-responsive">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Transaction No.</th>
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Amount Transferred</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    include 'connection.php';
                    
                    $selectquery = "select * from transactions";
                    
                    $query = mysqli_query($conn,$selectquery);
                    
                    $nums = mysqli_num_rows($query);
                    
                    while($res = mysqli_fetch_array($query)){
                ?>

                        <tr>
                            <td><?php echo $res['id'] ?></td>
                            <td><?php echo $res['sender'] ?></td>
                            <td><?php echo $res['receiver'] ?></td>
                            <td><?php echo $res['amount'] ?></td>
                        </tr>

                <?php
                    }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
</header>

</body>
</html>