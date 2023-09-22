<?php $this->layout('template', ['title' => 'Error']) ?>

<h1>*ERROR - <?=$this->e($error)?>*</h1>
<h2><?=$this->e($msg)?></h2>