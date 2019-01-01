<?php
require('../db.php');
// memanggil library FPDF
require('fpdf.php');
$sql = $conn->query("SELECT * FROM penumpang WHERE id_penumpang = '$_GET[id_penumpang]'");
if($sql->num_rows>0){
    $data = $sql->fetch_assoc();
}

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
    $this->Cell(170,6,'PO SINAR JAYA GROUP',0,1,'C');
	$this->Ln(1);
	$this->SetFont('Arial','B',10);
    $this->SetX(30);
    $this->cell(170,6,'Jl Raya Inspeksi Kalimalang, Cibitung MM2100, Kabupaten Bekasi',0,1,'C');
    $this->SetX(30);
    $this->SetTextColor(128);
    $this->SetFont('Arial','B',12);
    $this->cell(170,6,'STRUK PEMBAYARAN',0,1,'C');
    $this->Ln(5);
    $this->cell(0,0,'',1,1);
    // Line break
    $this->Ln(1);


    $this->SetFont('Arial','B',8);
    $this->Cell(30,6,'ID Pemesan',0,0,'C');
    $this->Cell(50,6,'Nama',0,0,'L');
    $this->Cell(30,6,'No Telp',0,0,'L');
    $this->Cell(35,6,'No KTP',0,0,'L');
    $this->Cell(30,6,'Email',0,1,'L');

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

$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,$data['id_penumpang'],0,0,'C');
$pdf->Cell(50,6,$data['namapenumpang'],0,0,'L');
$pdf->Cell(30,6,$data['telepon'],0,0,'L');
$pdf->Cell(35,6,$data['no_ktp'],0,0,'L');
$pdf->Cell(30,6,$data['email'],0,1,'L');
$pdf->cell(0,10,'',0,1);

$result = $conn->query("INSERT INTO detail_pesanan SELECT * FROM temp WHERE id_pesanan = '$_GET[id_pesanan]'");
if($result){
    $result_delete = $conn->query("DELETE FROM temp WHERE id_pesanan = '$_GET[id_pesanan]'");
    if($result_delete){
        //$pdf->Cell(10,10,'SUSKES MUTASI',1,1);
    }
    else{
        //$pdf->Cell(10,10,'GAGAl MUTASI',1,1);
    }
}
else{
        //$pdf->Cell(10,10,'GAGAl INSERT',1,1);
}

$sql = $conn->query("SELECT * FROM pesanan P RIGHT JOIN detail_pesanan D ON P.id_pesanan = D.id_pesanan LEFT JOIN jadwal_keberangkatan J ON D.id_jadwal = J.id_jadwal LEFT JOIN databus B ON J.id_bus = B.id_bus WHERE P.id_pesanan = '$_GET[id_pesanan]' AND P.status_pesanan = '0'");
if($sql->num_rows>0){
    while ($print = $sql->fetch_assoc()) {
        $pdf->cell(0,0,'',1,1);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(30,10,'Jadwal Keberangkatan :',0,0,'L');
        $pdf->Cell(30,10,$print['waktu_berangkat'],0,0,'L');
        $pdf->Cell(70,10,'Tujuan : '.$print['asal'].' - '.$print['tujuan'],0,0,'R');
        $pdf->Cell(60,10,'ID Pesanan : '.$print['id_pesanan'],0,1,'R');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(190,10,'STRUK / BUKTI PESANAN TRANSAKSI ONLINE',0,1,'C');

        $pdf->SetFont('Arial','',8);
        $pdf->Cell(20,10,'No Kursi',0,0,'L');
        $pdf->Cell(70,10,'Detail Armada',0,0,'L');
        $pdf->Cell(40,10,'Stempel Admin',0,0,'C');
        $pdf->Cell(60,10,'Rincian Biaya',0,1,'R');

        $pdf->SetFont('Arial','',12);
        $pdf->Cell(20,20,$print['no_kursi'],0,0,'L');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(70,10,$print['asal'].' - '.$print['tujuan'],0,0,'L');
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,20,'Ttd',0,0,'C');
        $pdf->Cell(30,10,'Harga Tiket : ',0,0,'R');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(30,10,'Rp. '.$print['harga_tiket'],0,1,'R');
        $pdf->SetFont('Arial','B',10);

        $pdf->SetX(30);
        $pdf->Cell(70,10,$print['nama_bus'],0,0,'L');
        $pdf->SetX(140);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(60,10,'Berlaku s/d '.$print['tanggal_expired'],0,1,'R');
    }
}


$pdf->Output();
?>