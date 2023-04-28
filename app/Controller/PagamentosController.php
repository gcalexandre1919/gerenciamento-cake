<?php

class PagamentosController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'Pagamentos';

    public function index() {
        $this->set('DataPagamentos',$this->Pagamento->find('all'));
    }

    public function view($id = null) {
        $this->set('DataPagamentos', $this->Pagamento->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->Pagamento->save($this->request->data)) {
                $this->Flash->success('Valor de pagamento cadastrador com sucesso!');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null) {
        
        $this->Pagamento->Id = $id;
        
        if ($this->request->is('get')) {
            
            $this->request->data = $this->Pagamento->findById($id);
        
        } else {
            
            if ($this->Pagamento->save($this->request->data)) {
                $this->Flash->success($id);
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Pagamento->delete($id)) {
            $this->Flash->success('Valor de pagamento deletado com sucesso!');
            $this->redirect(array('action' => 'index'));
        }
    }
}