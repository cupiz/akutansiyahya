<?php
require('fpdf.php');

class myPDF extends FPDF {
  function myCell($w,$h,$x,$t){
      $height=$h/3;
      $first=$height+2;
      $second=$height+$height+$height+3;
      $len=strlen($t);
      if($len>15){
          $txt=str_split($t,15);
          $this->SetX($x);
          $this->Cell($w,$first,$txt[0],'','','');
          $this->SetX($x);
          $this->Cell($w,$second,$txt[1],'','','');
          $this->SetX($x);
          $this->Cell($w,$h,'','LTRB',0,'L',0);
      }
      else{
          $this->SetX($x);
          $this->Cell($w,$h,$t,'LTRB',0,'L',0);
      }
  }
}
?>
