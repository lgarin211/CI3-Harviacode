<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Item extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', true));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'item/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'item/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'item/index.html';
            $config['first_url'] = base_url() . 'item/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = true;
        $config['total_rows'] = $this->Item_model->total_rows($q);
        $item = $this->Item_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'item_data' => $item,
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
        
        $this->load->view('item/item_list', $data);
        
        $this->load->view('controlfoot');
    }

    public function read($id)
    {
        $row = $this->Item_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id' => $row->id,
        'status' => $row->status,
        'link' => $row->link,
        'name' => $row->name,
        );
   
    
            // Untuk memanggil fungsi2 untuk berinteraksi kedalam database (CRUD)
            $this->load->model('MSudi');
            // Untuk memanggil nama table dan seleksi pada saat pemanggilan data
            $itms = $this->MSudi->GetDataWhere('item', 'status', 1);
            // Untuk menjalankan fungsi Getcooking dan membuat data array kedalam templates/halaman website
            $data['Getitm'] = $itms->result();
            // Untuk memanggil atau menjalankan layout/file tampilan dan memasukan data array

            $this->load->view('controlhead', $data);
    
            $this->load->view('item/item_read', $data);
            $this->load->view('controlfoot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('item'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('item/create_action'),
        'id' => set_value('id'),
        'status' => set_value('status'),
        'link' => set_value('link'),
        'name' => set_value('name'),
    );
    

        // Untuk memanggil fungsi2 untuk berinteraksi kedalam database (CRUD)
        $this->load->model('MSudi');
        // Untuk memanggil nama table dan seleksi pada saat pemanggilan data
        $itms = $this->MSudi->GetDataWhere('item', 'status', 1);
        // Untuk menjalankan fungsi Getcooking dan membuat data array kedalam templates/halaman website
        $data['Getitm'] = $itms->result();
        // Untuk memanggil atau menjalankan layout/file tampilan dan memasukan data array

        $this->load->view('controlhead', $data);


    
        $this->load->view('item/item_form', $data);
        $this->load->view('controlfoot');
    }
    
    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = array(
        'status' => $this->input->post('status', true),
        'link' => $this->input->post('link', true),
        'name' => $this->input->post('name', true),
        );

            $this->Item_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('item'));
        }
    }
    
    public function update($id)
    {
        $row = $this->Item_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('item/update_action'),
        'id' => set_value('id', $row->id),
        'status' => set_value('status', $row->status),
        'link' => set_value('link', $row->link),
        'name' => set_value('name', $row->name),
        );
   
    
            // Untuk memanggil fungsi2 untuk berinteraksi kedalam database (CRUD)
            $this->load->model('MSudi');
            // Untuk memanggil nama table dan seleksi pada saat pemanggilan data
            $itms = $this->MSudi->GetDataWhere('item', 'status', 1);
            // Untuk menjalankan fungsi Getcooking dan membuat data array kedalam templates/halaman website
            $data['Getitm'] = $itms->result();
            // Untuk memanggil atau menjalankan layout/file tampilan dan memasukan data array

            $this->load->view('controlhead', $data);
    
            $this->load->view('item/item_form', $data);
            $this->load->view('controlfoot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('item'));
        }
    }
    
    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('id', true));
        } else {
            $data = array(
        'status' => $this->input->post('status', true),
        'link' => $this->input->post('link', true),
        'name' => $this->input->post('name', true),
        );

            $this->Item_model->update($this->input->post('id', true), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('item'));
        }
    }
    
    public function delete($id)
    {
        $row = $this->Item_model->get_by_id($id);

        if ($row) {
            $this->Item_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('item'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('item'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('link', 'link', 'trim|required');
        $this->form_validation->set_rules('name', 'name', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Item.php */
/* Location: ./application/controllers/Item.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-12 04:32:29 */
/* http://harviacode.com */
