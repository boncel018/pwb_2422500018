<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir2422500018_controller extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_admin_logged_in();
        $this->load->model('Ongkir2422500018_model');
        $this->load->library('form_validation');
    }
    
    public function index() {
        $data['list_Ongkir2422500018'] = $this->Ongkir2422500018_model->get_all();
        $this->load->view('administrator/templates/header');
        $this->load->view('administrator/templates/sidebar');
        $this->load->view('administrator/Ongkir2422500018/index', $data);
        $this->load->view('administrator/templates/footer');
    }

    public function tambah_Ongkir2422500018()
    {
        $data['title'] = 'Tambah Ongkir2422500018';

        $this->form_validation->set_rules('nama_ongkir018', 'Nama Ongkir2422500018', 'required');
        if ($this->form_validation->run() !== FALSE) {
            $this->__simpan_Ongkir2422500018();
        } else {
            $this->load->view('administrator/templates/header', $data);
            $this->load->view('administrator/templates/sidebar');
            $this->load->view('administrator/Ongkir2422500018/tambah_Ongkir2422500018');
            $this->load->view('administrator/templates/footer');
        }
    }

    private function __simpan_Ongkir2422500018()
    {
        $data = [
            'nama_ongkir018' => ucwords($this->input->post('nama_ongkir018')),
            'jenis_layanan018' => ucfirst($this->input->post('jenis_layanan018')),
            'tarif_per_kg018' => ucfirst($this->input->post('tarif_per_kg018')),
            'status018' => ucfirst($this->input->post('status018'))
        ];
        $simpan = $this->Ongkir2422500018_model->tambah($data);
        if ($simpan) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    Berhasil menambahkan Ongkir2422500018!!
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
                        Gagal menambahkan Ongkir2422500018!!
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
        }
        redirect('admin/Ongkir2422500018');
    }

    public function hapus_Ongkir2422500018($id)
{
    // check apakah ada ongkir2422500018
    $ongkir2422500018 = $this->Ongkir2422500018_model->get_by_id($id);
    if ($Ongkir2422500018) {
        $hapus = $this->Ongkir2422500018_model->hapus($id);
        if ($hapus) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        Berhasil menghapus Ongkir2422500018!!
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
                        Gagal menghapus Ongkir2422500018!!
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
        }
        redirect('admin/Ongkir2422500018');
    } else {
        $this->session->set_flashdata('message', '
            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    Ongkir2422500018 tidak ditemukan!!
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('admin/Ongkir2422500018');
    }
}

public function ubah_Ongkir2422500018($id)
    {
        // check dulu apakah id dengan ongkir2422500018 ada?
        $ongkir2422500018 = $this->Ongkir2422500018_model->get_by_id($id);
        if ($Ongkir2422500018) {
            $this->form_validation->set_rules('nama_ongkir018', 'Nama Ongkir18', 'required');
            if ($this->form_validation->run() !== FALSE) {
                $this->__ubah_ongkir2422500018($id);
            } else {
                $data['title'] = 'Ubah Ongkir2422500018';
                $data['ongkir2422500018'] = $Ongkir2422500018;
                $this->load->view('administrator/templates/header', $data);
                $this->load->view('administrator/templates/sidebar');
                $this->load->view('administrator/Ongkir2422500018/ubah_Ongkir2422500018', $data);
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
                    Ongkir2422500018 tidak ditemukan!!
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect('admin/Ongkir2422500018');
        }
    }
    private function __ubah_Ongkir2422500018($id)
    {
        $data = [
            'nama_ongkir018' => ucwords($this->input->post('nama_ongkir018')),
            'alamat18' => ucfirst($this->input->post('alamat18')),
            'telepon18' => ucfirst($this->input->post('telepon18'))
        ];
        $ubah = $this->Ongkir2422500018_model->ubah($data, $id);
        if ($ubah) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show"
                role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    Berhasil menambahkan Ongkir2422500018!!
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
                    Gagal menambahkan Ongkir2422500018!!
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
        }
        redirect('admin/Ongkir2422500018');
    }
}