<?php

require 'vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

if(!empty($_POST['name']) && !empty($_POST['firstname']) 
&& !empty($_POST['number'])){


$name=$_POST['name'];
$prenom=$_POST['firstname'];
$numberbox=$_POST['numberbox'];
$number = $_POST['number'];
$ads=$_POST['ads'];
$has_pub = ($ads == "on") ? "<img class='nopub' src='stop pub.JPG' alt='Stop publicité'>":"";



    //generer le pdf à partir d'un html
  

$html = "
        <html lang='fr'>
 <style>   <head>
           .main-box {
            display: flex;
            width: 600px;
            height: 80px;
            align-items: center;
            justify-content: space-around;
            border-width: 3px;
            border-style: dashed;
            border-color: black;
            margin: 50px;
          }

           table {
            padding: 15px;
           }

            img.nopub {
            width: 30px;
            height: 30px;
            }
     </style>
        </head>
        <body>";

          
        for($i = 0; $i < $number; $i++) {
            $html .= "<table class ='main-box'>
            <tr>
                <td><p class='number'>$numberbox</p></td>
                <td><p class='name'>$name $prenom</p></td>
                <td>$has_pub</td>
            </tr>
           
            </table>";
         }
         

      
 $html .= "</body></html>";
          
$html2pdf = new Html2Pdf();
  $html2pdf->writeHTML($html);

  ob_end_clean();
  $html2pdf->output('etiquette.pdf');

}

else{
    header("location: index.html");
}





