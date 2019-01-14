<?php
    CONST PHOTO_PATH = 'data/photo';
    CONST PHOTO_SMALL_PATH = 'data/photo_small';

    // подгружаем и активируем шаблон Twig-а
    require_once('Twig/Autoloader.php');
    Twig_Autoloader::register();

    try{
        // инициализируем загрузчик шаблонов
        $loader = new Twig_Loader_Filesystem('templates');
        
        // создаем объект Twig-a
        $twig = new Twig_Environment($loader);
        
        // подгружаем шаблон photo.tmpl
        $template = $twig->loadTemplate('photo.tmpl');
        
        // подгружаем картинку
        $photo = stripcslashes($_GET['photo']);
            if(!file_exists(PHOTO_PATH . '/' .$photo)) throw new Exception('photo is missing');
        // формируем массив "ключ-значение" и передаем его в render()
        echo $template->render(array(
            'title' => 'Resource',
            'photo_path' => PHOTO_PATH,
            'photo' => $photo,
        ));
    }
    catch(Exception $e){
        echo 'Error: '.$e->getMessage();
    }
?>