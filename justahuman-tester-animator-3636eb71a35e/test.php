
<?php
    function cleaner($value){

        $value = strip_tags($value);
        $value = htmlspecialchars($value);
        $value = addslashes($value);
        $value = stripslashes($value);
        $value = trim($value);

        return $value;
    }

    if(isset($_POST['name'])){
        $name = cleaner($_POST['name']);
    }
?>

<?php
    $size = getimagesize("ii.png");
?>
<?php 
    echo $size[1]
?>