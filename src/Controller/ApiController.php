<?php
namespace App\Controller;

use App\Controller\AppController;
use Carbon\Carbon;
use Cake\Log\Log;

/**
 * Api Controller
 *
 * @property \App\Model\Table\ApiTable $Api
 */
class ApiController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->RequestHandler->respondAs('json');
        $this->response->type('application/json');
        $this->autoRender = false;
        $this->Auth->allow(['authenticate', 'challenge', 'submission']);
    }

    public function authenticate(){
        $this->loadModel('Participants');
        if ($this->request->is('post')) 
        {
            $response = [];
            $data = $this->request->data;
            if ($this->Participants->verify($data['code'])){
                $response = $this->Participants->getAllFromRefCode($data['code']);
            }else{
                $response = ['error'=>'Reference code does not exist'];
            }
        }
        echo json_encode($response);
    }

    public function challenge(){
        $this->loadModel('Challenges');
        $response = [];
        $activeChallenge = $this->Challenges->getActiveChallenge();
        if ($activeChallenge){
            $response = [
                "id" => $activeChallenge->id,
                "title" => $activeChallenge->title,
                "limit" => $activeChallenge->time_limit,
                "passage" => $activeChallenge->paragraph
            ];
        }else{
            $response = ['error' => 'No challenge available at the momment!'];
        }
        echo json_encode($response);
    }

    public function submission(){
        $response = [];
        $this->loadModel('Perfomances');
        if ($this->request->is('post')){
            if($this->Perfomances->log($this->request->data)){
                $this->response->statusCode('201');
                $response = ['success' => 'Results saved!'];
            }else{
                $response = ['error' => 'Result submission error'];
            }
        }
        echo json_encode($response);
    }
}
