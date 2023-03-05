<?php

class Api extends Controller
{

    private  $header;
    private $clientModel;
    private $rdvModel;
    private $outils;

    public function __construct()
    {
        $this->header = new Headers();
        $this->outils = new Utilities();
        $this->clientModel = $this->model('Client');
        $this->rdvModel = $this->model('Rdv');
    }

    public function index()
    {
        $this->header->init("GET");
        echo json_encode([
            "message" => "Test",
        ]);
    }

    public function createClient()
    {
        $this->header->init("POST");
        $data = json_decode(file_get_contents("php://input"));
        $reference = $this->outils->randomStrGenerator();
        $this->clientModel->add($data->prenom, $data->nom, $data->email, $data->phone, $reference);

        echo json_encode([
            "message" => "client created",
            "reference" => $reference,
        ]);
    }

    public function getClient()
    {
        $this->header->init("POST");
        $data = json_decode(file_get_contents("php://input"));
        $client = $this->clientModel->getClientByreference($data->reference);
        
    }

    public function editreference()
    {
        $this->header->init("PUT");
        $data = json_decode(file_get_contents("php://input"));
        $reference = $this->outils->randomStrGenerator();
        $this->clientModel->editreference($data->id, $reference);
        echo json_encode([
            "message" => "reference updated",
            "reference" => $reference,
        ]);
    }

    public function referenceAccess()
    {
        $this->header->init("POST");
        $data = json_decode(file_get_contents("php://input"));
        if ($this->clientModel->verifyreference($data->reference)) {
            
            echo json_encode([
                "client" => $this->clientModel->getClientByreference($data->reference),
            ]);
        } 
    }


    public function editClient()
    {
        $this->header->init("PUT");
        $data = json_decode(file_get_contents("php://input"));
        //$reference = $this->outils->randomStrGenerator();
        $this->clientModel->edit($data->prenom, $data->nom, $data->email, $data->phone, $data->reference);
        echo json_encode([
            "message" => "client updated",
        ]);
    }

    public function addRdv()
    {
        $this->header->init("POST");
        $data = json_decode(file_get_contents("php://input"));
        if ($this->clientModel->verifyreference($data->reference)) {
            $this->rdvModel->add($data->id, $data->date, $data->hour);
            echo json_encode([
                "message" => "appointment created for user with id:$data->id",
            ]);
        }
    }

    public function editRdv()
    {
        $this->header->init("PUT");
        $data = json_decode(file_get_contents("php://input"));
        $this->rdvModel->edit($data->id, $data->date, $data->hour);
        echo json_encode([
            "message" => "appointment with id:$data->id was updated!",
        ]);
    }

    public function delete($id)
    {
        $this->header->init("DELETE");
        $this->rdvModel->deleteById($id);
        echo json_encode([
            "message" => "rendez-vous with id:$id was deleted!",
        ]);
    }

    public function all($id)
    {
        $this->header->init("GET");
        $result = $this->rdvModel->all($id);

        echo json_encode([
            "message" => "all rendez-vous for client(id:$id)!",
            "appointments" => ($result),
        ]);
    }

    public function getRdvByDate()
    {
        $this->header->init("POST");
        $data = json_decode(file_get_contents("php://input"));
        if (!$data->date) {
            echo json_encode([
                "message" => "please provide a date",
            ]);
        } else {
            $result = $this->rdvModel->getByDate($data->date);
            echo json_encode([
                "appointments" => $result,
            ]);
        }
    }
}
