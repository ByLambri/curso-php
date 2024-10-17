<?php 
    const API_URL = 'https://whenisthenextmcufilm.com/api';
    #Inicializar una nueva sesion de cURL; ch = cURL handle
    $ch = curl_init(API_URL);
    //indicar que queremos recibir el resultado de la peticion y no mostrarlo en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    /* Ejecutar la petición 
       y guardamos el resultado
    */
    $result = curl_exec($ch);

    // una alternatva seria utilizar file_get_contents
    // $result = file_get_contents(API_URL);//si solo quieres hacer un GET de una API

    $data = json_decode($result, true);

    curl_close($ch);

    
?>  

<head>
    <title>La proxima pelicula de Marvel</title>
    <meta name="description" content="La proxima pelicula de Marvel">
    <meta name="viewport" content="Width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >

</head>

<main>
    <!-- 
    <pre style="font-size: 15px; overflow: scroll; height: 250px">
        <?php var_dump($data); ?>
    </pre>
    -->


    <section>
        
        <img src="<?= $data["poster_url"]; ?>" width="200" alt="Poster de <?= $data["title"]; ?>"
        style="border-radius: 16px"/>
        
    </section>

    <hgroup>
        <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"] ?></h3>
        <p>Fecha de estreno <?= $data["release_date"]; ?></p>
        <p>la siguiente es: <?= $data["following_production"]["title"] ?></p>
    </hgroup>

</main>
  

<style>
    
    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img{
        margin: 0 auto;
    }

    body{
        display: grid;
        place-content: center;
        background-color: black;
        color: white;
    }
</style>