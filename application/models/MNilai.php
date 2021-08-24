<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:53
 */
class MNilai extends CI_Model{

    public $kdAlternatif;
    public $kdKriteria;
    public $nilai;

    public function __construct(){
        parent::__construct();
    }

    private function getTable()
    {
        return 'nilai';
    }

    private function getData()
    {
        $data = array(
            'kdAlternatif' => $this->kdAlternatif,
            'kdKriteria' => $this->kdKriteria,
            'nilai' => $this->nilai
        );

        return $data;
    }

    public function insert()
    {
        $status = $this->db->insert($this->getTable(), $this->getData());
        return $status;
    }

    public function getNilaiByAlternatif($id)
    {                                                                                                                                         
        $sql = 'select u.kdAlternatif, u.alternatif, k.kdKriteria, k.kriteria ,n.nilai from alternatif u, nilai n, kriteria k, subkriteria sk where u.kdAlternatif = n.kdAlternatif AND k.kdKriteria = n.kdKriteria and k.kdKriteria = sk.kdKriteria and u.kdAlternatif = '.$id.' GROUP by n.nilai ';
        $query = $this->db->query($sql);
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $nilai[] = $row;
            }

            return $nilai;
        }
    }

    public function getNilaiAlternatif()
    {
        $sql = 'select u.kdAlternatif, u.alternatif, k.kdKriteria, k.kriteria ,n.nilai from alternatif u, nilai n, kriteria k where u.kdAlternatif = n.kdAlternatif AND k.kdKriteria = n.kdKriteria ';
        $query = $this->db->query($sql);
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $nilai[] = $row;
            }

            return $nilai;
        }
    }

    public function update()
    {
        $data = array('nilai' => $this->nilai);
        $this->db->where('kdAlternatif', $this->kdAlternatif);
        $this->db->where('kdKriteria', $this->kdKriteria);
        $this->db->update($this->getTable(), $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('kdAlternatif', $id);
        return $this->db->delete($this->getTable());
    }
}