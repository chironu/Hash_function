<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.table {
	font-size: 12px;
	color:             #000000;
    background-color:  #ffffff;
	border-width:      0.1em;
    border-color:      #000000;
    border-style:      solid;
    border-collapse:   collapse;
    border-spacing:    0;
}

.td {
	font-size: 12px;
	color:             #000000;
    background-color:  #ffffff;
border-width:      0.1em;
    border-color:      #000000;
    border-style:      solid;
    padding:           0.2em;
}

.th {
	font-size: 12px;
	color:             #000000;
    background-color:  #0000FF;
		  border-width:      0.1em;
    border-color:      #000000;
    border-style:      solid;
	  padding:           0.2em;
    font-weight:       bold;
    background-color:  #e5e5e5;
}
</style>
<script>
window.onload = function() {
var dd=document.getElementById("input").value;
var input = document.getElementById("input").focus();
document.getElementById("input").value=dd;
}
function reset_data(){
window.location.href="index.php?ss=<?=date(YmdHis);?>";
}

function random_data(){
var n = prompt("Random number of(max:100):", "100");
if(n>100){
	n="100";
}
var input = document.getElementById("input").focus();
var dd=random_num(0,1000);
for(i=0;i<=n-2;i++){
dd=dd+' '+random_num(0,1000);
}
document.getElementById("input").value=dd;
}

function random_num(min,max)
{
    return Math.floor(Math.random()*(max-min+1)+min);
}
</script>

<?
function hash_data($array)
{
	$hash_tb=array();
	for($i=0;$i<=count($array)-1;$i++){
		$p=$array[$i]%50;
$val=$array[$i];
$hash_tb[$p][]=$val;
	}
	return $hash_tb;
}

/////////////////////////////////////////////////////
if(isset($_POST['input'])){
$input =$_POST['input'];
}
?>
<form action="?" method="post">
<table>
<tr><td colspan="2" align="center"><h1>Hash function</h1></td></tr>
  <tr><td>Data Input:</td><td><textarea name="input" id="input" rows="5" cols="100"><?=$input?></textarea></td></tr>
   <tr><td></td><td> <input type="button" value="Random input" name="random" onclick="random_data();"> <input type="button" value="Reset input" name="reset" onclick="reset_data();"> <input type="submit" value="Start Hash" name="submit"></td></tr>
   </table>
</form>
<?
if($_POST[submit]=="Start Hash"){
echo  "<b>Input:</b> $input<br><hr>";
$data=explode(" ",$input);
$hash = hash_data($data);
echo  "<b>Output Hash Table:<br>";
echo "<table class=table width='90%'>";
echo  "<tr><th align=center width='5%' class=th>No</th><th align=center width='95%' class=th>Data</th></tr>";

for($i=0;$i<=49;$i++){
	echo "<tr><td class=td align=center>$i:</td><td class=td>";
if($hash[$i])echo implode(" ",$hash[$i]);
echo "</td></tr>";
	}
}
echo "</table><br>";
?>