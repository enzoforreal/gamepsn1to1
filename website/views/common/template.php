<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
      <meta name="theme-color" content="#ffffff">

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link href="<?= URL ?>public/CSS/component.css" rel="stylesheet" type="text/css" />
      <link href="<?= URL ?>public/CSS/stylesheet.css" rel="stylesheet" type="text/css" />
      <link rel="apple-touch-icon" sizes="57x57" href="../../public/Assets/images/apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="../../public/Assets/images/apple-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="../../public/Assets/images/apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="../../public/Assets/images/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="../../public/Assets/images/apple-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="../../public/Assets/images/apple-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="../../public/Assets/images/apple-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="../../public/Assets/images/apple-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="../../public/Assets/images/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192" href="../../public/Assets/images/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="../../public/Assets/images/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="../../public/Assets/images/favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="../../public/Assets/images/favicon-16x16.png">
      <link rel="manifest" href="/manifest.json">

      <?php if (!empty($page_css)) : ?>
      <?php foreach ($page_css as $fichier_css) : ?>
      <link href="<?= URL ?>public/CSS/<?= $fichier_css ?>" rel="stylesheet" type="text/css" />
      <?php endforeach; ?>
      <?php endif; ?>
</head>

<body>
      <?php require_once("views/common/header.php"); ?>

      <div>
            <?php
            if (!empty($_SESSION['alert'])) {
                  foreach ($_SESSION['alert'] as $alert) {
                        echo "<div class='alert " . $alert['type'] . "' role='alert'>
                        " . $alert['message'] . "
                    </div>";
                  }
                  unset($_SESSION['alert']);
            }
            ?>
            <?= $page_content; ?>
      </div>

      <?php require_once("views/common/footer.php"); ?>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
      </script>
      <?php if (!empty($page_javascript)) : ?>
      <?php foreach ($page_javascript as $fichier_javascript) : ?>
      <script type="module" src="<?= URL ?>public/JavaScript/<?= $fichier_javascript ?>"></script>
      <?php endforeach; ?>
      <?php endif; ?>
</body>

</html>