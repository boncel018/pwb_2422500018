<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir18_controller extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_admin_logged_in();
        $this->load->model('ongkir18_model');
        $this->load->library('form_validation');
    }
    
    public function index() {
        $data['list_ongkir18'] = $this->ongkir18_model->get_all();
        $this->load->view('administrator/templates/header');
        $this->load->view('administrator/templates/sidebar');
        $this->load->view('administrator/ongkir18/index', $data);
        $this->load->view('administrator/templates/footer');
    }

    public function tambah_ongkir18()
    {
        $data['title'] = 'Tambah Ongkir18';

        $this->form_validation->set_rules('nama_ekspedisi018', 'Nama Ongkir18', 'required');
        if ($this->form_validation->run() !== FALSE) {
            $this->__simpan_ongkir18();
        } else {
            $this->load->view('administrator/templates/header', $data);
            $this->load->view('administrator/templates/sidebar');
            $this->load->view('administrator/ongkir18/tambah_ongkir18');
            $this->load->view('administrator/templates/footer');
        }
    }

    private function __simpan_ongkir18()
    {
        $data = [
            'nama_ekspedisi018' => ucwords($this->input->post('nama_ekpedisi018')),
            'jenis_layanan018' => ucfirst($this->input->post('jenis_layanan018')),
            'tarif_per_kg018' => ucfirst($this->input->post('tarif_per_kg018')),
            'status018' => ucfirst($this->input->post('status018'))
        ];
        $simpan = $this->ongkir18_model->tambah($data);
        if ($simpan) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    Berhasil menambahkan ongkir18!!
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        Gagal menambahkan ongkir18!!
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
        }
        redirect('admin/ongkir18');
    }

    public function hapus_ongkir18($id)
{
    // check apakah ada ongkir18
    $ongkir18 = $this->ongkir18_model->get_by_id($id);
    if ($ongkir18) {
        $hapus = $this->ongkir18_model->hapus($id);
        if ($hapus) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        Berhasil menghapus ongkir18!!
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        Gagal menghapus ongkir18!!
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
        }
        redirect('admin/ongkir18');
    } else {
        $this->session->set_flashdata('message', '
            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    Ongkir18 tidak ditemukan!!
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('admin/ongkir18');
    }
}

public function ubah_ongkir18($id)
    {
        // check dulu apakah id dengan ongkir18 ada?
        $ongkir18 = $this->ongkir18_model->get_by_id($id);
        if ($ongkir18) {
            $this->form_validation->set_rules('nama_ekspedisi018', 'Nama Ekspedisi18', 'required');
            if ($this->form_validation->run() !== FALSE) {
                $this->__ubah_ongkir18($id);
            } else {
                $data['title'] = 'Ubah Ongkir18';
                $data['ongkir18'] = $ongkir18;
                $this->load->view('administrator/templates/header', $data);
                $this->load->view('administrator/templates/sidebar');
                $this->load->view('administrator/ongkir18/ubah_ongkir18', $data);
                $this->load->view('administrator/templates/footer');
            }
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show"
                role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    ongkir18 tidak ditemukan!!
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect('admin/ongkir18');
        }
    }
    private function __ubah_ongkir18($id)
    {
        $data = [
            'nama_ekspedisi018' => ucwords($this->input->post('nama_ekspedisi018')),
            'jenis_layanan018' => ucfirst($this->input->post('jenis_layanan018')),
            'tarif_per_kg018' => ucfirst($this->input->post('tarif_per_kg018')),
            'status018' => ucfirst($this->input->post('status018'))
        ];
        $ubah = $this->ongkir18_model->ubah($data, $id);
        if ($ubah) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show"
                role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    Berhasil menambahkan ongkir18!!
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show"
                role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    Gagal menambahkan ongkir18!!
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
        }
        redirect('admin/ongkir18');
    }
}