<!DOCTYPE html>
<html lang = "en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Hmong Clothes Database </title>
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body> 
<h1> Hmong Clothes Database </h1>
<h3> Sells Join Seller Join Product Table </h3>

<!-- header -->
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

<?php

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} 
else {
    $pageno = 1;
}

// Create Variables
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "hmongclothes";

// Create connection
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

// Check connection
if (!$conn) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die("Connection failed: " . mysqli_connect_error());
}

$no_of_records_per_page = 1;
$offset = ($pageno-1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM sells natural join seller natural join product";
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM sells natural join seller natural join product LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($res_data)){
    $field1name = $row["s_id"];
    $field2name = $row["prod_code"];
    $field3name = $row["s_fname"];
    $field4name = $row["s_lname"];
    $field5name = $row["s_site"]; 
    $field6name = $row["prod_price"];
    $field7name = $row["prod_type"];
    $field8name = $row["d_id"];
    $field9name = $row["cat_id"];

    echo '<b>'."Seller's ID: ".$field1name.'<br />';
    echo "Product Code: ".$field2name.'<br />';
    echo "First Name: ".$field3name.'<br />';
    echo "Last Name: ".$field4name.'<br />';
    echo "Seller's Site: ".$field5name.'<br />';
    echo "Product Price: $".$field6name.'<br />';
    echo "Product Type: ".$field7name.'<br />';
    echo "Designer ID: ".$field7name.'<br />';
    echo "Category ID: ".$field9name.'<br />';
    echo '</b>';
    echo '<br />';
}
mysqli_close($conn);
?>

<!-- buttons -->
<ul class = "pagination">
    <li><a href="?pageno=1">First</a></li>
    <li class ="<?php if($pageno <= 1) {echo 'disabled';} ?>">
        <a href="<?php if($pageno <= 1){echo '#';} 
        else {echo "?pageno=".($pageno - 1); } ?>">Prev</a>
    </li>
    <li class ="<?php if($pageno >= $total_pages) {echo 'disabled';} ?>">
        <a href="<?php if($pageno >= $total_pages){echo '#';} 
        else {echo "?pageno=".($pageno + 1); } ?>">Next</a>
    </li>
    <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>

</body>
</html>