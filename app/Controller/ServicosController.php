<?php

class ServicosController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'Servicos';

    public function index() {
        $this->set('DataServicos',$this->Servico->find('all'));
    }

    public function view($id = null) {
        

        $servicos = $this->Servico->findById($id);
        $servicoPrestadorId = $servicos['Servico']['Prestador_id'];
        $servicoTipoServicoId = $servicos['Servico']['TipoServico_id'];
        $servicoClienteId = $servicos['Servico']['Cliente_id'];
        $servicoSituacaoId = $servicos['Servico']['SituacaoServico_id'];


        $this->loadModel('TipoServico');
        $TipoServico = $this->TipoServico->findById($servicoTipoServicoId);

        $this->loadModel('SituacaoServico');
        $situacao = $this->SituacaoServico->findById($servicoSituacaoId);
        
        $this->loadModel('Cliente');
        $cliente = $this->Cliente->findById($servicoClienteId);

        $this->loadModel('Prestador');
        $prestador = $this->Prestador->findById($servicoPrestadorId);



        $this->set('DataServicos', $servicos);
        $this->set('DataSituacao', $situacao);
        $this->set('DataTipoServico', $TipoServico);
        $this->set('DataCliente', $cliente);
        $this->set('DataPrestador', $prestador);
    }

    public function add() {
        if($this->request->is('get')){
            $this->loadModel('Cliente');

            $clientes = $this->Cliente->find('list',array(
                'fields' => array('Id', 'Nome')
            )); 


            
            $this->loadModel('TipoServico');
            
            $tipoServico = $this->TipoServico->find('list', array(
                'fields' => array('Id', 'Nome')
            ));



            $this->set(compact('clientes'));
            $this->set(compact('tipoServico'));
        };



        if ($this->request->is('post')) {
            if ($this->Servico->save($this->request->data)) {
                $this->Flash->success('Servico cadastrador com sucesso!');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null) {
        
        $this->Servico->Id = $id;
        
        if ($this->request->is('get')) {
            
            $this->request->data = $this->Servico->findById($id);
        
        } else {
            
            if ($this->Servico->save($this->request->data)) {
                $this->Flash->success($id);
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Servico->delete($id)) {
            $this->Flash->success('Servico deletado com sucesso!');
            $this->redirect(array('action' => 'index'));
        }
    }




    public function getPrestadorById()
    {
        $this->autoRender = false;
        $this->response->type('json');

        $serviceId = $this->request->data['service_id'];

        $this->loadModel('Prestador');

        $providers = $this->Prestador->find('list', array(
            'conditions' => array(
                'Prestador.TipoServico_id' => $serviceId
                
            ),
            'fields' => array('Id', 'Nome')
        ));

        echo json_encode($providers); 

    }
}