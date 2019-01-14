<?php
    CONST PHOTO_PATH = 'data/photo';
    CONST PHOTO_SMALL_PATH = 'data/photo_small';

    // подгружаем и активируем автозагрузчик Twig-а
    require_once 'Twig/Autoloader.php';
    Twig_Autoloader::register();

    try{
        // указываем где хранятся шаблоны
        $loader = new Twig_Loader_Filesystem('templates');
        
        // создаем объект Twig
        $twig = new Twig_Environment($loader);
            
        // подгружаем шаблон
        $template = $twig->loadTemplate('index.tmpl');
        
        // подгружаем картинки
        $photos_in_dir = array_slice(scandir(PHOTO_PATH),2);
        // формируем массив "ключ-значение" и передаем его в render()
        echo $template->render(array(
            'title' => 'Nature resources',
            'path_to_photo_small' => PHOTO_SMALL_PATH,
            'photos' => $photos_in_dir,
        ));
    }
    catch(Exception $e){
        echo 'Error: '.$e->getMessage();
    }
?>