<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Organizers Controller
 *
 * @property \App\Model\Table\OrganizersTable $Organizers
 */
class OrganizersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $organizers = $this->paginate($this->Organizers);

        $this->set(compact('organizers'));
        $this->set('_serialize', ['organizers']);
    }

    /**
     * View method
     *
     * @param string|null $id Organizer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $organizer = $this->Organizers->get($id, [
            'contain' => ['Events']
        ]);

        $this->set('organizer', $organizer);
        $this->set('_serialize', ['organizer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $organizer = $this->Organizers->newEntity();
        if ($this->request->is('post')) {
            $organizer = $this->Organizers->patchEntity($organizer, $this->request->data);
            if ($this->Organizers->save($organizer)) {
                $this->Flash->success(__('The organizer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The organizer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('organizer'));
        $this->set('_serialize', ['organizer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Organizer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $organizer = $this->Organizers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $organizer = $this->Organizers->patchEntity($organizer, $this->request->data);
            if ($this->Organizers->save($organizer)) {
                $this->Flash->success(__('The organizer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The organizer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('organizer'));
        $this->set('_serialize', ['organizer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Organizer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $organizer = $this->Organizers->get($id);
        if ($this->Organizers->delete($organizer)) {
            $this->Flash->success(__('The organizer has been deleted.'));
        } else {
            $this->Flash->error(__('The organizer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
