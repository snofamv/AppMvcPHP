<?php $this->layout('template', ['title' => 'List Users']) ?>

<table border="1" style="color: white; font-size: 25px;">
    <thead>
        <th>ID</th>
        <th>USER</th>
        <th>PASSWORD</th>
    </thead>
    <tbody>
        <tr>
            <td><?=$this->e($idUser) ?></td>
            <td><?=$this->e($userName) ?></td>
            <td><?=$this->e($userPass) ?></td>
        </tr>
    </tbody>

</table>