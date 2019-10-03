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
        $this->set('challenges', $this->paginate($this->Challenges->find()->order(['is_active' => 'desc'])));
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
        $scores = $this->Perfomances->getAvgChallengePerfomancesById($id);

        $this->set('perfomances', $scores);
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
                $this->auditUser(__('Created a new challenge with data: {0}', json_encode($this->request->data)));
                if($challenge->is_active == 1){
                    $this->auditUser(__('Challenge Activated'));
                    $this->Challenges->setActive($challenge->id);
                }
                $this->Flash->success(__('The challenge has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->auditUser(__('Failed to created a new challenge with data: {0}', json_encode($this->request->data)));
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
                if($challenge->is_active == 1){
                    $this->Challenges->setActive($challenge->id);
                }
                $this->auditUser(__('Edited challenge {0} with data {1}', $challenge->title, json_encode($this->request->data)));
                $this->Flash->success(__('The challenge has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->auditUser(__('Failed to edited challenge {0} with data {1}', $challenge->title, json_encode($this->request->data)));
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
            $this->auditUser(__('Deleted challenge {0}', $id));
            $this->Flash->success(__('The challenge has been deleted.'));
        } else {
            $this->auditUser(__('Failed to delete challenge {0}', $id));
            $this->Flash->error(__('The challenge could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function activate($id){
        $entity = $this->Challenges->setActive($id);
        if ($entity){
            $this->Flash->success(__('{0} is now the active challenge', $entity->title));
            $this->auditUser(__('Activated challenge "{0}"',  $entity->title));
        }else{
           $this->auditUser(__('Failed to activated challenge "{0}"',  $entity->title));
           $this->Flash->error('Failed to make challenge active');
        }
        return $this->redirect(['action' => 'index']);
    }
}
