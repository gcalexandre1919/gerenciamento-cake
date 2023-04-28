

<h1><?php echo $DataClientes['Cliente']['Nome']?></h1>

<div class="md-3">
<label>Endereço:</label>
        <?php if(!empty($DataClientes['Cliente']['Endereco'])):?>
           <p><?php echo $DataClientes['Cliente']['Endereco']; ?></p> 
        <?php else:?>
            <p>Nenhum dado cadastrado!</p>
        <?php endif; ?>
</div>

<div class="md-3">
<label>Contato:</label>
        <?php if(!empty($DataClientes['Cliente']['Contato'])):?>
            <p> <?php echo $DataClientes['Cliente']['Contato']; ?></p>
        <?php else:?>
            <p>Nenhum dado cadastrado!</p>
        <?php endif; ?>
</div>

<div class="md-3">
<label>Email:</label>


        <?php if(!empty($DataClientes['Cliente']['Email'])):?>
            <p><?php echo $DataClientes['Cliente']['Email']; ?></p>
        <?php else:?>
            <p>Nenhum dado cadastrado!</p>
        <?php endif; ?>

</div>

<div class="md-3">
<label>Tipo Documento:</label>


        <?php if(!empty($DataDoc['TipoDocumento']['Nome'])):?>
            <p><?php echo $DataDoc['TipoDocumento']['Nome']; ?></p>
        <?php else:?>
            <p>Nenhum dado cadastrado!</p>
        <?php endif; ?>



</div>

<div class="md-3">
<label>Numero do Documento:</label>

        <?php if(!empty($DataClientes['Cliente']['NumeroDocumento'])):?>
            <p><?php echo $DataClientes['Cliente']['NumeroDocumento']; ?></p>
        <?php else:?>
            <p>Nenhum dado cadastrado!</p>
        <?php endif; ?>

</div>


