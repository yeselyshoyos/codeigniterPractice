<body>
    <h4>Hola desde del body</h4>
    <!---<//?php echo suma(1, 2); ?> <br>
    <//?php echo resta(2, 4); ?>-->
    <table>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>email</th>
            <th>deleted</th>
        </tr>
        <tr>
            <?php
            foreach($users as $user){
                echo "<tr>";
                echo "<td>".$user['id']."</td>";
                echo "<td>".$user['name']."</td>";
                echo "<td>".$user['email']."</td>";
                echo "<td>".$user['deleted_at']."</td>";
                echo "</tr>";
            }
             ?>
        </tr>
    </table>
</body>
</html>