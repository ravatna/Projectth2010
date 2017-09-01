
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=8">
<meta name="viewport" content="width=device-width">
<meta name="keywords" content="Math keyboard, Math characters, online keyboard, virtual keyboard, learn Math, study Math, Math school, Math lessons, Math translation">
<title>Type mathematical symbols - online keyboard</title>
<style>
 .btn_math {
	 font-size:18px;
 }
</style>
</head>

<body class="editor">
<?php




 for($i=8706; $i <= 8971; $i++ ){
	 echo '<input class="btn_math" type="button" id="btn_'.$i.'" value="&#'.$i.';" title="&#'.$i.'" onclick="addText(this.value);"  />';
 } 
 
 echo "<hr/>";
 for($i=188; $i <= 189; $i++ ){
	 echo '<input class="btn_math" type="button" id="btn_'.$i.'" value="&#'.$i.';" title="&#'.$i.'" onclick="addText(this.value);"  />';
 } 
 
 
 for($i=8533; $i <= 8542; $i++ ){
	 echo '<input class="btn_math" type="button" id="btn_'.$i.'" value="&#'.$i.';" title="&#'.$i.'" onclick="addText(this.value);"  />';
 } 
 echo "<hr/>";
  for($i=913; $i <= 982; $i++ ){
	 echo '<input class="btn_math" type="button" id="btn_'.$i.'" value="&#'.$i.';" title="&#'.$i.'" onclick="addText(this.value);"  />';
 } 
 echo "<hr/>";
 
  for($i=32; $i <= 126; $i++ ){
	 echo '<input class="btn_math" type="button" id="btn_'.$i.'" value="&#'.$i.';" title="&#'.$i.'" onclick="addText(this.value);"  />';
 } 
 echo "<hr/>";
 
  for($i=13169; $i <= 13277; $i++ ){
	 echo '<input class="btn_math" type="button" id="btn_'.$i.'" value="&#'.$i.';" title="&#'.$i.'" onclick="addText(this.value);"  />';
 } 
 /*
 
 echo '<input class="btn_math" type="button" id="btn_215" value="&#215;" title="&#215" onclick="addText(this.value);"  />';
 echo '<input class="btn_math" type="button" id="btn_247" value="&#247;" title="&#247" onclick="addText(this.value);"  />';
 echo '<input class="btn_math" type="button" id="btn_402" value="&#402;" title="&#402" onclick="addText(this.value);"  />';
 echo '<input class="btn_math" type="button" id="btn_710" value="&#710;" title="&#710" onclick="addText(this.value);"  />';
 echo '<input class="btn_math" type="button" id="btn_732" value="&#732;" title="&#732" onclick="addText(this.value);"  />';
 
 
 
 echo '<input class="btn_math" type="button" id="btn_8211" value="&#8211;" title="&#8211" onclick="addText(this.value);"  />';
 echo '<input class="btn_math" type="button" id="btn_8212" value="&#8212;" title="&#8212" onclick="addText(this.value);"  />';
 echo '<input class="btn_math" type="button" id="btn_8216" value="&#8216;" title="&#8216" onclick="addText(this.value);"  />';
 echo '<input class="btn_math" type="button" id="btn_8217" value="&#8217;" title="&#8217" onclick="addText(this.value);"  />';
 echo '<input class="btn_math" type="button" id="btn_8218" value="&#8218;" title="&#8218" onclick="addText(this.value);"  />';
 echo '<input class="btn_math" type="button" id="btn_8220" value="&#8220;" title="&#8220" onclick="addText(this.value);"  />';
 echo '<input class="btn_math" type="button" id="btn_732" value="&#732;" title="&#732" onclick="addText(this.value);"  />';
 echo '<input class="btn_math" type="button" id="btn_732" value="&#732;" title="&#732" onclick="addText(this.value);"  />';
 echo '<input class="btn_math" type="button" id="btn_732" value="&#732;" title="&#732" onclick="addText(this.value);"  />';
 echo '<input class="btn_math" type="button" id="btn_732" value="&#732;" title="&#732" onclick="addText(this.value);"  />';
 echo '<input class="btn_math" type="button" id="btn_732" value="&#732;" title="&#732" onclick="addText(this.value);"  />';
 echo '<input class="btn_math" type="button" id="btn_732" value="&#732;" title="&#732" onclick="addText(this.value);"  />';
 */
 
?>  



<textarea  onclick="setCurrent(this);" id="c1"   ></textarea> 


<textarea  onclick="setCurrent(this);" id="c2"   ></textarea> 

<textarea  onclick="setCurrent(this);" id="c3"   ></textarea> 

<textarea  onclick="setCurrent(this);" id="c4"   ></textarea> 

</body>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script>

        
		var currentEl = null;
		function setCurrent(el){
			 
			currentEl = el;
		}
		
		function addText( s){
			 
			currentEl.value +=   s;
			currentEl.focus();
		}

    </script>
</html>