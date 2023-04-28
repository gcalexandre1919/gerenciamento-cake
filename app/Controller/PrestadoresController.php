<?php

class PrestadoresController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'Prestadores';

    public function index() {
        $this->set('DataPrestadores',$this->Prestador->find('all'));
    }

    public function view($id = null) {
        

        $prestador = $this->Prestador->findById($id);

        $tipoServicoId = $prestador['Prestador']['TipoServico_id'];

        $TipoContaId = $prestador['Prestador']['TipoConta_id'];

        $this->loadModel('TipoServico');
        $tipoServico =  $this->TipoServico->findById($tipoServicoId);
        
        $this->loadModel('TipoConta');
        $tipoConta = $this->TipoConta->findById($TipoContaId);
        
        
        $this->set('DataPrestadores', $prestador);
        $this->set('DataTipoConta', $tipoConta);
        $this->set('DataTipoServico', $tipoServico);


    }

    public function add() {

        if ($this->request->is('get')) {
            $this->loadModel('TipoConta');
            
            $tipocontas = $this->TipoConta->find('list', array(
                'fields' => array('Id', 'Nome')
            ));


            $this->loadModel('TipoServico');
            
            $tipoServico = $this->TipoServico->find('list', array(
                'fields' => array('Id', 'Nome')
            ));

            $this->set(compact('tipocontas'));
            $this->set(compact('tipoServico'));
        }
        
        if ($this->request->is('post')) {
            if ($this->Prestador->save($this->request->data)) {
                $this->Flash->success('Prestador cadastrador com sucesso!');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null) {
        
        $this->Prestador->Id = $id;
        
        if ($this->request->is('get')) {
            
            $this->request->data = $this->Prestador->findById($id);
        
        } else {
            
            if ($this->Prestador->save($this->request->data)) {
                $this->Flash->success($id);
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Prestador->delete($id)) {
            $this->Flash->success('Prestador deletado com sucesso!');
            $this->redirect(array('action' => 'index'));
        }
    }



    function import() {

        if ($this->request->is('post')) {
            if (!empty($this->data)) {
                $this->Prestador->importCsv($this->data['Prestador']['csv']['tmp_name']);
                $this->Flash->success('CSV importado com sucesso.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }







}