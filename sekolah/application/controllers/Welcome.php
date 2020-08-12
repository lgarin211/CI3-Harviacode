<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function index()
    {
        // Untuk memanggil fungsi2 untuk berinteraksi kedalam database (CRUD)
        $this->load->model('MSudi');
        // Untuk memanggil nama table dan seleksi pada saat pemanggilan data
        $GetMenu = $this->MSudi->GetDataWhere('menu', 'status_menu', 1);
        // Untuk menjalankan fungsi GetMenu dan membuat data array kedalam templates/halaman website
        $data['GetMenu'] = $GetMenu->result();
        // Untuk memanggil atau menjalankan layout/file tampilan dan memasukan data array



        // Untuk memanggil fungsi2 untuk berinteraksi kedalam database (CRUD)
        $this->load->model('MSudi');
        // Untuk memanggil nama table dan seleksi pada saat pemanggilan data
        $GetBox = $this->MSudi->GetDataWhere('menu_box', 'status_box', 1);
        // Untuk menjalankan fungsi GetMenu dan membuat data array kedalam templates/halaman website
        $data['GetBox'] = $GetBox->result();
        // Untuk memanggil atau menjalankan layout/file tampilan dan memasukan data array

        // Untuk memanggil fungsi2 untuk berinteraksi kedalam database (CRUD)
        $this->load->model('MSudi');
        // Untuk memanggil nama table dan seleksi pada saat pemanggilan data
        $GetSiswa = $this->MSudi->GetDataWhere('custom1', 'status', 1);
        // Untuk menjalankan fungsi GetSiswa dan membuat data array kedalam templates/halaman website
        $data['GetSiswa'] = $GetSiswa->result();
        // Untuk memanggil atau menjalankan layout/file tampilan dan memasukan data array



        // Untuk memanggil fungsi2 untuk berinteraksi kedalam database (CRUD)
        $this->load->model('MSudi');
        // Untuk memanggil nama table dan seleksi pada saat pemanggilan data
        $GetPelajar = $this->MSudi->GetDataWhere('custom2', 'status', 1);
        // Untuk menjalankan fungsi GetSiswa dan membuat data array kedalam templates/halaman website
        $data['GetPelajar'] = $GetPelajar->result();
        // Untuk memanggil atau menjalankan layout/file tampilan dan memasukan data array



        // Untuk memanggil fungsi2 untuk berinteraksi kedalam database (CRUD)
        $this->load->model('MSudi');
        // Untuk memanggil nama table dan seleksi pada saat pemanggilan data
        $Getguru = $this->MSudi->GetDataWhere('custom3', 'status', 1);
        // Untuk menjalankan fungsi GetSiswa dan membuat data array kedalam templates/halaman website
        $data['Getguru'] = $Getguru->result();
        // Untuk memanggil atau menjalankan layout/file tampilan dan memasukan data array



        // Untuk memanggil fungsi2 untuk berinteraksi kedalam database (CRUD)
        $this->load->model('MSudi');
        // Untuk memanggil nama table dan seleksi pada saat pemanggilan data
        $Getcooking = $this->MSudi->GetDataWhere('custom4', 'status', 1);
        // Untuk menjalankan fungsi Getcooking dan membuat data array kedalam templates/halaman website
        $data['Getcooking'] = $Getcooking->result();
        // Untuk memanggil atau menjalankan layout/file tampilan dan memasukan data array



        // Untuk memanggil fungsi2 untuk berinteraksi kedalam database (CRUD)
        $this->load->model('MSudi');
        // Untuk memanggil nama table dan seleksi pada saat pemanggilan data
        $Geteat = $this->MSudi->GetDataWhere('custom5', 'status', 1);
        // Untuk menjalankan fungsi Getcooking dan membuat data array kedalam templates/halaman website
        $data['Geteat'] = $Geteat->result();
        // Untuk memanggil atau menjalankan layout/file tampilan dan memasukan data array


        // Untuk memanggil fungsi2 untuk berinteraksi kedalam database (CRUD)
        $this->load->model('MSudi');
        // Untuk memanggil nama table dan seleksi pada saat pemanggilan data
        $Getstreet = $this->MSudi->GetDataWhere('custom6', 'status', 1);
        // Untuk menjalankan fungsi Getcooking dan membuat data array kedalam templates/halaman website
        $data['Getstreet'] = $Getstreet->result();
        // Untuk memanggil atau menjalankan layout/file tampilan dan memasukan data array


        // Untuk memanggil fungsi2 untuk berinteraksi kedalam database (CRUD)
        $this->load->model('MSudi');
        // Untuk memanggil nama table dan seleksi pada saat pemanggilan data
        $GetNilai = $this->MSudi->GetDataWhere('nilai', 'status', 1);
        // Untuk menjalankan fungsi Getcooking dan membuat data array kedalam templates/halaman website
        $data['GetNilai'] = $GetNilai->result();
        // Untuk memanggil atau menjalankan layout/file tampilan dan memasukan data array
 

        $this->load->view('welcome_message', $data);
    }
    public function myCustom(Type $var = null)
    {
        // Untuk memanggil fungsi2 untuk berinteraksi kedalam database (CRUD)
        $this->load->model('MSudi');
        // Untuk memanggil nama table dan seleksi pada saat pemanggilan data
        $itms = $this->MSudi->GetDataWhere('item', 'status', 1);
        // Untuk menjalankan fungsi Getcooking dan membuat data array kedalam templates/halaman website
        $data['Getitm'] = $itms->result();
        // Untuk memanggil atau menjalankan layout/file tampilan dan memasukan data array

        $this->load->view('controlhead', $data);
        $this->load->view('profile');
        $this->load->view('controlfoot');
    }
}
