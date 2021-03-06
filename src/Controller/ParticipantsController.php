<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Participants Controller
 *
 * @property \App\Model\Table\ParticipantsTable $Participants
 */
class ParticipantsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('participants', $this->paginate($this->Participants));
        $this->set('_serialize', ['participants']);
    }

    /**
     * View method
     *
     * @param string|null $id Participant id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $participant = $this->Participants->get($id, [
            'contain' => ['Perfomances', 'Perfomances.Challenges']
        ]);
        $this->set('participant', $participant);
        $this->set('_serialize', ['participant']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $participant = $this->Participants->newEntity();
        if ($this->request->is('post')) {
            $participant = $this->Participants->patchEntity($participant, $this->request->data);
            if ($this->Participants->save($participant)) {
                $this->auditUser(__('Created participant {0}', json_encode($this->request->data)));
                $this->Flash->success(__('The participant has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->auditUser(__('Failed to create participant {0}', json_encode($this->request->data)));
                $this->Flash->error(__('The participant could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('participant'));
        $this->set('_serialize', ['participant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Participant id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $participant = $this->Participants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $participant = $this->Participants->patchEntity($participant, $this->request->data);
            if ($this->Participants->save($participant)) {
                $this->auditUser(__('Edited participant {0}', json_encode($this->request->data)));
                $this->Flash->success(__('The participant has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->auditUser(__('Failed to edited participant {0}', json_encode($this->request->data)));
                $this->Flash->error(__('The participant could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('participant'));
        $this->set('_serialize', ['participant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Participant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $participant = $this->Participants->get($id);
        if ($this->Participants->delete($participant)) {
            $this->auditUser(__('Deleted participant {0}/{1}', $participant->fullname, $participant->code));
            $this->Flash->success(__('The participant has been deleted.'));
        } else {
            $this->auditUser(__('Failed to delete participant {0}/{1}', $participant->fullname, $participant->code));
            $this->Flash->error(__('The participant could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function activate($id)
    {
       if ($this->Participants->setAccess($id, 1)){
           $this->Flash->success('Participant has been successfully activated!');
           $this->auditUser(__('Activated participant {0}', $id));
        }else{
            $this->auditUser(__('Failed to activated participant {0}', $id));
            $this->Flash->error('An error has occured while blocking user');
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function deactivate($id)
    {
       if ($this->Participants->setAccess($id, 0)){
            $this->auditUser(__('Deactivated participant {0}', $id));
            $this->Flash->success('User has been successfully deactivated!');
        }else{
            $this->auditUser(__('Failed to Deactivate participant {0}', $id));
            $this->Flash->error('An error has occured while blocking user');
        }
        return $this->redirect(['action' => 'index']);
    }

}
