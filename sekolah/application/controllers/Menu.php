<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', true));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'menu/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'menu/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'menu/index.html';
            $config['first_url'] = base_url() . 'menu/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = true;
        $config['total_rows'] = $this->Menu_model->total_rows($q);
        $menu = $this->Menu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'menu_data' => $menu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        
        
        
        
        // Untuk memanggil fungsi2 untuk berinteraksi kedalam database (CRUD)
        $this->load->model('MSudi');
        // Untuk memanggil nama table dan seleksi pada saat pemanggilan data
        $itms = $this->MSudi->GetDataWhere('item', 'status', 1);
        // Untuk menjalankan fungsi Getcooking dan membuat data array kedalam templates/halaman website
        $data['Getitm'] = $itms->result();
        // Untuk memanggil atau menjalankan layout/file tampilan dan memasukan data array

        $this->load->view('controlhead', $data);
        
        
        
        $this->load->view('menu/menu_list', $data);
    
        $this->load->view('controlfoot');
    }

    public function read($id)
    {
        $row = $this->Menu_model->get_by_id($id);
        if ($row) {
            $data = array(
        'kd_menu' => $row->kd_menu,
        'nama_menu' => $row->nama_menu,
        'status_menu' => $row->status_menu,
        );
            
        
        
        
            // Untuk memanggil fungsi2 untuk berinteraksi kedalam database (CRUD)
            $this->load->model('MSudi');
            // Untuk memanggil nama table dan seleksi pada saat pemanggilan data
            $itms = $this->MSudi->GetDataWhere('item', 'status', 1);
            // Untuk menjalankan fungsi Getcooking dan membuat data array kedalam templates/halaman website
            $data['Getitm'] = $itms->result();
            // Untuk memanggil atau menjalankan layout/file tampilan dan memasukan data array

            $this->load->view('controlhead', $data);
        
        
        
            $this->load->view('menu/menu_read', $data);
    
            $this->load->view('controlfoot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('menu/create_action'),
        'kd_menu' => set_value('kd_menu'),
        'nama_menu' => set_value('nama_menu'),
        'status_menu' => set_value('status_menu'),
    );
        
    
    
    
        // Untuk memanggil fungsi2 untuk berinteraksi kedalam database (CRUD)
        $this->load->model('MSudi');
        // Untuk memanggil nama table dan seleksi pada saat pemanggilan data
        $itms = $this->MSudi->GetDataWhere('item', 'status', 1);
        // Untuk menjalankan fungsi Getcooking dan membuat data array kedalam templates/halaman website
        $data['Getitm'] = $itms->result();
        // Untuk memanggil atau menjalankan layout/file tampilan dan memasukan data array

        $this->load->view('controlhead', $data);
    
    
    
        $this->load->view('menu/menu_form', $data);
        $this->load->view('controlfoot');
    }
    
    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = array(
        'nama_menu' => $this->input->post('nama_menu', true),
        'status_menu' => $this->input->post('status_menu', true),
        );

            $this->Menu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function update($id)
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('menu/update_action'),
        'kd_menu' => set_value('kd_menu', $row->kd_menu),
        'nama_menu' => set_value('nama_menu', $row->nama_menu),
        'status_menu' => set_value('status_menu', $row->status_menu),
        );
            
        
        
        
            // Untuk memanggil fungsi2 untuk berinteraksi kedalam database (CRUD)
            $this->load->model('MSudi');
            // Untuk memanggil nama table dan seleksi pada saat pemanggilan data
            $itms = $this->MSudi->GetDataWhere('item', 'status', 1);
            // Untuk menjalankan fungsi Getcooking dan membuat data array kedalam templates/halaman website
            $data['Getitm'] = $itms->result();
            // Untuk memanggil atau menjalankan layout/file tampilan dan memasukan data array

            $this->load->view('controlhead', $data);
        
        
        
            $this->load->view('menu/menu_form', $data);
    
            $this->load->view('controlfoot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }
    
    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('kd_menu', true));
        } else {
            $data = array(
        'nama_menu' => $this->input->post('nama_menu', true),
        'status_menu' => $this->input->post('status_menu', true),
        );

            $this->Menu_model->update($this->input->post('kd_menu', true), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function delete($id)
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $this->Menu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('menu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_menu', 'nama menu', 'trim|required');
        $this->form_validation->set_rules('status_menu', 'status menu', 'trim|required');

        $this->form_validation->set_rules('kd_menu', 'kd_menu', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-11 11:16:43 */
/* http://harviacode.com */
