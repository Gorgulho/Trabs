<?php
namespace App\Controller;

use App\Controller\AppController;

/*
 * Eventos Controller
 */
class EventsController extends AppController
{

    /*
     * Index method
     */
    public function index()
    {
        $events = $this->paginate($this->Events->find('all')->contain(['Organizers']));

        $this->set(compact('events'));
        $this->set('_serialize', ['events']);
    }

    /*
     * View method
     */
    public function view($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => []
        ]);

        $this->set('event', $event);
        $this->set('_serialize', ['event']);
    }

    /*
     * Add method
     */
    public function add()
    {
        $event = $this->Events->newEntity();
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            //die(debug($this->Events->save($event)));
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The evento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The evento could not be saved. Please, try again.'));
        }
        $this->loadModel('Organizers');
        $this->set('organizers',$this->Organizers->find('list'));
        $this->set(compact('event'));
        $this->set('_serialize', ['event']);
    }

    /*
     * Edit method
     */
    public function edit($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The evento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The evento could not be saved. Please, try again.'));
        }
        $this->loadModel('Organizers');
        $this->set('organizers',$this->Organizers->find('list'));
        $this->set(compact('event'));
        $this->set('_serialize', ['event']);
    }

    /*
     * Delete method
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Events->delete($event)) {
            $this->Flash->success(__('The evento has been deleted.'));
        } else {
            $this->Flash->error(__('The evento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
