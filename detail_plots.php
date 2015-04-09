<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<link rel="stylesheet" type="text/css" href="style.php"/>

</head>

<body>

<div class="container">
  <div class="header"><a href="#"><img src="img/login.jpg" alt="Insert Logo Here" name="Insert_logo" width="183" height="275" id="Insert_logo" style="background-color: #C6D580; display:block;" /></a> 
    <!-- end .header --></div>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="#">View availability</a></li>
      <li><a href="#">View areas</a></li>
      <li><a href="#">Link three</a></li>
      <li><a href="#">Link four</a></li>
    </ul>
  
    <!-- end .sidebar1 --></div>
  <div class="content">
    <h1>Instructions</h1>
    <p>Below presents the available plots in Algonquin College. The green indicates there are available slots. The red indicates the slots are fullly occupied</p>
    <h3>All plots</h3>
    <div>
    <!--start .table-->
    <table align="center" width="200" border="3" cellpadding="3">
  <caption>
    Plots in Algonquin College
  </caption>
 
 
<!--
get number of Plots

get plot1
	get number of specified plot
		loop all slots in the current plot
			if status of one slot is false
			then turn the current plot green
			else then turn the current plot red
 		continue loop through slots
        
        SELECT STATUS FROM  `slot` 
WHERE plot_idplot =2


SELECT COUNT( slot_idslot ) 
FROM  `plot_has_slot` 
WHERE plot_idplot =1
AND STATUS =0


SELECT COUNT( slot_idslot ) 
FROM  `plot_has_slot` 
WHERE plot_idplot =1

-->
  
   
 <?php
	session_start();
    extract($_POST);
    include 'functions.php';
    $link = connectToDatabase();
    
   // $date ='2015-02-16';
  $query = "SELECT COUNT( idplot ) FROM plot";
  $count=mysqli_query($link,$query); 
				if (!$count) {
		die('Invalid query: ' . mysqli_error());
	}
  $countPlot = mysqli_fetch_row($count);

  

  
  
  /*$preparedSelectEvent=mysqli_prepare($link,$query);


mysqli_stmt_bind_param($preparedSelectEvent,'s',$date);
mysqli_stmt_execute($preparedSelectEvent);
mysqli_stmt_bind_result($preparedSelectEvent, $name,$sportstarttime,$sportendtime);

while($row=mysqli_stmt_fetch($preparedSelectEvent)){ 

*/

	$i=0;
	while($i<20)
	{
		if($i%10 == 0)
		{
			echo "<tr>".PHP_EOL;
		}
    
 
		echo "<td>";
		++$i;
		$statusQuery= "SELECT COUNT( slot_idslot ) FROM  plot_has_slot WHERE plot_idplot =".$i ." AND STATUS =0";
				 $count1=mysqli_query($link,$statusQuery); 
				if (!$count1) {
					die('Invalid query: ' . mysqli_error());
			}
 		 $slotStatus = mysqli_fetch_row($count1);
	    
		?>
       
        <?php
		if ($slotStatus==0) {
		 
		echo 'slot'.$i.'" style="background-color:green;" name="button['.$i.']">';
		}
		else {
		 echo '<input type="button" id="btnplot1" value="plot1"style="background-color:red">';
		}
		
		echo "</td>";
		if($i%5 == 0)
				{
					echo "</tr>".PHP_EOL;
				}
	}
	
  ?>
  <?php
var_dump($button[$i]);
  if(isset($button[$i]))
	{
		header("location: detail_plots.php?plot=<?php echo $i ?>");
	}
	?>
 
  </form>
</table>

    
    </div>
    
    <!-- end .content --></div>
  <div class="footer">
    <p>Powered by </p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>