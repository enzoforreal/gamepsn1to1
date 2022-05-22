<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



      <link href="<?= URL ?>public/CSS/component.css" rel="preload" type="text/css" />
      <?php if(!empty($page_css)) : ?>
      <?php foreach($page_css as $fichier_css) : ?>
      <link href="<?= URL ?>public/CSS/<?= $fichier_css ?>" rel="preload" type="text/css" />
      <?php endforeach; ?>
      <?php endif; ?>
</head>

<body>
      <?php require_once("views/common/header.php"); ?>

      <div>
            <?php 
            if(!empty($_SESSION['alert'])) {
                foreach($_SESSION['alert'] as $alert){
                    echo "<div class='alert ". $alert['type'] ."' role='alert'>
                        ".$alert['message']."
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
      <?php if(!empty($page_javascript)) : ?>
      <?php foreach($page_javascript as $fichier_javascript) : ?>
      <script src="<?= URL?>public/JavaScript/<?= $fichier_javascript ?>"></script>
      <?php endforeach; ?>
      <?php endif; ?>
</body>

</html>