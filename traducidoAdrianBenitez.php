<?php

    session_start(); 

    //Si se acaba de seleccionar un idioma en el formulario
    if(!empty($_POST['lengua'])){
        //El idioma se almacena en SESSION
        $_SESSION['lengua'] = $_POST['lengua'];
        header('Location: traducidoAdrianBenitez.php');
    }else{
        //Si no se ha seleccionado un idioma en el formulario
        //Si no hay idioma en la SESSION
        if(empty($_SESSION['lengua'])){

            //Accede al idioma del navegador
            $idiomasNavegador = locale_accept_from_http($_SERVER['HTTP_ACCEPT_LENGUAGE']);

            //Guarda en la session el idioma por defecto. Si no hay configuración se guarda Castellano
            if(str_contains($idiomasNavegador[0], 'ca')){
                $_SESSION['lengua'] = "ca-valencia";
            }
        
            if(str_contains($idiomasNavegador[0], 'en')){
                $_SESSION['lengua'] = "en-US";
            }else{
                $_SESSION['lengua'] = "es-ES";
            }
            header('Location: traducidoAdrianBenitez.php');
        }  
    }
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WikiSquanch</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="idioma">
        <?php
            echo '<img src="img/'.$_SESSION['lengua'].'.png" width="30px">';
            echo $_SESSION['lengua'];
        ?>
        <form name="formulario" method="POST" action="#">
           
            <select name="lengua">
            <?php 
                $id = ["es-ES" => "Castellano", "ca-valencia" => "Valencià", "en-US" => "Ingles"];
                foreach($id as $k => $v){
                    echo '<option value="'.$k.'"';
                    if($k == $_SESSION['lengua']){
                        echo 'selected';
                    } 
                    echo '>'.$v.'</option>';
                }
            ?>
            </select>
            <input type="submit" value="Seleccionar">
        </form>
    </div>

    <?php
        echo '<div id=content>';
        echo '<h2>WikiSquanch</h2>';
        if($_SESSION['lengua'] == 'en-US'){
            echo "<p>Squanch is a cat-like anthropomorphic creature that was invited to Rick and Summer's party in 'Ricksy Business'.</p>";
            echo "<p> He is a recurring character in Rick and Morty, and very good friends with Rick, sharing his love for alcohol. Morty and Jessica first meet Squanchy engaging in auto-erotic asphyxiation masturbation in Morty's garage. This marks the first among many things he refers to as 'squanching.' </p>";
            echo '<table>';
            echo '<tr>';
            echo '<td>Specie</td>';
            echo '<td>Squanchy</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>Place of origin</td>';
            echo '<td>Planet Squach</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>Voice actor</td>';
            echo '<td>Tom Kenny</td>';
            echo '</tr>';
            echo '</table>';
        }

        if($_SESSION['lengua'] == 'es-ES'){
            echo "<p>Squanch es una criatura parecida a un gato antropomórfico que fue invitado a la fiesta de Rick y Summer en 'Ricksy Business'.</p>";
            echo "<p>Es un personaje recurrente en Rick and Morty, y un muy buen amigo de Rick, que comparte su amor por el alcohol. Morty y Jessica conocen a Squanchy por primera vez al participar en una masturbación por asfixia autoerótica en el garaje de Morty. Esto marca la primera de muchas cosas a las que se refiere como 'squanchear'.</p>";
            echo '<table>';
            echo '<tr>';
            echo '<td>Especie</td>';
            echo '<td>Squanchy</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>Planeta de origen</td>';
            echo '<td>Planeta Squach</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>Actor de doblaje</td>';
            echo '<td>Tom Kenny</td>';
            echo '</tr>';
            echo '</table>';
        }

        if($_SESSION['lengua'] == 'ca-valencia'){
            echo "<p>Squanch es una criatura pareguda a un gat antropomorfic que va ser invitat a la festa de Rick i Summer en 'Ricks Business'.</p>";
            echo "<p>Es un personatje recurrent a Rick and Morty, i un molt bó amic de Rick, que comparteix el seu amor per l'alcohol. Morty i Jessica coneixen a Squanch per primera volta a una masturbació per asfixia autoerótica al garatje de Morty. Aixo marca la primera de moltes coses a les que es referix com 'squanxear'.</p>"; 
            echo '<table>';
            echo '<tr>';
            echo '<td>Espècie</td>';
            echo '<td>Squanchy</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>Planeta d\'origen</td>';
            echo '<td>Planeta Squach</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>Actor de doblatge</td>';
            echo '<td>Tom Kenny</td>';
            echo '</tr>';
            echo '</table>';
        }

        
    ?>
    <br>
    <img src="img\squanch.gif" alt="">
    <br>
    <img src="img\squanch2.png" width="120px">
    <br>
    <img src="img\squanch.jpg" width="120px">

    </div>

</body>
</html>