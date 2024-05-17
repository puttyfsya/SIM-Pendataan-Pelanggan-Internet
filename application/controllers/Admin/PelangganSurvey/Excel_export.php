<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class Excel_export extends CI_Controller
{

    public function export()
    {
        // Panggil data pelanggan menggunakan model atau query langsung
        $customers = $this->SurveyPelanggan->DataPelangganSurveyNew(); // Ganti dengan model dan method Anda

        // Load library PhpSpreadsheet
        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet

        // Set ukuran kolom
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(15); // Nomer Urut
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Paket
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Nama Customer
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15); // NIK Customer
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(40); // Alamat Customer
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Telepon Customer
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Kelurahan
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20); // Kecamatan
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20); // Kota
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(20); // Tanggal
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(15); // Status

        // Tambahkan logo
        $logoPath = 'assets/images/logo/infly-logo.png'; // Ganti dengan path logo Anda
        $drawing = new Drawing();
        $drawing->setPath($logoPath);
        $drawing->setWidth(150); // Atur lebar gambar
        $drawing->setHeight(50); // Atur tinggi gambar
        $drawing->setCoordinates('A1');

        // Atur jarak antara gambar logo dan tepi sel
        $drawing->setOffsetX(10); // Atur jarak ke kanan
        $drawing->setOffsetY(10); // Atur jarak ke bawah

        $drawing->setWorksheet($spreadsheet->getActiveSheet());

        // Set judul kolom
        $spreadsheet->getActiveSheet()->setCellValue('C1', 'Laporan Data Pelanggan Infly Networks');
        $spreadsheet->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('C1')->getFont()->setSize(24);

        // Merge cells untuk judul
        $spreadsheet->getActiveSheet()->mergeCells('C1:K2');
        $spreadsheet->getActiveSheet()->mergeCells('A1:A3');

        // Set judul kolom
        $spreadsheet->getActiveSheet()->setCellValue('A5', 'No');
        $spreadsheet->getActiveSheet()->setCellValue('B5', 'Paket');
        $spreadsheet->getActiveSheet()->setCellValue('C5', 'Nama Customer');
        $spreadsheet->getActiveSheet()->setCellValue('D5', 'NIK Customer');
        $spreadsheet->getActiveSheet()->setCellValue('E5', 'Alamat Customer');
        $spreadsheet->getActiveSheet()->setCellValue('F5', 'Telepon Customer');
        $spreadsheet->getActiveSheet()->setCellValue('G5', 'Kelurahan');
        $spreadsheet->getActiveSheet()->setCellValue('H5', 'Kecamatan');
        $spreadsheet->getActiveSheet()->setCellValue('I5', 'Kota');
        $spreadsheet->getActiveSheet()->setCellValue('J5', 'Tanggal');
        $spreadsheet->getActiveSheet()->setCellValue('K5', 'Status');



        // Populate data
        $row = 6; // Mulai dari baris ke-5
        $nomor_urut = 1; // Inisialisasi nomor urut
        foreach ($customers as $customer) {
            $spreadsheet->getActiveSheet()->setCellValue('A' . $row, $nomor_urut);
            $spreadsheet->getActiveSheet()->setCellValue('B' . $row, $customer['paket']);
            $spreadsheet->getActiveSheet()->setCellValue('C' . $row, $customer['nama_customer']);
            $spreadsheet->getActiveSheet()->setCellValue('D' . $row, $customer['nik_customer']);
            $spreadsheet->getActiveSheet()->setCellValue('E' . $row, $customer['alamat_customer']);
            $spreadsheet->getActiveSheet()->setCellValue('F' . $row, $customer['tlp_customer']);
            $spreadsheet->getActiveSheet()->setCellValue('G' . $row, $customer['nama_kelurahan']);
            $spreadsheet->getActiveSheet()->setCellValue('H' . $row, $customer['nama_kecamatan']);
            $spreadsheet->getActiveSheet()->setCellValue('I' . $row, $customer['nama_kota']);
            $spreadsheet->getActiveSheet()->setCellValue('J' . $row, $customer['tanggal']);
            $spreadsheet->getActiveSheet()->setCellValue('K' . $row, $customer['status']);
            $row++;
            $nomor_urut++; // Tambahkan nomor urut
        }

        // Set border
        $spreadsheet->getActiveSheet()->getStyle('A5:K' . ($row - 1))->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        // $spreadsheet->getActiveSheet()->getStyle('A5:K' . ($row - 1))->getBorders()->getAllBorders()->getColor()->setARGB(Color::COLOR_RED);

        // / Mengatur warna latar belakang kolom
        $spreadsheet->getActiveSheet()->getStyle('A5:K5')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFE599'); // Warna kuning muda


        // Set header style
        $spreadsheet->getActiveSheet()->getStyle('A5:K5')->getFont()->setBold(true);

        // Set header/footer
        $filename = 'customers'; // set filename for excel file to be exported
        $spreadsheet->getActiveSheet()->getHeaderFooter()->setOddHeader('&C&G&"Times New Roman,Regular Bold"&16 ' . $filename);
        $spreadsheet->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&D&RPage &P of &N');

        $writer = new Xlsx($spreadsheet); // instantiate Xlsx

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();

        $writer->save('php://output');    // download file 
        exit();
    }
}
