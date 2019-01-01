<?php
// memanggil library FPDF
require('fpdf.php');


//$pdf->Output();

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo

    $this->Image('logo.png',15,1,25);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Title
    $this->SetLineWidth(0);
    $this->SetX(30);
    $this->Cell(170,6,'SISTEM PERPUSTAKAAN SMK BHAKTI KARYA MANDIRI',0,1,'C');
	$this->Ln(1);
	$this->SetFont('Arial','B',12);
    $this->SetX(30);
    $this->SetTextColor(128);
    $this->cell(170,6,'Jl. Cutmutia Raya, Kalimalang Bekasi 17324',0,1,'C');
    $this->Ln(5);
    $this->cell(0,0,'',1,1);
    // Line break
    $this->Ln(1);

}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Printing line number '.$i,0,1);
include 'koneksi.php';
//$sql = "SELECT * FROM guru";
//$result = $conn->query($sql);
/*if($result->num_rows > 0){
	while($data = $result->fetch_assoc()){
    	//$pdf->Cell(20,6,$row['nim'],1,0);
    	//$pdf->Cell(85,6,$row['nama_lengkap'],1,0);
    	//$pdf->Cell(27,6,$row['no_hp'],1,0);
    	//$pdf->Cell(25,6,$row['tanggal_lahir'],1,1);
    	$pdf->Cell(20,6,"Yuli",1,1);
	}
}*/

$pdf->Output();
?>