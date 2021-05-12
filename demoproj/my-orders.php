<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{font-family: Arial, Helvetica, sans-serif;}

.callout{
  position: center;
  bottom: 35px;
  right: 200px;
  margin-left: 500px;
  max-width: 500px;
}

.callout-header{
  position:center;
  padding: 25px 15px;
  background: #555;
  font-size: 30px;
  color: white;
}

.callout-container{
  padding: 15px;
  background-color: #ccc;
  color: black
}

.closebtn{
  position: absolute;
  top: 5px;
  right: 15px;
  color: white;
  font-size: 30px;
  cursor: pointer;
}

.closebtn:hover{
  color: lightgrey;
}
</style>
</head>
<body>
  <link rel="stylesheet" type="text/css" href="css/projstyle.css">

<?php 
      include 'header.php';?>
<div class="callout">
  <div class="callout-header">Congrats!! your order is successful.</div>
  <span class="closebtn" onclick="this.parentElement.style.display='none';">×</span>
  <div class="callout-container">
    <p>You will recieve the bill with your product after successful delievery!!<br><br><center>THANK YOU!!</p><br></center>
    

  </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
