<?php

class UsersController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'Users';

    public function index() {
        $this->set('DataUsers',$this->User->find('all'));
    }

    public function view($id = null) {
        $this->set('DataUsers', $this->User->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success('User cadastrador com sucesso!');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null) {
        
        $this->User->Id = $id;
        
        if ($this->request->is('get')) {
            
            $this->request->data = $this->User->findById($id);
        
        } else {
            
            if ($this->User->save($this->request->data)) {
                $this->Flash->success($id);
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->User->delete($id)) {
            $this->Flash->success('User deletado com sucesso!');
            $this->redirect(array('action' => 'index'));
        }
    }
}