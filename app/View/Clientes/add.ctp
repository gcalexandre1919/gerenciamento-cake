<h2>Novo Cliente</h2>


<div class="col-md-8">
<?php
    echo $this->Form->create('Cliente', array('url'   => array(
        'controller' => 'clientes','action' => 'add'
    )));
    
    echo $this->Form->input('Nome',array('type'=>'text','class' => 'form-control',
    'div'=>array('class'=>'mb-3')));
    
    echo $this->Form->input('Endereco',array('type'=>'text','class' => 'form-control',
    'div'=>array('class'=>'mb-3')));
    
    echo $this->Form->input('Email',array('type'=>'email','class' => 'form-control',
    'div'=>array('class'=>'mb-3')));
    
    echo $this->Form->input('Contato',array('type'=>'number','class' => 'form-control',
    'div'=>array('class'=>'mb-3')));

    echo $this->Form->input('TipoDocumento_id', array(
        'type' => 'select',
        'options' => $tipodocumento,
        'class' => 'form-control',
        'div'=>array('class'=>'mb-3')
    ));

    echo $this->Form->input('NumeroDocumento',array('type'=>'text','class' => 'form-control',
    'div'=>array('class'=>'mb-3')));

    $optionsFinalButton = array(
        'label'=>'Enviar',
        'class' => 'btn btn-primary',
        'div'=>array('class'=>'mb-3')
       
    );


    echo $this->Form->end($optionsFinalButton);

    ?>
</div>
