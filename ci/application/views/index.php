<!DOCTYPE html>
<html lang="en">
<head>
  <title> Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
			table { display: inline-block; vertical-align: top; border: 1px ; }
		</style>
</head>
<body>

<div class="container">
  <h2> Table</h2>
  
  <table class="ieh-fl"  border="1">
  <thead>
    <tr class="td_center strong">
        <th >Date</th>
</tr>
    </thead>

    <tbody>
   
 
    <?php $i=1; $count=2; foreach($open as $opens)
 { ?>
      
   <tr>
     <td> <?php  if($opens->result_id==138){  echo $opens->date;}else{ $a =$i-1; $e=6* $a; $dates = $opens->date; $str1 = date('Y-m-d', strtotime('+'.$e.'days', strtotime($dates))); echo $str1 ; } ?><br> <br><?php $z=$count-1; $d=6*$z; $date = $opens->date; $str2 = date('Y-m-d', strtotime('+'.$d. 'days', strtotime($date))); echo $str2 ;?>
    </td>
    </tr>
   
    <?php $count++; ?>
    <?php $i++; }?>
    </tbody>
    </table>
    <table  border="1">
       <thead>
      <tr class="td_center strong">
        <th  colspan="3">Mon</th><vl>
        <th  colspan="3">Tue</th><vl>
        <th colspan="3">Wed</th><vl>
        <th  colspan="3">Thue</th><vl>
        <th  colspan="3">Fri</th><vl>
        <th  colspan="3">Sat</th><vl>
        <th  colspan="3">Sun</th><vl>
    </tr>
     
    </thead>
    
    <tbody>
   
 
    <?php $j=0;   foreach($open as  $key=>$getData) { 
        $getData1 = $close[$key]; ++$j; if($j==1){ ?>
 <tr>
  
    <td ><?php  echo $getData->open_result_digit;  ?> <br><br><br></td>
 
    <td><?php echo $getData->open_digit_sum; ?> <?php echo $getData1->	close_digit_sum; ?><br><br><br></td>
    
    <td><?php  echo $getData1->close_result_digit; ?><br><br><br></td>
  
  <?php  }
    if($j==2){ ?>
   
   <td ><?php  echo $getData->open_result_digit;  ?> <br><br><br></td>
 
 <td><?php echo $getData->open_digit_sum; ?> <?php echo $getData1->	close_digit_sum; ?><br><br><br></td>
 
 <td><?php  echo $getData1->close_result_digit; ?><br><br><br></td>
    <?php  }
    if($j==3){ ?>
   
   <td ><?php  echo $getData->open_result_digit;  ?> <br><br><br></td>
 
 <td><?php echo $getData->open_digit_sum; ?> <?php echo $getData1->	close_digit_sum; ?><br><br><br></td>
 
 <td><?php  echo $getData1->close_result_digit; ?><br><br><br></td>
    <?php  }
    if($j==4){ ?>
      
      <td ><?php  echo $getData->open_result_digit;  ?> <br><br><br></td>
 
 <td><?php echo $getData->open_digit_sum; ?> <?php echo $getData1->	close_digit_sum; ?><br><br><br></td>
 
 <td><?php  echo $getData1->close_result_digit; ?><br><br><br></td>
    <?php  }
    if($j==5){ ?>
    
    
    <td ><?php  echo $getData->open_result_digit;  ?> <br><br><br></td>
 
 <td><?php echo $getData->open_digit_sum; ?> <?php echo $getData1->	close_digit_sum; ?><br><br><br></td>
 
 <td><?php  echo $getData1->close_result_digit; ?><br><br><br></td>
    <?php  }
    if($j==6){ ?>
    
    <td ><?php  echo $getData->open_result_digit;  ?> <br><br><br></td>
 
 <td><?php echo $getData->open_digit_sum; ?> <?php echo $getData1->	close_digit_sum; ?><br><br><br></td>
 
 <td><?php  echo $getData1->close_result_digit; ?><br><br><br></td>
    <?php  }
    if($j==7){ ?>
 
    
 <td ><?php  echo $getData->open_result_digit;  ?> <br><br><br></td>
 
 <td><?php echo $getData->open_digit_sum; ?> <?php echo $getData1->	close_digit_sum; ?><br><br><br></td>
 
 <td><?php  echo $getData1->close_result_digit; ?><br><br><br></td>
   
  </tr>
      
  
      <?php $j=0;}}?>
     
    </tbody>
  </table>
</div>

</body>
</html>
<!-- $j=0;
foreach($children as $child){ 
    ++$j;
    if($j==1){
        echo "<row>";
        echo "<td>$child</td>";
        echo "<td>$child</td>";
        echo "<td>$child</td>";
    }
    if($j==2){
        echo "<td>$child</td>";
        echo "<td>$child</td>";
        echo "<td>$child</td>";
        echo "</row>"
        $j=0;
    }
} -->