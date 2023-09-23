<?php #$this->layout('template', ['title' => 'Home']) ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="App\public\css\style.css">
    <title><?=$this->e($title)?></title>

</head>
<body>
<?=$this->section('content')?>


</body>
</html>