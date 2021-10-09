<?php
require('rotation.php');

class PDF extends PDF_Rotate
{
	function Header()
	{
		//Put the watermark
		$this->SetFont('Arial', 'B', 50);
		$this->SetTextColor(255, 192, 203);
		$this->RotatedText(35, 190, 'MI MARCA DE AGUA', 45);
	}

	function RotatedText($x, $y, $txt, $angle)
	{
		//Text rotated around its origin
		$this->Rotate($angle, $x, $y);
		$this->Text($x, $y, $txt);
		$this->Rotate(0);
	}
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$txt = utf8_decode("Lorem ipsum dolor sit amet consectetur adipisicing elit." .
	" Expedita incidunt harum beatae earum exercitationem corporis a sapiente ab esse delectus fuga," .
	" dignissimos nam corrupti totam temporibus deleniti, saepe, optio similique.\n\n");

for ($i = 0; $i < 25; $i++)
	$pdf->MultiCell(0, 5, $txt, 0, 'J');
$pdf->Output();
