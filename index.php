<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Rick and Morty Api</title>
</head>
<body>
    <?php
        $datos = file_get_contents("https://rickandmortyapi.com/api/character");
        $datos = json_decode($datos, true);
        $array_data = [];
        foreach ($datos["results"] as $clave => $valor) {
            $data = [
                "name" => $valor["name"],
                "image" => $valor["image"],
                "status" => $valor["status"],
                "species" => $valor["species"],
                "gender" => $valor["gender"],
                "origin" => $valor["origin"]["name"],
                "location" => $valor["location"]["name"],
                "episode" => $valor["episode"],
                "created" => $valor["created"]
            ];
            array_push($array_data, $data);
        }
    ?>

    <header>
        <div class="navegacion-principal"> 
            <nav class="menu">
                <a href="#">Docs</a>
                <a href="#">About</a>
                <a href="#">SUPPORT US</a>
            </nav>
        </div>
    
        <h1 class="titulo">The Rick and Morty API</h1>
    </header>
    <main class="contenedor">
        <div class="contenedor_tarjeta">
            <?php
                foreach ($array_data as $clave => $valor) { ?>
                    <div class="contenedor_json">
                        <div class="imagen_json">
                            <img src="<?php echo $valor["image"] ?>" alt="cargando imagen">
                        </div>
                        <div class="info_json">
                            <h2><?php echo $valor["name"] ?> <br> 
                                <span class="estado">
                                    <?php echo $valor["status"] ?> - <?php echo $valor["species"] ?>
                                </span>
                            </h2>

                            <p class="titulo_info">Last known location: <br>
                                <span class="subtitulo_info"> <?php echo $valor["location"] ?> </span> 
                            </p>
                            <p class="titulo_info">First seen in: <br> 
                                <span class="subtitulo_info"> <?php echo $valor["origin"] ?> </span> 
                            </p>
                        </div>
                    </div>
                <?php } 
            ?>
        </div>
    </main>

    <footer class="footer">
        <p> By <span class="footer-bold"> Yazmin Gutierrez <span>&#128151;</span> Erika Camacho </span> - 2022 </p>
    </footer>
   
</body>
</html>