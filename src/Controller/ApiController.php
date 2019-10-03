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

    private function _submit($request, $response){
        $this->loadModel('Participants');
        try{
            $request = $request->data;
            if (array_key_exists('code', $request)){
                $code = $request['code'];
                Log::write('debug',__('Processing request for {0} with data: {1}', $code, json_encode($request)));
                if($this->Participants->verify($code)){
                    Log::write('debug', __('Request ok!, response {0}', json_encode($response)));
                    echo json_encode($response);
                    return;
                }
            }
            Log::write('debug', __('Invalid reference code! Unable to process request {0}. ', json_encode($request)));
            $this->response->statusCode(404);
        }catch(\Exception $error){
            Log::write('debug', __('Error occured during request {0}: {1}', json_encode($request), $error->getMessage()));
            echo json_encode(['error' => 'An error has occured while processing request']);
        }
    }

    public function authenticate(){
        $this->loadModel('Participants');
        if ($this->request->is('post')) 
        {
            Log::write('debug', 'Authenticating reference code...');
            $this->_submit(
                $this->request, 
                $this->Participants->getAllFromRefCode(
                    $this->request->data['code']
                )
            );
        }
    }

    public function challenge(){
        Log::write('debug', 'Requesting active challenge...');
        if ($this->request->is('post')){
            $this->loadModel('Challenges');
            $response = [];
            $activeChallenge = $this->Challenges->getActiveChallenge();
            if ($activeChallenge){
                $this->_submit($this->request, [
                    "id" => $activeChallenge->id,
                    "title" => $activeChallenge->title,
                    "limit" => $activeChallenge->time_limit,
                    "passage" => $activeChallenge->paragraph
                ]);
            }else{
                $this->_submit($this->request, ['error' => 'No challenge available at the momment!']);
            }
        }
    }

    public function submission(){
        Log::write('debug', 'Submitting scores..');
        $response = [];
        $this->loadModel('Perfomances');
        if ($this->request->is('post')){
            $entity = $this->Perfomances->log($this->request->data);
            if ($entity){
                $this->response->statusCode('201');
                $this->_submit($this->request, ['score' =>  $entity->score]);
            }else{
                $this->_submit($this->request, ['error' => 'An error has occured while saving score data']);
            }
        }
    }
}
