<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

$this->fpdf->FPDF("P", "cm", 'A4');
$this->fpdf->SetMargins(1, 0.5, 1);
$this->fpdf->SetAutoPageBreak(true, 1);

$this->fpdf->Open();
$this->fpdf->AliasNbPages();

$this->fpdf->AddPage();
$logo = config('logo') == '' ? 'assets/images/logo.jpg' : 'assets/images/'.config('logo');
$this->fpdf->Image($logo, 1.2 ,0.5 ,2 ,2);

$this->fpdf->SetX(4);
$this->fpdf->SetFont('Helvetica','B',11);
$this->fpdf->Cell(15,0.5, strtoupper(config('nama_sekolah')), 0, 0, 'C');

$this->fpdf->Ln();
$this->fpdf->SetX(4);
$this->fpdf->Cell(15,0.5, config('akreditasi'), 0, 0, 'C');

$this->fpdf->Ln();
$this->fpdf->SetX(4);
$this->fpdf->SetFont('helvetica','',9);
$this->fpdf->Cell(15,0.5, config('alamat'), 0, 0, 'C');

$this->fpdf->Ln();
$this->fpdf->SetX(4);
$this->fpdf->Cell(15,0.5, 'Email : ' . config('email') . ' Website : '. config('website'), 0, 0, 'C');

$this->fpdf->Line(1,2.7,20,2.7);
$this->fpdf->Line(1,2.75,20,2.75);

if ($query['photo'] != '' && file_exists('assets/photo/'.$query['photo']))
{
    $this->fpdf->Image('assets/photo/'.$query['photo'], 17, 3.5, 3, 4);
}
else
{
    $this->fpdf->Ln();
    $this->fpdf->SetY(3.5);
    $this->fpdf->SetX(17);
    $this->fpdf->SetFont('Helvetica','',10);
    $this->fpdf->MultiCell(3,4,'3 x 4',1,'C');
}
   
$this->fpdf->SetXY(1, 3.3);
$this->fpdf->SetFont('Helvetica','B',10);
$this->fpdf->Cell(15,0.7,'FORMULIR PENERIMAAN PESERTA DIDIK BARU TAHUN ' . config('ppdb_tahun'), 0, 0, 'L');

$this->fpdf->Ln(1);   
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','B',10);
$this->fpdf->Cell(15, 0.7, 'DATA PENDAFTARAN', 0, 0, 'L');

$this->fpdf->Ln(0.7);
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(5 ,0.5, 'Nomor Pendaftaran',0,'LR', 'L');
$this->fpdf->Cell(0.3 ,0.5, ':' ,0,'LR', 'L');
$this->fpdf->Cell(9.7 ,0.5, $query['no_daftar'], 0, 'LR', 'L');

$this->fpdf->Ln(0.7);
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(5 ,0.5, 'Jalur Pendaftaran',0,'LR', 'L');
$this->fpdf->Cell(0.3 ,0.5, ':' ,0,'LR', 'L');
$this->fpdf->Cell(9.7 ,0.5, jalur($query['jalur_id']), 0, 'LR', 'L');

$this->fpdf->Ln(0.7);
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(5 ,0.5, 'Pilihan I',0,'LR', 'L');
$this->fpdf->Cell(0.3 ,0.5, ':' ,0,'LR', 'L');
$this->fpdf->Cell(9.7 ,0.5, $query['pilihan_1'], 0, 'LR', 'L');

$this->fpdf->Ln(0.7);
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(5 ,0.5, 'Pilihan II',0,'LR', 'L');
$this->fpdf->Cell(0.3 ,0.5, ':' ,0,'LR', 'L');
$this->fpdf->Cell(9.7 ,0.5, $query['pilihan_2'], 0, 'LR', 'L');

$this->fpdf->Ln(0.7);
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(5 ,0.5, 'Tanggal Pendaftaran',0,'LR', 'L');
$this->fpdf->Cell(0.3 ,0.5, ':' ,0,'LR', 'L');
$this->fpdf->Cell(9.7 ,0.5, indo_date($query['tgl_daftar']), 0, 'LR', 'L');

$this->fpdf->Ln(1);   
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','B',10);
$this->fpdf->Cell(15, 0.7, 'DATA CALON SISWA', 0, 0, 'L');

$this->fpdf->Ln(0.7);   
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(5 ,0.5, 'Nama',0,'LR', 'L');
$this->fpdf->Cell(0.3 ,0.5, ':' ,0,'LR', 'L');
$this->fpdf->Cell(9.7 ,0.5, $query['nama'], 0, 'LR', 'L');

$this->fpdf->Ln(0.7);   
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(5 ,0.5, 'Alamat',0,'LR', 'L');
$this->fpdf->Cell(0.3 ,0.5, ':' ,0,'LR', 'L');
$this->fpdf->MultiCell(10 ,0.5, $query['alamat']);

$this->fpdf->Ln(0.1);   
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(5 ,0.5, 'Tempat Lahir',0,'LR', 'L');
$this->fpdf->Cell(0.3 ,0.5, ':' ,0,'LR', 'L');
$this->fpdf->Cell(9.7 ,0.5, $query['tmp_lahir'], 0, 'LR', 'L');

$this->fpdf->Ln(0.7);   
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(5 ,0.5, 'Tanggal Lahir',0,'LR', 'L');
$this->fpdf->Cell(0.3 ,0.5, ':' ,0,'LR', 'L');
$this->fpdf->Cell(9.7 ,0.5, indo_date($query['tgl_lahir']), 0, 'LR', 'L');

$this->fpdf->Ln(0.7);   
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(5 ,0.5, 'Jenis Kelamin',0,'LR', 'L');
$this->fpdf->Cell(0.3 ,0.5, ':' ,0,'LR', 'L');
$jns_kelamin = $query['jns_kelamin'] == 'P' ? 'Laki-laki' : 'Perempuan';
$this->fpdf->Cell(9.7 ,0.5, $jns_kelamin, 0, 'LR', 'L');

$this->fpdf->Ln(0.7);   
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(5 ,0.5, 'Agama',0,'LR', 'L');
$this->fpdf->Cell(0.3 ,0.5, ':' ,0,'LR', 'L');
$this->fpdf->Cell(9.7 ,0.5, agama($query['agama']), 0, 'LR', 'L');
   
$this->fpdf->Ln(0.7);   
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(5 ,0.5, 'Nomor Telpon',0,'LR', 'L');
$this->fpdf->Cell(0.3 ,0.5, ':' ,0,'LR', 'L');
$this->fpdf->Cell(9.7 ,0.5, $query['telp'], 0, 'LR', 'L');

$this->fpdf->Ln(0.7);   
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(5 ,0.5, 'Email',0,'LR', 'L');
$this->fpdf->Cell(0.3 ,0.5, ':' ,0,'LR', 'L');
$this->fpdf->Cell(9.7 ,0.5, $query['email'], 0, 'LR', 'L');

$this->fpdf->Ln(1);   
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','B',10);
$this->fpdf->Cell(15, 0.7, 'DATA SEKOLAH', 0, 0, 'L');

$this->fpdf->Ln(0.7);   
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(5 ,0.5, 'Asal Sekolah',0,'LR', 'L');
$this->fpdf->Cell(0.3 ,0.5, ':' ,0,'LR', 'L');
$this->fpdf->Cell(9.7 ,0.5, $query['asal_sekolah'], 0, 'LR', 'L');

$this->fpdf->Ln(1);   
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','B',10);
$this->fpdf->Cell(15, 0.7, 'DATA ORANG TUA / WALI', 0, 0, 'L');

$this->fpdf->Ln(0.7);
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(5 ,0.5, 'Nama',0,'LR', 'L');
$this->fpdf->Cell(0.3 ,0.5, ':' ,0,'LR', 'L');
$this->fpdf->Cell(9.7 ,0.5, $query['nama_ortu'], 0, 'LR', 'L');

$this->fpdf->Ln(0.7);
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(5 ,0.5, 'Pekerjaan',0,'LR', 'L');
$this->fpdf->Cell(0.3 ,0.5, ':' ,0,'LR', 'L');
$this->fpdf->Cell(9.7 ,0.5, $query['pk_nama'], 0, 'LR', 'L');

$this->fpdf->Ln(0.7);   
$this->fpdf->SetX(1);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(5 ,0.5, 'Nomor Telpon',0,'LR', 'L');
$this->fpdf->Cell(0.3 ,0.5, ':' ,0,'LR', 'L');
$this->fpdf->Cell(9.7 ,0.5, $query['telp_ortu'], 0, 'LR', 'L');

$this->fpdf->Ln(2);   
$this->fpdf->SetX(13);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(14 ,0.5, config('kota') . ', '.indo_date(date('Y-m-d')),0,'LR', 'L');

$this->fpdf->Ln(0.7);   
$this->fpdf->SetX(13);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(14 ,0.5, 'Calon Siswa',0,'LR', 'L');

$this->fpdf->Ln(2);   
$this->fpdf->SetX(13);
$this->fpdf->SetFont('Helvetica','',10);
$this->fpdf->Cell(14 ,0.5, $query['nama'],0,'LR', 'L');

$this->fpdf->Ln();
$this->fpdf->SetY(-1.5); 
$this->fpdf->SetFont('Arial','',8);
$this->fpdf->Cell(9.5,  0.3 ,'Copyright [c] '.date('Y').' PPDB Online by http://websitesekolahgratis.web.id',0,'LR','L');  
$this->fpdf->Cell(9.5,  0.3 ,'Printed on : '.date('d/m/Y H:i').'',0,'LR','R');   
   
$this->fpdf->Output($query['no_daftar'].'pdf','I');
?>