<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;

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
        if($this->request->is('post')){ //espera por um pedido POST
            $image = $this->request->data('image'); //recebe o valor do campo de upload (image)
            $extension = pathinfo($image['name'], PATHINFO_EXTENSION); //obtem a extensao do ficheiro
            $image['name'] = Text::uuid($image['name']).'.'.$extension; //transforma o nome em uma string
            if(move_uploaded_file($image['tmp_name'], WWW_ROOT . 'img/uploads/' . $image['name'])){ //Verifica se o ficheiro foi movido com sucesso para outra pasta
                $organizer = $this->Organizers->patchEntity($organizer, $this->request->data()); //preenche a entidade com os valores enviados
                $organizer->image = 'uploads/' . $image['name']; //guarda o nome e caminho do ficheiro na patch entity
                if($this->Organizers->save($organizer)){ //valida os dados
                    $this->redirect(['action' => 'index']); //redireciona para a acao index
                }
                else{
                    $this->Flash->error('Nao foi possivel guardar a carta'); //envia uma mensagem de erro
                }
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
            $image = $this->request->data('image'); //recebe o valor do campo de upload (image)
            $extension = pathinfo($image['name'], PATHINFO_EXTENSION); //obtem a extensao do ficheiro
            $image['name'] = Text::uuid($image['name']).'.'.$extension; //transforma o nome em uma string
            if(move_uploaded_file($image['tmp_name'], WWW_ROOT . 'img/uploads/' . $image['name'])){ //Verifica se o ficheiro foi movido com sucesso para outra pasta
                $organizer = $this->Organizers->patchEntity($organizer, $this->request->data()); //preenche a entidade com os valores enviados
                $organizer->image = 'uploads/' . $image['name']; //guarda o nome e caminho do ficheiro na patch entity
            }
            if ($this->Organizers->save($organizer)) {
                $this->Flash->success(__('The organizer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Imposivel guardar o organizador.'));
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
