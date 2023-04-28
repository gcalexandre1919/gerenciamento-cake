<h1>Edit Cliente</h1>
<?php

    echo $this->Form->create('Cliente', array('url'   => array(
        'controller' => 'clientes','action' => 'edit',
    )));


    echo $this->Form->input('Nome',array('type'=>'text'));
    echo $this->Form->input('Endereco',array('type'=>'text'));
    echo $this->Form->input('Email',array('type'=>'email'));
    echo $this->Form->input('Contato',array('type'=>'number'));

    echo $this->Form->input('TipoDocumento_id', array(
        'type' => 'select',
        'options' => array(
            '1' => 'RG',
            '2' => 'CNH',
            '3' => 'CPF'
        ),
        'class' => 'my-select-class'
    ));

    echo $this->Form->input('NumeroDocumento',array('type'=>'text'));

    echo $this->Form->input('Id', array('type' => 'hidden'));
    echo $this->Form->end('Salvar');