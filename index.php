<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update file to server - PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <br /><br /><br /><br />
    <main role="main" class="main__container">
        <h2 class="f-size-medium color-violet ">Imagenes Subidas</h2>
        <section class="images-update-view">
            <?php
            $folder = opendir('./images');
            while (($img = readdir($folder)) !== false) : ?>
                <?php if ($img != '.' && $img != '..') : ?>
                    <div class=<?php echo 'image-item' ?>>
                        <?php echo "<img class='img-file-update' src='images/$img' width='320' height='320' />"; ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </section>
        <form class="form_update_file" action="update.php" method="POST" enctype="multipart/form-data">
            <input type="file" id="value_image" name="subirArchivo">
            <input type="submit" value="UPDATE">
        </form>
    </main>
</body>

</html>
