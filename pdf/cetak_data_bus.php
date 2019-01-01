<?php
require('../db.php');
// memanggil library FPDF
require('fpdf.php');

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
    $this->Cell(170,6,'PO SINAR JAYA GROUP',0,1,'C');
	$this->Ln(1);
	$this->SetFont('Arial','B',10);
    $this->SetX(30);
    $this->cell(170,6,'Jl Raya Inspeksi Kalimalang, Cibitung MM2100, Kabupaten Bekasi',0,1,'C');
    $this->SetX(30);
    $this->SetTextColor(128);
    $this->SetFont('Arial','B',12);
    $this->cell(170,6,'LAPORAN DATA BUS',0,1,'C');
    $this->Ln(5);
    $this->cell(0,0,'',1,1);
    // Line break
    $this->Ln(1);



    $this->SetFont('Arial','B',8);
    $this->Cell(5,6,'#',0,0,'C');
    $this->Cell(30,6,'ID BUS',0,0,'C');
    $this->Cell(50,6,'NAMA BUS',0,0,'L');
    $this->Cell(30,6,'KELAS',0,0,'L');
    $this->Cell(30,6,'ASAL',0,0,'L');
    $this->Cell(30,6,'TUJUAN',0,0,'L');
    $this->Cell(10,6,'KURSI',0,1,'R');

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
$pdf->SetFont('Times','',8);
$sql = $conn->query("SELECT * FROM databus ORDER BY nama_bus ASC");
if($sql->num_rows>0){
    $i = 1;
    while ($data = $sql->fetch_assoc()) {
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(5,6,$i,0,0,'C');
        $pdf->Cell(30,6,$data['id_bus'],0,0,'C');
        $pdf->Cell(50,6,$data['nama_bus'],0,0,'L');
        $pdf->Cell(30,6,$data['kelas'],0,0,'L');
        $pdf->Cell(30,6,$data['asal'],0,0,'L');
        $pdf->Cell(30,6,$data['tujuan'],0,0,'L');
        $pdf->Cell(10,6,$data['jml_kursi'],0,1,'R');
        $i++;
    }
}
$pdf->Output();
?>