<?php

class TipoServico extends AppModel {
    public $name = 'tiposervico';

    public $validate = array(
        'Nome' => array(
            'rule' => 'notBlank'
        )

    );
}