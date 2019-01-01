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
    $this->cell(170,6,'LAPORAN PESANAN',0,1,'C');
    $this->Ln(5);
    $this->cell(0,0,'',1,1);
    // Line break
    $this->Ln(1);

    $this->SetFont('Arial','B',8);
    $this->Cell(5,6,'#',0,0,'C');
    $this->Cell(25,6,'ID PSN',0,0,'L');
    $this->Cell(25,6,'ID CUST',0,0,'C');
    $this->Cell(15,6,'ID ADM',0,0,'L');
    $this->Cell(30,6,'DIPESAN',0,0,'L');
    $this->Cell(35,6,'DIPROSES',0,0,'L');
    $this->Cell(15,6,'QTY',0,0,'C');
    $this->Cell(15,6,'KURSI',0,0,'R');
    $this->Cell(25,6,'TOTAL',0,1,'R');

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
$sql = $conn->query("SELECT * FROM pesanan P INNER JOIN penumpang PN ON P.id_penumpang = PN.id_penumpang WHERE P.status_pesanan = '1'");
if($sql->num_rows>0){
    $i = 1;
    while ($data = $sql->fetch_assoc()) {



        $pdf->SetFont('Arial','',8);
        $pdf->Cell(5,6,$i,0,0,'C');
        $pdf->Cell(25,6,$data['id_pesanan'],0,0,'C');
        $pdf->Cell(25,6,$data['id_penumpang'],0,0,'C');
        $pdf->Cell(15,6,$data['id_admin'],0,0,'L');
        $pdf->Cell(30,6,$data['tanggal_pesan'],0,0,'L');
        $pdf->Cell(35,6,$data['tanggal_bayar'],0,0,'L');
        $detail = $conn->query("SELECT * FROM detail_pesanan D LEFT JOIN jadwal_keberangkatan J ON D.id_jadwal = J.id_jadwal WHERE D.id_pesanan = '$data[id_pesanan]'");
        if($detail->num_rows>0){
            $n = 0;
            $total_harga = 0;
            $kursi = '';
            while ($data2 = $detail->fetch_assoc()) {
                $total_harga = $total_harga + $data2['harga_tiket'];
                $kursi = $kursi." ".$data2['no_kursi'];
                $n++;
            }
            $pdf->Cell(15,6,$n,0,0,'C');
            $pdf->Cell(15,6,$kursi,0,0,'R');
            $pdf->Cell(25,6,$total_harga,0,1,'R');
        }
        else{
            $pdf->Cell(15,6,'',0,0,'C');
            $pdf->Cell(15,6,'',0,0,'R');
            $pdf->Cell(25,6,'0',0,1,'R');
        }
        $i++;
    }
}
$pdf->Output();
?>