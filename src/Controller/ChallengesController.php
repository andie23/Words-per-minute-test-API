<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Challenges Controller
 *
 * @property \App\Model\Table\ChallengesTable $Challenges
 */
class ChallengesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('challenges', $this->paginate($this->Challenges));
        $this->set('_serialize', ['challenges']);
    }

    /**
     * View method
     *
     * @param string|null $id Challenge id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Perfomances');
        $challenge = $this->Challenges->get($id);
        
        $this->set('perfomances', $this->Perfomances->getAvgChallengePerfomancesById($id));
        $this->set('challenge', $challenge);
        $this->set('_serialize', ['challenge']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $challenge = $this->Challenges->newEntity();
        if ($this->request->is('post')) {
            $challenge = $this->Challenges->patchEntity($challenge, $this->request->data);
            if ($this->Challenges->save($challenge)) {
                $this->Flash->success(__('The challenge has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The challenge could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('challenge'));
        $this->set('_serialize', ['challenge']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Challenge id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $challenge = $this->Challenges->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $challenge = $this->Challenges->patchEntity($challenge, $this->request->data);
            if ($this->Challenges->save($challenge)) {
                $this->Flash->success(__('The challenge has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The challenge could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('challenge'));
        $this->set('_serialize', ['challenge']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Challenge id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $challenge = $this->Challenges->get($id);
        if ($this->Challenges->delete($challenge)) {
            $this->Flash->success(__('The challenge has been deleted.'));
        } else {
            $this->Flash->error(__('The challenge could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function random(){
        if ($this->Challenges->setRandomPassageAsActive()){
            $this->Flash->success('Random challenge has been set');
        }else{
            $this->Flash->error('Failed to set random challenge');
        }
        return $this->redirect(['controller'=>'Dashboard', 'action' => 'index']);
    }
}
