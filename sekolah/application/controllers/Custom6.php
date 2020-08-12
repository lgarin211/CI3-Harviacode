<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Custom6 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Custom6_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', true));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'custom6/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'custom6/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'custom6/index.html';
            $config['first_url'] = base_url() . 'custom6/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = true;
        $config['total_rows'] = $this->Custom6_model->total_rows($q);
        $custom6 = $this->Custom6_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'custom6_data' => $custom6,
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
     
        $this->load->view('custom6/custom6_list', $data);
        $this->load->view('controlfoot');
    }

    public function read($id)
    {
        $row = $this->Custom6_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id' => $row->id,
        'status' => $row->status,
        'angka' => $row->angka,
        'teks' => $row->teks,
        );
       
        
        
            $this->load->view('custom6/custom6_read', $data);
            $this->load->view('controlfoot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('custom6'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('custom6/create_action'),
        'id' => set_value('id'),
        'status' => set_value('status'),
        'angka' => set_value('angka'),
        'teks' => set_value('teks'),
    );
   
    
    
    
    
    
    
        $this->load->view('controlfoot');
        $this->load->view('custom6/custom6_form', $data);
    }
    
    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = array(
        'status' => $this->input->post('status', true),
        'angka' => $this->input->post('angka', true),
        'teks' => $this->input->post('teks', true),
        );

            $this->Custom6_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('custom6'));
        }
    }
    
    public function update($id)
    {
        $row = $this->Custom6_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('custom6/update_action'),
        'id' => set_value('id', $row->id),
        'status' => set_value('status', $row->status),
        'angka' => set_value('angka', $row->angka),
        'teks' => set_value('teks', $row->teks),
        );
       
        
        
            $this->load->view('custom6/custom6_form', $data);
            $this->load->view('controlfoot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('custom6'));
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
        'angka' => $this->input->post('angka', true),
        'teks' => $this->input->post('teks', true),
        );

            $this->Custom6_model->update($this->input->post('id', true), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('custom6'));
        }
    }
    
    public function delete($id)
    {
        $row = $this->Custom6_model->get_by_id($id);

        if ($row) {
            $this->Custom6_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('custom6'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('custom6'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('angka', 'angka', 'trim|required');
        $this->form_validation->set_rules('teks', 'teks', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Custom6.php */
/* Location: ./application/controllers/Custom6.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-11 11:16:43 */
/* http://harviacode.com */
