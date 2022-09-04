<?php $this->layout('_theme') ?>

<?php $this->start('removeHeader') ?>

<h1>Erro 😥!</h1>
<h2>Hello Rafael</h2>

<?php $this->stop() ?>

<br>
<div>
  <h1>NotFound <?=$this->e($error)?> </h1>
</div>
<br>

<?php $this->start('removeFooter') ?>

<h2>Goodby</h2>
<h3>== 👨‍💻 ==</h3>

<?php $this->stop() ?>