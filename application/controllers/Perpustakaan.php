<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Perpustakaan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Perpustakaan_model');
        $this->load->model('Prodi_model');
    }
    public function index(){
        $data['judul'] = "Halaman Review Buku";
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
        $data['perpustakaan']= $this->Perpustakaan_model->get();
        $data['prodi']= $this->Prodi_model->get();
        $this->load->view("layout/header",$data);
        $this->load->view("perpustakaan/vw_perpustakaan",$data);
        $this->load->view("layout/footer");
    }
    public function tambah(){
        $data['judul']="Halaman Tambah Review";
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
        $data['prodi']= $this->Prodi_model->get();
        $data['perpustakaan']= $this->Perpustakaan_model->get();
        $this->form_validation->set_rules('nama_reviewer','Nama Reviewer','required',[
            'required'=>'Nama Wajib diisi!'
        ]);
        $this->form_validation->set_rules('nim','NIM','required|integer',[
            'required'=>'NIM Wajib diisi!',
            'integer' => 'NIM harus Angka!'
        ]);
        $this->form_validation->set_rules('prodi','Prodi','required',[
            'required'=>'Prodi Wajib diisi!'
        ]);
        $this->form_validation->set_rules('judul_buku','Judul Buku','required',[
            'required'=>'Judul Buku Wajib diisi!'
        ]);
        $this->form_validation->set_rules('genre_buku','Genre','required',[
            'required'=>'Genre Wajib diisi!'
        ]);
        $this->form_validation->set_rules('review_buku','Review Buku','required',[
            'required'=>'Review Buku Wajib diisi!'
        ]);
        if ($this->form_validation->run()==false){
            $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
            $this->load->view("layout/header",$data);
            $this->load->view("perpustakaan/vw_tambah_review",$data);
            $this->load->view("layout/footer");
        } else{
            $data= [
                'nama_reviewer' => $this->input->post('nama_reviewer'),
                'nim' => $this->input->post('nim'),
                'prodi' => $this->input->post('prodi'),
                'judul_buku' => $this->input->post('judul_buku'),
                'genre_buku' => $this->input->post('genre_buku'),
                'review_buku' => $this->input->post('review_buku')
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/review/';
                $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
            $this->Perpustakaan_model->insert($data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Review Berhasil ditambah!</div>');
            redirect('Perpustakaan');
            }
        }
    }
    public function hapus($id){
        $this->Perpustakaan_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data
Review Berhasil Dihapus!</div>');
        redirect('Perpustakaan');
    }
}