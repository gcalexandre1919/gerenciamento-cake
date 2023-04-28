<?php

class SituacaoServicosController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'SituacaoServicos';

    public function index() {
        $this->set('DataSituacaoServico',$this->SituacaoServico->find('all'));
    }

    public function view($id = null) {
        $this->set('DataSituacaoServico', $this->SituacaoServico->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->SituacaoServico->save($this->request->data)) {
                $this->Flash->success('Situacao de Serviços cadastrador com sucesso!');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null) {
        
        $this->SituacaoServico->Id = $id;
        
        if ($this->request->is('get')) {
            
            $this->request->data = $this->SituacaoServico->findById($id);
        
        } else {
            
            if ($this->SituacaoServico->save($this->request->data)) {
                $this->Flash->success($id);
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->SituacaoServico->delete($id)) {
            $this->Flash->success('Situacao de Serviços deletado com sucesso!');
            $this->redirect(array('action' => 'index'));
        }
    }
}