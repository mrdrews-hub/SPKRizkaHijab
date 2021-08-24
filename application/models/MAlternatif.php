<?php

class MAlternatif extends CI_Model{

    public $kdAlternatif;
    public $alternatif;

    public function __construct(){
        parent::__construct();
    }

    private function getTable(){
        return 'alternatif';
    }

    private function getData(){
        $data = array(
            'alternatif' => $this->alternatif
        );

        return $data;
    }

    public function getAll()
    {
        $alternatif = array();
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $alternatif[] = $row;
            }
        }
        return $alternatif;
    }


    public function insert()
    {
        $this->db->insert($this->getTable(), $this->getData());
        return $this->db->insert_id();
    }

    public function update($where)
    {
        $status = $this->db->update($this->getTable(), $this->getData(), $where);
        return $status;

    }

    public function delete($id)
    {
        $this->db->where('kdAlternatif', $id);
        return $this->db->delete($this->getTable());
    }

    public function getLastID(){
        $this->db->select('kdAlternatif');
        $this->db->order_by('kdAlternatif', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->getTable());
        return $query->row();
    }


}