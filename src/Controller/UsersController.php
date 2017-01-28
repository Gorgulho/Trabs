<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{
    //função relativa ao index dos users
    public function index()
    {
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
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    //função relativa ao edit dos users
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    //função relativa ao delete dos users
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
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
         return $this->redirect($this->Auth->logout());
    }
    // Registo
    public function register(){
        $user = $this->Users->newEntity();
        if($this->request->is('post')){
            $user = $this->Users->patchEntity($user, $this->request->data);
            if($this->Users->save($user)){
                $this->Flash->success('Registo feito com sucesso');
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error('Registo incorreto');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialzie', ['user']);
    }
    // Para permitir a entrada de guest users na página de registo
    public function beforeFilter(Event $event){
        $this->Auth->allow(['register']);
    }
}