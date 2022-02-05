<?php
    $archivos = $_FILES['subirArchivo'];
    $tipo = $archivos['type'];


    // Validar que es una imagen
    if($tipo === 'image/jpeg' || $tipo === 'image/png' || $tipo === 'image/gif'){
        // Validar que no incluya extencion .php
        if(!strpos($archivos['name'],'.php')){
            // Validar si existe la carpeta images si no la crea.
            if(is_dir('images')){
                // Guaradr en una variable el nombre y el nommbre temporal
                $nameArchivo = $archivos['name'];
                $tipoArchivo = $archivos['type'];
                $nameTemps = $archivos['tmp_name'];

                // Guaradr la imagen en la carpeta img
                    move_uploaded_file($nameTemps,'./images/'.$nameArchivo);
                    // header('Refresh: 5s; URL=update_file.php');
                    // echo 'Imagen Subida correctamente';
                    header('Location: http://localhost/file_update/');
                //Insertar ip y sistema de navegador
                $fichero = fopen('log.txt', 'a+');
                // Variables: -IP , -Navegador
                $ip = $_SERVER['REMOTE_ADDR'];
                $navegador = $_SERVER['HTTP_USER_AGENT'];
                $templateInsertLog = 'Log Date => '.date('l jS \of F Y ') ."\n"
                ."-----------------------------------------------------" ."\n"
                . ' Ip maquina subida de archivo => '.$ip ."\n"
                .' HTTP_USER_AGENT is => '.$navegador ."\n"
                .' File Update is => '.$nameArchivo ."\n"
                .' Date Update File => '. date('l jS \of F Y h:i:s A') ."\n"
                ."-----------------------------------------------------"."\n";
                fwrite($fichero, $templateInsertLog);
        }else{
            mkdir('./images',0777);
            // Guaradr en una variable el nombre y el nommbre temporal
                $nameArchivo = $archivos['name'];
                $tipoArchivo = $archivos['type'];
                $nameTemps = $archivos['tmp_name'];

                // Guaradr la imagen en la carpeta img
                    move_uploaded_file($nameTemps,'./images/'.$nameArchivo);
                    // header('Refresh: 5s; URL=update_file.php');
                    // echo 'Imagen Subida correctamente';
                    header('Location: http://localhost/file_update/');
                //Insertar ip y sistema de navegador
                $fichero = fopen('log.txt', 'a+');
                // Variables: -IP , -Navegador
                $ip = $_SERVER['REMOTE_ADDR'];
                $navegador = $_SERVER['HTTP_USER_AGENT'];
                $templateInsertLog = 'Log Date => '.date('l jS \of F Y ') ."\n"
                ."-----------------------------------------------------" ."\n"
                . ' Ip maquina subida de archivo => '.$ip ."\n"
                .' HTTP_USER_AGENT is => '.$navegador ."\n"
                .' File Update is => '.$nameArchivo ."\n"
                .' Date Update File => '. date('l jS \of F Y h:i:s A') ."\n"
                ."-----------------------------------------------------"."\n";
                fwrite($fichero, $templateInsertLog);
        }
        }else{
            echo 'No se admiten archivos .php por seguridad';
            echo '<h1>Suba una imagen con las extenciones .jpg, .png, .gif.</h1>';
            die();
        }
        
    }else{
        echo '<h1>Suba una imagen con las extenciones .jpg, .png, .gif.</h1>';
    }
