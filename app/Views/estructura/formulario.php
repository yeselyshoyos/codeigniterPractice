<div class="container">
<?php   

echo form_open('/home/guarda');
if(isset($users)){
    $name = $users[0]['name'];
    $email = $users[0]['email'];
}else{
    $name = "";
    $email = "";
}
?>
<div class="form-group">
<br>
<?php
echo form_label('Nombre ', 'name',);
echo form_input(array('name' => 'name','placeholder' => 'Nombre', 'class' => 'form-control', 'value'=> $name,));
echo "<br>";
echo "<br>";
echo form_label('Correo Electronico ', 'email',);
echo form_input(array('name' => 'email','placeholder' => 'Correo Electronico','class' => 'form-control','value'=> $email,));
echo "<br>";
echo "<br>";
echo form_submit('guarda', 'Guardar','class="btn btn-primary"',);
if(isset($users)){
    echo form_hidden('id', $users[0]['id']);
}else{
    $name = "";
    $email = "";
}

?>
</div>
<?php
echo form_close();
?>
</div>