<!DOCTYPE html>

<?PHP

//Setting the session value for the selected item
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //getting the value from query string
$Book_Id = $_GET["Book_Id"];
$Book_Name = $_GET["Book_Name"];
$Author = $_GET["Author"];
$Price = $_GET["Price"];
$Quantity = $_GET["Quantity"];
$Image = $_GET["Image"];
    
$_SESSION["Book_Id"]=$Book_Id;
$_SESSION["Book_Name"]=$Book_Name;
$_SESSION["Author"]=$Author;
$_SESSION["Price"]=$Price;
$_SESSION["Quantity"]=$Quantity;
$_SESSION["Image"]=$Image;
    echo $_SESSION["Book_Id"];
    header('location:index.php');
}
?>
<html>

<head>
    <title>BookStore</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="main.css" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    
    
  
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

    <main>
        <div class="page-main">
            <h1></h1>
        </div>
        <div class="row">
            <div class="side">
                <table class="table">
                   
                    <?php

       require ('mysqli_connect.php');
       $query = "SELECT * FROM bookinventory";
       $res = @mysqli_query($dbc,$query);
       if(mysqli_num_rows($res) >0)
       {
           //Showing the list of items
          while($row = mysqli_fetch_assoc($res)) 
        {
        ?>
                      <tr>
                          <td></td> <form method="post" action="store.php?Book_Id=<?php echo $row['Book_Id']; ?>&Book_Name=<?php echo $row['Book_Name']; ?>&Author=<?php echo $row['Author']; ?>&Quantity=<?php echo $row['Quantity']; ?>&Price=<?php echo $row['Price']; ?>&Image=<?php echo $row['Image']; ?>">
                                <td> <h3 class="h3"><?php echo $row['Book_Name']; ?></h3><br></td>
                           <td> <div class="fakeimg"><img width="150px" src="images/<?php echo $row['Image']; ?>"></div></td>
                           <td> <div class="fakeimg">
                               <h4>Quantity:  <?php echo $row['Quantity']; ?></h4></div></td>
                               <td><input type="submit" value="Buy Now" class="btnAddAction" /></td>
                            </form>
                        </tr>
                   
         <?php
        }
       }
      ?>
                    
                    
                </table>
            </div>



        </div>
    </main>
    <!-- Footer -->
    <footer class="main_footer">
        <div class="footer">
            <div>
                <p>aman@kaur.com</p>
            </div>
        </div>
    </footer>

</body>

</html>
