<?php

/**
 * استایل های پیش فرض و مورد نیاز را اضافه می کند
 */
function get_default_styles()
{
?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php
}

/**
 * اسکریپت های پیش فرض و مورد نیاز را اضافه می کند
 */
function get_default_scripts()
{
?>
    <script src="node_modules/moment/min/moment.min.js"></script>
    <script src="node_modules/moment-jalaali/build/moment-jalaali.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?php
}

/**
 * استایل خواسته شده را اضافه می کند
 * 
 * @param   $href   آدرس استایل مورد نظر
 */
function add_style($href)
{
?>
    <link rel="stylesheet" type="text/css" href="<?php echo $href . '?v=' . VERSION; ?>">
<?php
}

/**
 * اسکریپب خواسته شده را اضافه می کند
 * 
 * @param   $href   آدرس اسکریپت مورد نظر
 */
function add_script($src)
{
?>
    <script src="<?php echo $src . '?v=' . VERSION; ?>"></script>
<?php
}

?>