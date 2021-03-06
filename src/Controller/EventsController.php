<?php
namespace App\Controller;

use App\Controller\AppController;

/*
 * Eventos Controller
 */
class EventsController extends AppController
{
    public $paginate = [
        'limit' => 4, //limite de inscrinções por cada pagina do paginate
        'order' => [
            'Articles.title' => 'asc' //metedo utilizado para a organização das incrinções 
        ]
    ];

    /*
     * Index method
     */
    public function index()
    {
        $this->traducao(); //a chamar a função para as traduções
        $events = $this->paginate($this->Events->find('all')->contain(['Organizers']));

        $this->set(compact('events'));
        $this->set('_serialize', ['events']);
    }

    /*
     * View method
     */
    public function view($id = null)
    {
        $this->traducao(); //a chamar a função para as traduções
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
        $this->traducao(); //a chamar a função para as traduções
        $event = $this->Events->newEntity();//criação de uma nova entidade
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            if ($this->Events->save($event)) {
                $this->Flash->success(__('O evento foi salvo com sucesso.'));//menssagem de sucesso

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possivel gravar o Evento. Tente de novo.'));//menssagem de erro
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
        $this->traducao(); //a chamar a função para as traduções
        $event = $this->Events->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) { //requer um pedido patch, post ou put
            $event = $this->Events->patchEntity($event, $this->request->data);
            if ($this->Events->save($event)) {
                $this->Flash->success(__('O evento foi salvo com sucesso.'));//menssagem de sucesso

                return $this->redirect(['action' => 'index']);//redericionamento para o index
            }
            $this->Flash->error(__('Não foi possivel gravar o Evento. Tente de novo.'));//menssagem de erro
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
        $this->traducao(); //a chamar a função para as traduções
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Events->delete($event)) {
            $this->Flash->success(__('Evento eleminado com sucesso.'));//menssagem de sucesso
        } else {
            $this->Flash->error(__('Não foi possivel eleminar o Evento. Tente de novo.'));//menssagem de erro
        }

        return $this->redirect(['action' => 'index']);//redericionamento para o index
    }
}
