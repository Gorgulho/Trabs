<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{
    public $paginate = [
        'limit' => 3, //limite de inscrinções por cada pagina do paginate
        'order' => [
            'Articles.title' => 'asc' //metedo utilizado para a organização das incrinções 
        ]
    ];


    //função relativa ao index dos users
    public function index()
    {
        $this->traducao();
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }
    //função relativa a view dos users
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }
    //função relativa ao add dos users
    public function add()
    {
        $this->traducao();
        $user = $this->Users->newEntity();//criação de uma npca entidade
        if ($this->request->is('post')) {//está à espera de um pedido post
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Utilizador guardado com sucesso'));
                return $this->redirect(['action' => 'index']);//redirecionamento
            } else {
                $this->Flash->error(__('Não foi possivel salvar utilizador. Por favor tente mais tarde.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    //função relativa ao edit dos users
    public function edit($id = null)
    {
        $this->traducao();
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {//está à espera de um pedido patch, post ou put
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Utilizador guardado com sucesso.'));
                return $this->redirect(['action' => 'index']);//redirecionamento
            } else {
                $this->Flash->error(__('Não foi possivel salvar utilizador. Por favor tente mais tarde.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    //função relativa ao delete dos users
    public function delete($id = null)
    {
        $this->traducao();
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Utilizador eleminado com sucesso.'));
        } else {
            $this->Flash->error(__('Não foi possivel eleminar utilizador. Por favor tente mais tarde.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    // Login
    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                return $this->redirect(['controller' => 'events']);
            }
            // Login errado
            $this->Flash->error('Login Incorreto');
        }
    }
    // Logout
    public function logout(){
         $this->Flash->success('Você fez logout');
         return $this->redirect($this->Auth->logout()); //desliga a sessão do utilizador e redireciona-o para o login
    }
    // Registo
    public function register(){
        $user = $this->Users->newEntity();//nova entidade
        if($this->request->is('post')){//requer pedido post
            $user = $this->Users->patchEntity($user, $this->request->data);
            if($this->Users->save($user)){//validação dos dados, se foram salvos ou não
                $this->Flash->success('Registo feito com sucesso');
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error('Registo incorreto');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialzie', ['user']);
    }
    
    public function beforeFilter(Event $event){
        $this->Auth->allow(['register']);// Para permitir a entrada de guest users na página de registo
    }
}