<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Alternatif extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->page->setTitle('Alternatif');
        $this->load->model('MKriteria');
        $this->load->model('MSubKriteria');
        $this->load->model('MAlternatif');
        $this->load->model('MNilai');
        $this->page->setLoadJs('assets/js/alternatif');
    }

    public function index()
    {
        $data['alternatif'] = $this->MAlternatif->getAll();
        $this->template->load("template","alternatif/index",$data);
    }

    public function tambah($id = null)
    {

        if ($id == null) {
            if (count($_POST)) {
                $this->form_validation->set_rules('alternatif', '', 'trim|required');
                if ($this->form_validation->run() == false) {
                    $errors = $this->form_validation->error_array();
                    $this->session->set_flashdata('errors', $errors);
                    redirect(current_url());
                } else {

                    $alternatif = $this->input->post('alternatif');
                    $nilai = $this->input->post('nilai');

                    $this->MAlternatif->alternatif = $alternatif;
                    if ($this->MAlternatif->insert() == true) {
                        $success = false;
                        $kdAlternatif = $this->MAlternatif->getLastID()->kdAlternatif;
                        foreach ($nilai as $item => $value) {
                            $this->MNilai->kdAlternatif = $kdAlternatif;
                            $this->MNilai->kdKriteria = $item;
                            $this->MNilai->nilai = $value;
                            if ($this->MNilai->insert()) {
                                $success = true;
                            }
                        }
                        if ($success == true) {
                            $this->session->set_flashdata('message', 'Berhasil menambah data :)');
                            redirect('alternatif');
                        } else {
                            echo 'gagal';
                        }
                    }
                }
                //-----
            }else{
                $data['dataView'] = $this->getDataInsert();
                $this->template->load('template','alternatif/tambah',$data);
            }
        }else{
            if(count($_POST)){
                $kdAlternatif = $this->uri->segment(3,0);
                dump($kdAlternatif);
                if($kdAlternatif > 0){
                    $alternatif = $this->input->post('alternatif');
                    $nilai = $this->input->post('nilai');
                    $where = array('kdAlternatif' => $kdAlternatif);
                    $this->MAlternatif->alternatif = $alternatif;
                    dump($alternatif);
                    if($this->MAlternatif->update($where) == true){
                        $success = false;
                        foreach ($nilai as $item => $value) {
                            $this->MNilai->kdAlternatif = $kdAlternatif;
                            $this->MNilai->kdKriteria = $item;
                            $this->MNilai->nilai = $value;
                            if ($this->MNilai->update()) {
                                $success = true;
                            }
                        }
                        if ($success == true) {
                            $this->session->set_flashdata('message', 'Berhasil mengubah data :)');
                            redirect('alternatif');
                        } else {                            
                            redirect('alternatif');
                        }
                    }
                }
            }
            $data['dataView'] = $this->getDataInsert();
            $data['nilaiAlternatif'] = $this->MNilai->getNilaiByAlternatif($id);
            
            
            $this->template->load('template','alternatif/tambah', $data);
        }

    }

    private function getDataInsert()
    {
        $dataView = array();
        $kriteria = $this->MKriteria->getAll();
        foreach ($kriteria as $item) {
            $this->MSubKriteria->kdKriteria = $item->kdKriteria;
            $dataView[$item->kdKriteria] = array(
                'nama' => $item->kriteria,
                'data' => $this->MSubKriteria->getById()
            );
        }

        return $dataView;
    }

    public function delete($id)
    {
        if($this->MNilai->delete($id) == true){
            if($this->MAlternatif->delete($id) == true){
                $this->session->set_flashdata('message','Berhasil menghapus data :)');
                echo json_encode(array("status" => 'true'));
            }
        }
    }
}