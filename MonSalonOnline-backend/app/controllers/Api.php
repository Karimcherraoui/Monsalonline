<?php
// header('Content-Type: application/json');
// header('Access-Control-Allow-Methods: POST,GET,PATCH,PUT,DELET ');
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
// header("Access-Control-Allow-Origin: *");


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
        // var_dump($data->refernece);

        if ($data !== null && property_exists($data, "refernece")) {
            $client = $this->clientModel->getClientByreference($data->refernece);

            echo json_encode([
                "clientId" => $client[0]->id,
            ]);
        } else {
            echo json_encode([
                "client" => false,
            ]);
        }
    }
    public function getAllClient()
    {

        $this->header->init("GET");
        $client = $this->clientModel->getAllClient();
        echo json_encode([
            "message" => "all client",
            "ListClients" => ($client),
        ]);
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

            $client =  $this->clientModel->getClientByreference($data->reference);
            echo json_encode([
                "status" => $client,
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
        // id_client, jour, heure, date ,statut)
        $this->header->init("POST");
        $data = json_decode(file_get_contents("php://input"));
        if ($this->clientModel->verifyClientById($data->id_client)) {
            $this->rdvModel->add($data->id_client, $data->jour, $data->heure, $data->date, $data->statut);
            echo json_encode([
                "message" => "appointment created for client with id:$data->id_client",
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
    public function allRdv()
    {
        $this->header->init("GET");
        $result = $this->rdvModel->allRdv();

        echo json_encode([
            "message" => "all rendez-vous !",
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
