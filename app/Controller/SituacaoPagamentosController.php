<?php

class SituacaoPagamentosController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'SituacaoPagamentos';

    public function index() {
        $this->set('DataSituacaoPagamento',$this->SituacaoPagamento->find('all'));
    }

    public function view($id = null) {
        $this->set('DataSituacaoPagamento', $this->SituacaoPagamento->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->SituacaoPagamento->save($this->request->data)) {
                $this->Flash->success('Situacao de Pagamento cadastrador com sucesso!');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null) {
        
        $this->SituacaoPagamento->Id = $id;
        
        if ($this->request->is('get')) {
            
            $this->request->data = $this->SituacaoPagamento->findById($id);
        
        } else {
            
            if ($this->SituacaoPagamento->save($this->request->data)) {
                $this->Flash->success($id);
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->SituacaoPagamento->delete($id)) {
            $this->Flash->success('Situacao de Pagamento deletado com sucesso!');
            $this->redirect(array('action' => 'index'));
        }
    }
}