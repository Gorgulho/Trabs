<?php
namespace App\Controller;

use App\Controller\AppController;

class OrganizersController extends AppController
{

    public $paginate = [
        'limit' => 4, //limite de inscrinções por cada pagina do paginate
        'order' => [
            'Articles.title' => 'asc' //metedo utilizado para a organização das incrinções 
        ]
    ];

    public function index()
    {
        $organizers = $this->paginate($this->Organizers);

        $this->set(compact('organizers'));
        $this->set('_serialize', ['organizers']);
    }

    public function view($id = null)
    {
        $organizer = $this->Organizers->get($id, [
            'contain' => ['Events']
        ]);

        $this->set('organizer', $organizer);
        $this->set('_serialize', ['organizer']);
    }

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
