<?php $this->layout('template', ['title' => 'List Users']) ?>
<table border="1" style="color: white; font-size: 25px;">
    <thead>
        <th>ID</th>
        <th>USER</th>
        <th>PASSWORD</th>
        <th>CREATED_AT</th>
        <th>UPDATED_AT</th>
    </thead>
    <tbody>
        <?php foreach ($datos as $usuario): ?>
            <tr>
                <td><?=$usuario["id"] ?></td>
                <td><?=$usuario["usuario"] ?></td>
                <td><?=$usuario["contrasena"] ?></td>
                <td><?=$usuario["created_at"] ?></td>
                <td><?=$usuario["updated_at"] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
