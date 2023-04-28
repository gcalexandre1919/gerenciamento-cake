<?php

class ClientesController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'Clientes';

    public function index() {
        $this->set('DataClientes',$this->Cliente->find('all'));
    }

    public function view($id = null) {
      

        $cliente = $this->Cliente->findById($id);
        $DocCliente = $cliente['Cliente']['TipoDocumento_id'];
       
        $this->loadModel('TipoDocumento');
        $TipoDoc = $this->TipoDocumento->findById($DocCliente); 


        $this->set('DataDoc', $TipoDoc);
        $this->set('DataClientes',$cliente);
    }

    public function add() {
        if ($this->request->is('get')) {
            $this->loadModel('TipoDocumento');
            $tipodocumento = $this->TipoDocumento->find('list', array(
                'fields' => array('Id', 'Nome')
            ));

            $this->set(compact('tipodocumento'));
        }

        if ($this->request->is('post')) {
            if ($this->Cliente->save($this->request->data)) {
                $this->Flash->success('Cliente cadastrador com sucesso!');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null) {
        
        $this->Cliente->Id = $id;
        
        if ($this->request->is('get')) {
            
            $this->request->data = $this->Cliente->findById($id);
        
        } else {
            
            if ($this->Cliente->save($this->request->data)) {
                $this->Flash->success($id);
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Cliente->delete($id)) {
            $this->Flash->success('Cliente deletado com sucesso!');
            $this->redirect(array('action' => 'index'));
        }
    }
}