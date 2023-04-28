<?php

class Servico extends AppModel {
    public $name = 'servico';
    public $validate = array(
        'TituloServico' => array(
            'rule' => 'notBlank'
        ),
        'DescricaoServico' => array(
            'rule' => 'notBlank'
        ), 
        'Endereco' => array(
            'rule' => 'notBlank'
        ),
        'DataExecucao' => array(
            'rule' => 'notBlank'
        )
    );
   
}