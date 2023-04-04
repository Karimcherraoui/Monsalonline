<?php
class Rdv
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * add rdvs of the client by given the date and hour
     * @param mixed $id_client
     * @param mixed $date
     * @param mixed $hour
     * @return void
     */


    public function add($id_client, $jour, $heure, $date, $statut)
    {
        $this->db->query("INSERT INTO rdvs(id_client, jour, heure, date ,statut) VALUE(:id_client, :jour, :heure,:date,:statut)");
        $this->db->bind(":id_client", $id_client);
        $this->db->bind(":jour", $jour);
        $this->db->bind(":heure", $heure);
        $this->db->bind(":date", $date);
        $this->db->bind(":statut", $statut);
        $this->db->execute();
    }



    /**
     * delete rdvs by id
     * @param mixed $id
     * @return void
     */
    public function deleteById($id)
    {
        $this->db->query("DELETE FROM rdvs WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->execute();
    }

    /**
     * edit rdvs by giving the id of the the rdvs and the new date and hour
     * @param mixed $id
     * @param mixed $date
     * @param mixed $hour
     * @return void
     */
    public function edit($id, $date, $hour)
    {
        $this->db->query("UPDATE rdvs SET date = :date, hour = :hour WHERE id = :id");
        $this->db->bind(":date", $date);
        $this->db->bind(":hour", $hour);
        $this->db->bind(":id", $id);
        $this->db->execute();
    }

    /**
     * get all rdvs of a client
     * @param mixed $id
     * @return array
     */
    public function all($id)
    {
        $this->db->query("SELECT * FROM rdvs WHERE id_client = :id");
        $this->db->bind(":id", $id);
        return $this->db->resultSet();
    }
     public function allRdv()
    {
        $this->db->query("SELECT * FROM rdvs ");
        return $this->db->resultSet();
    }

    public function getByDate($date)
    {

        $this->db->query("SELECT * FROM rdvs WHERE date = :date");
        $this->db->bind(":date", $date);
        return $this->db->resultSet();
    }
}
