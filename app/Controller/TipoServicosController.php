<?php

class TipoServicosController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'TipoServicos';

    public function index() {
        $this->set('DataTipoServicos',$this->TipoServico->find('all'));
    }

    public function view($id = null) {
        $this->set('DataTipoServicos', $this->TipoServico->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->TipoServico->save($this->request->data)) {
                $this->Flash->success('Tipo Servicos cadastrador com sucesso!');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null) {
        
        $this->TipoServico->Id = $id;
        
        if ($this->request->is('get')) {
            
            $this->request->data = $this->TipoServico->findById($id);
        
        } else {
            
            if ($this->TipoServico->save($this->request->data)) {
                $this->Flash->success($id);
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->TipoServico->delete($id)) {
            $this->Flash->success('Tipo Servicos deletado com sucesso!');
            $this->redirect(array('action' => 'index'));
        }
    }
}