<?php

class TipoDocumentosController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'TipoDocumentos';

    public function index() {
        $this->set('DataTipoDocumentos',$this->TipoDocumento->find('all'));
    }

    public function view($id = null) {
        $this->set('DataTipoDocumentos', $this->TipoDocumento->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->TipoDocumento->save($this->request->data)) {
                $this->Flash->success('Tipo Documentos cadastrador com sucesso!');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null) {
        
        $this->TipoDocumento->Id = $id;
        
        if ($this->request->is('get')) {
            
            $this->request->data = $this->TipoDocumento->findById($id);
        
        } else {
            
            if ($this->TipoDocumento->save($this->request->data)) {
                $this->Flash->success($id);
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->TipoDocumento->delete($id)) {
            $this->Flash->success('Tipo Documentos deletado com sucesso!');
            $this->redirect(array('action' => 'index'));
        }
    }
}