<?php

class TipoContasController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'TipoContas';

    public function index() {
        $this->set('DataTipoContas',$this->TipoConta->find('all'));
    }

    public function view($id = null) {
        $this->set('DataTipoContas', $this->TipoConta->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->TipoConta->save($this->request->data)) {
                $this->Flash->success('Tipo Conta cadastrador com sucesso!');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null) {
        
        $this->TipoConta->Id = $id;
        
        if ($this->request->is('get')) {
            
            $this->request->data = $this->TipoConta->findById($id);
        
        } else {
            
            if ($this->TipoConta->save($this->request->data)) {
                $this->Flash->success($id);
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->TipoConta->delete($id)) {
            $this->Flash->success('Tipo Conta deletado com sucesso!');
            $this->redirect(array('action' => 'index'));
        }
    }
}