<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- STYLES -->
  <link rel="stylesheet" href="<?=urlProject(FOLDER_BASE . "/src/public/styles/globalStyles.css")?>">

  <title> <?= SITE ?> </title>
</head>

<body>
  <h1>Header</h1>

  <main>
    <?=$this->section('content')?>
  </main>

  <h1>Footer</h1>
</body>

</html>