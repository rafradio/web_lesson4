<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<?php
  include 'sqlInsertPHP.php';
  $nameTitle = "После ввода цифр, нажмите 'Enter'.";

  $myfile = fopen("webinfo.txt", "r") or die("Unable to open file!");
  
  $name = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_REQUEST['celcii']);
            $connectSQL = new SqlInsert();
            if ($name != "") {
                $name2 = round(((9 / 5) * (int)$name + 32), 1);
                $connectSQL->send_toSql($name, $name2);
            }
            $connectSQL->close_conn();
            if (!empty($name)) {
                echo "<script>console.log('Температура: " . $name . "' );</script>";
            } 
  }

  $output = "Hello PHP";

  echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
?>
<html lang="ru">
<head>
<meta charset="utf-8">
<title>Weather converter</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,400;8..144,800&display=swap" rel="stylesheet">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <div class="title_descr">
            <div class="illustr">
                <img src="https://hsto.org/webt/82/ui/ik/82uiiktyk5fmbezropgye812p-4.png" alt="GeekBrains">
            </div>
            <div class="main_title">
                <h1>Конвертор температуры</h1>
                <h3>Из градусов C, в градусы F</h3>
            </div>
        </div>
        <div class="main_info">
            <div class="main_info_main">
                <div class="main_info_details">
                    <div class="name_my">Рафаиль Абдюшев</div>
                    <img src="temp_illustr.jpg" alt="Temperature">
                </div>
                <div class="main_info_details">
                    <h3>Температура в градусах<br>Цельсия</h3>
                    <div class="form-field">
                        <svg class="borderSVG" xmlns="http://www.w3.org/2000/svg">
                            <rect rx="8" ry="8" class="shape" />
                        </svg>
                        <form class="form-field__control" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                            <div class="test"></div>
                            <label for="firstname" class="form-field__label">Температура в Цельсиях</label>
                            <input id="firstname" type="text" class="form-field__input" name="celcii" value=<?php echo $name ?>>
                            <div class="calcButton"><i class="fa-solid fa-arrow-right calcF"></i></div>
                        </form> 
                    </div>
                    <div class="annot"><p><?php echo fgets($myfile); ?></p></div>
                    <div class="resetToZero"><p>Сбросить на ноль</p></div>
                </div>
                <div class="main_info_details">
                    <h3>Температура в градусах<br>Фаренгейта</h3>
                    <div class="form-field">
                        <form class="form-field__control" method="post">
                            <div class="test"></div>
                            <label for="secondname" class="form-field__label">Температура в Фаренгейтах</label>
                            <input id="secondname" type="text" class="form-field__input" name="farengeit">
                        </form>
                    </div>
                </div>
            </div>
            <div class="main_info_footer">
                <div class="footer_title"><p>Мои соц. сети</p></div>
                <div class="footer_info">
                    <a href="https://github.com/rafradio?tab=repositories"><p>GitHub</p></a>
                    <a href="https://codepen.io/rafradio"><p>CodePen.io</p></a>
                </div>
            </div>
        </div>
    </div>
    <script src="animation.js"></script>
</body>
</html>