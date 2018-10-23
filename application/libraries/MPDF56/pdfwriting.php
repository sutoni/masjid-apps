


<?php
include('C:\xampp\htdocs\MPDF56\mpdf.php');
$mpdf=new mPDF('hi','A4','20','',20,20,15,15);
//$mpdf=new mPDF('hi');
    $contents = file('C:\dhaval\d drive\gretil1\others\prANAbharNa.txt'); 
   // $contents = implode("</br>",$contents);
	//echo $contents;
$count= count($contents);
$a=0;
While($a<$count)
{

$mpdf-> WriteHTML($contents[$a].'<br>');
$a++;
}
$mpdf->Output();
?>
