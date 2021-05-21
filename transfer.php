<?php
include 'connection.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from customers where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    }


  
    
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance in your account")'; 
        echo '</script>';
    }
    


   
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE customers set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE customers set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
 
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                
                $sql = "INSERT INTO transactions (`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
                $query = mysqli_query($conn,$sql);

                if($query){
                    echo "<script> alert('Transaction Successful');
                                     window.location='transaction.php';
                           </script>";
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="transfer.css">
    <title>TRANSFER</title>
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
                    <li class="active"><a href="transfer.php">TRANSFER MONEY</a></li>
                </ul>
            </div>
        </nav>

	<div class="main-div">
        <h1 class="name">Sender's Details</h1>
            <?php
                include 'connection.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  customers where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
            <div class="card">
  <img src="images/soccer-player.png" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b><?php echo $rows['name'] ?></b></h4>
    <p>ID: <?php echo $rows['id'] ?></p>
    <p>Email ID: <?php echo $rows['email'] ?></p>
    <p>Phone Number: <?php echo $rows['phonenumber'] ?></p>
    <p>Gender: <?php echo $rows['gender'] ?></p>
    <p>Age: <?php echo $rows['age'] ?></p>
    <p>Balance: <?php echo $rows['balance'] ?></p>
    <p>
  </div>
</div>
    <div class="transfer">
        <label>Transfer To</label>
        <br>
        <br>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'connection.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM customers where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label>Enter Amount</label>
            <br>
            <br>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
            <button name="submit" type="submit" id="myBtn">Transfer</button>
        </form>
            </div>
    
</header>
</body>
</html>