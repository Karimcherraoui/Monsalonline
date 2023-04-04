<?php
class client
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


     //add clients by using his informations
     

    public function add($prenom, $nom, $email, $phone, $reference)
    {
        $this->db->query("INSERT INTO clients(prenom, nom, email, phone, reference) VALUES(:prenom, :nom, :email, :phone, :reference)");
        $this->db->bind(":prenom", $prenom);
        $this->db->bind(":nom", $nom);
        $this->db->bind(":email", $email);
        $this->db->bind(":phone", $phone);
        $this->db->bind(":reference", $reference);
        $this->db->execute();
    }


    //   edit clients reference by using his id
     

    public function editreference($id, $reference)
    {
        $this->db->query("UPDATE clients SET reference = :reference WHERE id = :id");
        $this->db->bind(":reference", $reference);
        $this->db->bind(":id", $id);
        $this->db->execute();
    }

    public function edit($prenom, $nom, $email, $phone, $reference)
    {
        $this->db->query("UPDATE clients SET prenom = :prenom, nom = :nom, email = :email, phone = :phone WHERE reference = :reference");
        $this->db->bind(":prenom", $prenom);
        $this->db->bind(":nom", $nom);
        $this->db->bind(":email", $email);
        $this->db->bind(":phone", $phone);
        $this->db->bind(":reference", $reference);
        $this->db->execute();
    }

    public function verifyreference($reference)
    {
        $this->db->query("SELECT * FROM clients WHERE reference LIKE :reference ");
        $this->db->bind(":reference", $reference);
        $this->db->execute();
        $row = $this->db->rowCount();
        if ($row)
            return true;
        else
            return false;
    }
    public function verifyClientById($id)
    {
        $this->db->query("SELECT * FROM clients WHERE id LIKE :id ");
        $this->db->bind(":id", $id);
        $this->db->execute();
        $row = $this->db->rowCount();
        if ($row)
            return true;
        else
            return false;
    }

    public function getClientByreference($reference)
    {
        $this->db->query("SELECT * FROM clients WHERE reference = :reference");
        $this->db->bind(":reference", $reference);
         return $this->db->resultSet();
    }

    public function getAllClient()
    {
        $this->db->query("SELECT * FROM clients ");
        return $this->db->resultSet();
    }
}
