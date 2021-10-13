<?php   

echo form_open('/home/guarda');
echo form_label('Nombre ', 'name',);
echo form_input(array('name' => 'name','placeholder' => 'Nombre',));
echo "<br>";
echo "<br>";
echo form_label('Correo Electronico ', 'email',);
echo form_input(array('name' => 'email','placeholder' => 'Correo Electronico',));
echo "<br>";
echo "<br>";
echo form_submit('guarda', 'Guardar');
echo form_close();
?>