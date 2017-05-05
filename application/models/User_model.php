<?php
  class User_model extends CI_Model
  {
    private $pdo;

    public function __construct()
    {
      parent::__construct();
      $this->pdo = $this->load->database('pdo', true);
    }

    public function view()
    {
      $stmt = $this->pdo->query("SELECT * FROM tblnames");
      return $stmt->result();
    }

    public function retEdit($data)
    {
      extract($data);
      $selek = $this->pdo->query("SELECT * FROM tblnames WHERE id = $id ");
      return $selek->result();
    }

    public function insert($data)
    {
      extract($data);
      $sql = "INSERT INTO tblnames(fname,mname,lname) values(?,?,?)";
      $this->pdo->query($sql, array($fname, $mname, $lname));
      return true;
    }
    
    public function update($data)
    {
      extract($data);
      $sql = "UPDATE tblnames SET fname = ?, mname = ?, lname = ? WHERE id = ?";
      $this->pdo->query($sql, array($fname, $mname, $lname, $ids));
      return $data;
    }

    public function delete($data)
    {
      extract($data);
      $sql = "DELETE FROM tblnames WHERE id = ?";
      $this->pdo->query($sql, array($id));
      return true;
    }
  }
?>