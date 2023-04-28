<?php

class Prestador extends AppModel {
    public $name = 'prestador';
    public $validate = array(
        'Nome' => array(
            'rule' => 'notBlank'
        ),
        'Cnpj' => array(
            'rule' => 'notBlank'
        ), 
        'Cpf' => array(
            'rule' => 'notBlank'
        ),
        'Endereco' => array(
            'rule' => 'notBlank'
        ),
        'Email' => array(
            'rule' => 'notBlank'
        ),
        'Contato' => array(
            'rule' => 'notBlank'
        ),
        'Agencia' => array(
            'rule' => 'notBlank'
        ),
        'Conta' => array(
            'rule' => 'notBlank'
        )
        
        
    );
   
    function importCsv($filename) {
        $handle = fopen($filename, "r");
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $this->create();
            $this->set(array(
                'Nome' => $data[0],
                'Cnpj' => $data[1],
                'Cpf' => $data[2],
                'Endereco' => $data[3],
                'Email' => $data[4],
                'Contato' => $data[5],
                'Agencia' => $data[6],
                'Conta' => $data[7],
          

            ));
            $this->save();
        }
        fclose($handle);
    }





}