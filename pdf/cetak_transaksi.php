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
    $this->SetX(35);
    $this->Cell(170,6,'PO SINAR JAYA GROUP',0,1,'C');
	$this->Ln(1);
	$this->SetFont('Arial','B',12);
    $this->SetX(30);
    $this->SetTextColor(128);
    $this->cell(170,6,'LAPORAN TRANSAKSI BULANAN',0,1,'C');
    $this->Ln(5);
    $this->cell(199,0,'',1,1);
    // Line break
    $this->Ln(3);

    $this->SetFont('Arial','B',8);
    $this->Cell(10,4,'',1,0,'C');
    $this->Cell(40,4,'ID TRANSAKSI',1,0,'C');
    $this->Cell(20,4,'KATEGORI',1,0,'C');
    $this->Cell(40,4,'LAYANAN',1,0,'C');
    $this->Cell(15,4,'QTY',1,0,'C');
    $this->Cell(30,4,'DISKON',1,0,'C');
    $this->Cell(35,4,'TARIF',1,1,'C');
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
/*
for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Printing line number '.$i,0,1);
*/



$now = date("Y-m-d");
$date_selesai = date_create($now);
$tanggal_selesai = date_add($date_selesai, date_interval_create_from_date_string('-31 days'));
$last = date_format($tanggal_selesai, 'Y-m-d');
include '../../koneksi.php';
$sql = "SELECT * FROM transaksi T LEFT JOIN jenis J ON T.id_jenis = J.id_jenis LEFT JOIN kategori K ON J.id_kategori = K.id_kategori WHERE T.id_konsumen = '$_GET[id_konsumen]' AND T.status = 0"; 
$result = $conn->query($sql);
if($result->num_rows > 0){
	while($data = $result->fetch_assoc()){
            $pdf->Cell(10,6,'',1,0,'C');
            $pdf->Cell(40,6,$data['id_transaksi'],1,0,'C');
            $pdf->Cell(20,6,$data['nama_kategori'],1,0,'C');
            $pdf->Cell(40,6,$data['jenis'],1,0,'C');
            $pdf->Cell(15,6,$data['qty'],1,0,'C');
            $pdf->Cell(30,6,$data['diskon'],1,0,'C');
            $pdf->Cell(35,6,$data['tarif'],1,1,'C');
        
    }
}

$pdf->Output();
?>
