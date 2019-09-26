<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Perfomances Controller
 *
 * @property \App\Model\Table\PerfomancesTable $Perfomances
 */
class PerfomancesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Challenges', 'Participants']
        ];
        $this->set('perfomances', $this->paginate($this->Perfomances));
        $this->set('_serialize', ['perfomances']);
    }

    /**
     * View method
     *
     * @param string|null $id Perfomance id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $perfomance = $this->Perfomances->get($id, [
            'contain' => ['Challenges', 'Participants']
        ]);
        $this->set('perfomance', $perfomance);
        $this->set('_serialize', ['perfomance']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $perfomance = $this->Perfomances->newEntity();
        if ($this->request->is('post')) {
            $perfomance = $this->Perfomances->patchEntity($perfomance, $this->request->data);
            if ($this->Perfomances->save($perfomance)) {
                $this->Flash->success(__('The perfomance has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The perfomance could not be saved. Please, try again.'));
            }
        }
        $challenges = $this->Perfomances->Challenges->find('list', ['limit' => 200]);
        $participants = $this->Perfomances->Participants->find('list', ['limit' => 200]);
        $this->set(compact('perfomance', 'challenges', 'participants'));
        $this->set('_serialize', ['perfomance']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Perfomance id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $perfomance = $this->Perfomances->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $perfomance = $this->Perfomances->patchEntity($perfomance, $this->request->data);
            if ($this->Perfomances->save($perfomance)) {
                $this->Flash->success(__('The perfomance has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The perfomance could not be saved. Please, try again.'));
            }
        }
        $challenges = $this->Perfomances->Challenges->find('list', ['limit' => 200]);
        $participants = $this->Perfomances->Participants->find('list', ['limit' => 200]);
        $this->set(compact('perfomance', 'challenges', 'participants'));
        $this->set('_serialize', ['perfomance']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Perfomance id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $perfomance = $this->Perfomances->get($id);
        if ($this->Perfomances->delete($perfomance)) {
            $this->Flash->success(__('The perfomance has been deleted.'));
        } else {
            $this->Flash->error(__('The perfomance could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
