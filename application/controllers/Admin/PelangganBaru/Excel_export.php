<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel_export extends CI_Controller
{

    public function export()
    {
        // Panggil data pelanggan menggunakan model atau query langsung
        $customers = $this->DataPelanggan->DataPelangganNew(); // Ganti dengan model dan method Anda

        // Load library PHPExcel
        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet

        $sheet = $spreadsheet->getActiveSheet();

        // Set judul kolom
        $sheet->setCellValue('A1', 'ID Customer');
        $sheet->setCellValue('B1', 'Paket');
        $sheet->setCellValue('C1', 'Nama Customer');
        $sheet->setCellValue('D1', 'NIK Customer');
        $sheet->setCellValue('E1', 'Alamat Customer');
        $sheet->setCellValue('F1', 'Telepon Customer');
        $sheet->setCellValue('G1', 'Kelurahan');
        $sheet->setCellValue('H1', 'Kecamatan');
        $sheet->setCellValue('I1', 'Kota');
        $sheet->setCellValue('J1', 'Tanggal');
        $sheet->setCellValue('K1', 'Status');

        // Populate data
        $row = 2;
        foreach ($customers as $customer) {
            $sheet->setCellValue('A' . $row, $customer['id_customer']);
            $sheet->setCellValue('B' . $row, $customer['paket']);
            $sheet->setCellValue('C' . $row, $customer['nama_customer']);
            $sheet->setCellValue('D' . $row, $customer['nik_customer']);
            $sheet->setCellValue('E' . $row, $customer['alamat_customer']);
            $sheet->setCellValue('F' . $row, $customer['tlp_customer']);
            $sheet->setCellValue('G' . $row, $customer['nama_kelurahan']);
            $sheet->setCellValue('H' . $row, $customer['nama_kecamatan']);
            $sheet->setCellValue('I' . $row, $customer['nama_kota']);
            $sheet->setCellValue('J' . $row, $customer['tanggal']);
            $sheet->setCellValue('K' . $row, $customer['status']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet); // instantiate Xlsx

        $filename = 'customers'; // set filename for excel file to be exported

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();

        $writer->save('php://output');    // download file 
        exit();
    }
}
