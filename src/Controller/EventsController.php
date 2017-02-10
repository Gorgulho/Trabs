<?php
namespace App\Controller;

use App\Controller\AppController;

/*
 * Eventos Controller
 */
class EventsController extends AppController
{
    public $paginate = [
        'limit' => 4,
        'order' => [
            'Articles.title' => 'asc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
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
                $this->Flash->success(__('O evento foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possivel gravar o Evento. Tente de novo.'));
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
                $this->Flash->success(__('O evento foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possivel gravar o Evento. Tente de novo.'));
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
            $this->Flash->success(__('Evento eleminado com sucesso.'));
        } else {
            $this->Flash->error(__('Não foi possivel eleminar o Evento. Tente de novo..'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
