<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Hmong Clothes Database </title>
    <!-- header css -->
    <link rel="stylesheet" href="main.css">
</head>
<body> 
<h1> Hmong Clothes Database </h1>
<h3> Sellers Search </h3>

<head> 
    <link rel="stylesheet" href="main.css">
    </head>
    <header class="header">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="main-nav" style="float:left">
                    <a href="hmongclothes.html">Home</a>
            </div>
            <div class="form1-nav" style="float:left;margin-left:5px;">
                <button class="btn"> Form 1</button>
                    <div class="btn-content">
                        <a href="DesignerCompany.php">DesignerCompany</a></li>
                        <a href="Sellers.php">Seller</a>
                        <a href="Category.php">Category</a>
                        <a href="Products.php">Product</a>
                        <a href="Sells.php">Sells</a>
                        <a href="Reviews.php">Review</a>
                    </div>
                </div>
            </div>
            <div class="form2-nav" style="float:left;margin-left:5px;">
                <button class="btn2"> Form 2</button>
                    <div class="btn2-content">
                        <a href="SellerXDesigner.php">SellerXDesigner</a>
                        <a href="SellerXProduct.php">SellerXProduct</a>
                        <a href="ProductXDesigner.php">ProductXDesigner</a>
                        <a href="ProductXCategory.php">ProductXCategory</a>
                        <a href="SellsXSellerXProduct.php">SellsXSellerXProduct</a>
                        <a href="ReviewXSellerXProduct.php">ReviewXSellerXProduct</a>
                    </div>
                </div>	
            </div>
            <div class="form3-nav" style="float:left;margin-left:5px;">
                <button class="btn3"> Form 3</button>
                    <div class="btn3-content">
                        <a href="Form3Designer.html">Form 3 Designer</a>
                        <a href="Form3Sellers.html">Form 3 Seller</a>
                        <a href="Form3Category.html">Form 3 Category</a>
                        <a href="Form3Product.html">Form 3 Product</a>
                        <a href="Form3Sells.html">Form 3 Sells</a>
                        <a href="Form3Reviews.html">Form 3 Review</a>
                    </div>
                </div>
            </div>	
        </nav>
    </header>

<br /> 
<br /> 
<br /> 
<br /> 

<!-- user input -->
<form action="Form3Sellers.php" method="post">
Search <input type="text" name="search"><br>

Column: <select name="column">
    <option value="s_id">Seller ID</option>
	<option value="s_fname">First Name</option>
    <option value="s_lname">Last name</option>
    <option value="s_site">Seller Site</option>
    <option value="d_id">Designer ID</option>
	</select><br>
<input type ="submit">
</form>

<?php
$search = $_POST['search'];
$column = $_POST['column'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "hmongclothes";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from seller where $column like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
    echo '<br />';
    
    echo '<b>'."Seller ID: ".$row["s_id"].'<br />';
    echo "First Name: ".$row["s_fname"].'<br />';
    echo "Last Name: ".$row["s_lname"].'<br />';
    echo "Site: ".$row["s_site"].'<br />';
    echo "Designer ID: ".$row["d_id"].'<br />';
    echo '</b>';
}
} else {
	echo "0 records";
}

$conn->close();
?>

</body>
</html>