<?php 
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Guzzle_model extends CI_model {
    private $_client;

    public function __construct()
    {
        $userID = $this->session->userdata('id_user');
        $token = $this->session->userdata('token');

        $this->_client = new Client([
            'base_uri' => 'localhost/agendaapi/index.php/',
            'headers' => [
                'Client-Service' => 'frontend-client',
                'Auth-Key' => 'simplerestapi',
                'Content-Type' => 'application/json',
                'User-ID' => $userID,
                'Authorization' => $token
               ]
        ]);
    }

    // Model User
    public function getAllUser()
    {
        $response = $this->_client->request('GET', 'User');
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function getUserById($id)
    {
        $response = $this->_client->request('GET', 'User/detail/' . $id);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function createUser($data)
    {
        $response = $this->_client->request('POST', 'User/create', [
            'json' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function updateUser($id, $data)
    {
        $response = $this->_client->request('PUT', 'User/update/' . $id, [
            'json' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function deleteUser($id)
    {
        $response = $this->_client->request('DELETE', 'User/delete/' . $id);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

     // Model Agenda
    public function getAllAgenda()
    {
        $response = $this->_client->request('GET', 'Agenda');
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function getAgendaByTanggal($tgl)
    {
        $response = $this->_client->request('GET', 'Agenda/agendaByTanggal/' . $tgl);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function getAgendaById($id)
    {
        $response = $this->_client->request('GET', 'Agenda/detail/' . $id);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function createAgenda($data)
    {
        $response = $this->_client->request('POST', 'Agenda/create', [
            'json' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function updateAgenda($id, $data)
    {
        $response = $this->_client->request('PUT', 'Agenda/update/' . $id, [
            'json' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function deleteAgenda($id)
    {
        $response = $this->_client->request('DELETE', 'Agenda/delete/' . $id);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    

    
}