
<?php
$x="The cloud computing is defined as delivery of services like storage, bandwidth, platform, software over the network and user will pay as per his usage";
$result=removebadwords($x);
echo $result;
function removebadwords($x)
{
$x=strtoupper($x);
$y="the is of as his and";
$y=strtoupper($y);
$result=str_replace(",","",$x);
$words=explode(" ", $result);
$rwords=[];
$pos=0;
foreach($words as $word)
{
$flag=stripos($y,$word);
//echo "Index".strval($flag);
if($flag===false)
{
 $rwords[$pos]=$word;
 
 //echo $rwords[$pos];
 //echo "<br>";
 $pos++;
}
//echo strpos($y,$word);
//echo "<br>"; 
}
$finalword=join(" ",$rwords);
return $finalword;
}
?>