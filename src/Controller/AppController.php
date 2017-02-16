<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18N\I18N;

class AppController extends Controller
{

    public function traducao(){
        if($this->request->is('post')){  
            $locale = $this->request->data('locale');
            I18n::locale($locale);
        }
    }
    
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        //função para fazer o redirecionamento para o login caso não exista já uma conta iniciado 
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ]
        ]);

        
    }

    
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        if($this->request->session()->read('Auth.User')){
            $this->set('loggedIn', true);
        }
        else{
            $this->set('loggedIn', false);
        }
    }
}
