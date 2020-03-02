<!DOCTYPE html>

<?php

//Starting the session
session_start();
$error="";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
//Check for empty values    
if(!empty($_POST["firstname"]) && !empty($_POST["lastname"]))
{

require ('mysqli_connect.php');
$firstname=mysqli_real_escape_string($dbc, $_POST['firstname']);    
$lastname=mysqli_real_escape_string($dbc, $_POST['lastname']);
    echo $_SESSION["Book_Id"];
    echo $_SESSION["Quantity"];
    echo $_SESSION["Quantity"];
   
if(isset($_SESSION["Book_Id"])&&isset($_SESSION["Quantity"]))
{
$Book_Id=$_SESSION["Book_Id"];
$Quantity=($_SESSION["Quantity"])-1;   
$Payment= $_POST['paymentmethod'];
   echo $Payment;
$query = "insert into users (FirstName,LastName,book_Id,PaymentMethod) values('$firstname','$lastname','$Book_Id','$Payment')";
$res = @mysqli_query($dbc,$query);
if($res) {
echo "Order Placed Successfully";
    
    
    
$updQuery= "UPDATE bookinventory SET Quantity=".$Quantity." WHERE Book_Id=".$Book_Id;
   
$res2 = @mysqli_query($dbc,$updQuery);
if ($res2) {
 header('location:store.php');
} else {
   $error="Error";
}
    
}
}else {
  $error="Order Not Placed"; 
}


  
}
    else{
        $error="Enter all  the Fields for checkout"; 
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
      <!-- Note -->


    <!-- Header -->

    <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-primary bg-light">
  <a class="navbar-brand" href="main.php">BookStore</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="main.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="store.php">Shop for book</a>
        </li>
        
    </ul>
  </div>
</nav>
    <div>
    <main>
        <div class="row">

            <div class="side">
                <h2>CheckOut</h2>
                <div id="form-main">
                    <div id="form-div">
                        <form class="montform" action="index.php" method="POST" id="reused_form">
                           
                            <p>
                                <input name="bookname" type="text" class="feedback-input" id="bookname" value="Product in Cart:  <?PHP echo $_SESSION["Book_Name"]?>" readonly/>
                            <p>
                                <Label>First Name</Label>
                                <input name="firstname" type="text" class="feedback-input" id="firstname" />
                            </p>
                            <p>
                                <Label>Last Name</Label>
                                <input name="lastname" type="lastname" required class="feedback-input" id="lastname" />
                            </p>
                            <p>
                                <label class="name">Payment Type</label> </p>
                            <p>
                                <input type="radio" id="male" name="paymentmethod" value="debit">
                                <label for="debit">Debit</label><br>
                                <input type="radio" id="female" name="paymentmethod" value="credit">
                                <label for="credit">Credit</label><br>
                            </p>
                            <p class="name">
                                <input required class="feedback-input" id="paymentnumber" placeholder="Credit/Debit Number" required />
                            </p>
                            <div class="error">
                                <div>

                                    <?PHP
                                        if(isset($error)) 
                                           {
                                               echo "<p>".$error."</p>";
                                           }
                                    ?>



                                </div>
                            </div>
                            <div class="submit">
                                <input type="submit" class="button-blue" value="submit"><br>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>

    </main>
        </div>
    <footer class="main_footer">
        <div class="footer">
            <div>
                <p>aman@kaur.com</p>
            </div>
            

        </div>

    </footer>
    
</body>
</html>