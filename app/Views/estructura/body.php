<body>
    <div class="container">
        <div class="row">
            <a href="<?php base_url();?>./home/formulario" class="btn btn-info mt-10" role="button">Nuevo</a>
        </div><br>
        <!---<h4>Hola desde del body</h4>
        <//?php echo suma(1, 2); ?> <br>
        <//?php echo resta(2, 4); ?>-->
        <div class="row">
            <table class="table">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">deleted</th>
                </tr>
                <tr>
                    <?php
                    foreach($users as $user){
                        echo "<tr scope='row'>";
                            echo "<td>".$user['id']."</td>";
                            echo "<td>".$user['name']."</td>";
                            echo "<td>".$user['email']."</td>";
                            echo "<td>".$user['deleted_at']."</td>";
                            echo "<td>";
                            ?>
                            <a href="<?php base_url();?>./home/editar?id=<?php echo $user['id']?>" class="btn btn-warning" role="button"><i class="fa fa-pencil"></i></a>
                            <a href="<?php base_url();?>./home/borrar?id=<?php echo $user['id']?>" class="btn btn-danger" role="button"><i class="fa fa-trash"></i></a>
                            <?php
                            echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tr>
            </table>
        </div>
        

    </div>
</body>
</html>