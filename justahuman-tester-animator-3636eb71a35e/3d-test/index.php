<?php 
    $path_to_obj_file = 'raptor.obj'; 
    $path_to_obj_texture = 'raptor.jpg'; 
    
    // это просто пример
    // проверяет строку на наличие того или иного слова или просто символа
    if(strpos($path_to_obj_file, '.obj') == true){
        $message = 'Название файла содержит .obj';
    }else{
        $message = 'Название файла не содержит .obj';
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        
        <?php if(isset($message)){ ?>
        <div style="position:fixed;z-index:99;top:10px;left:10px;padding:10px;background:black;color:white;">
            <?php echo $message; ?>
        </div>
        <?php } ?>
        
        <script type="text/javascript" src="scenejs.min.js"></script>
        <script type="text/javascript">
            SceneJS.setConfigs({
                pluginPath: "plugins"
            });

            SceneJS.createScene({
                        nodes: [
                            {
                                type: "cameras/orbit",
                                yaw: -40,
                                pitch: -20,
                                zoom: 200,
                                zoomSensitivity: 20.0,
                                nodes: [
                                    {
                                        type: "translate", y: -30, z: -20,
                                        nodes: [
                                            {
                                                type: "texture",
                                                src: "<?php echo $path_to_obj_texture; ?>",

                                                nodes: [
                                                    {
                                                        type: "import/obj",
                                                        src: "<?php echo $path_to_obj_file; ?>"
                                                    }
                                                ]
                                            }
                                        ]
                                    }
                                ]
                            }
                        ]
                    }
            );
        </script>
    </body>
</html>