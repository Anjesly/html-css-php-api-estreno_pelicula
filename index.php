<?php

const  API_URL = "https://whenisthenextmcufilm.com/api";
# INICIALIZAMOS UNA NUEVA SESIÓN DE CURL; ch = cURL handle
$ch = curl_init(API_URL);
// INDICAR QUE QUEREMOS RECIBIR EL RESULTADO DE LA PETICIÓN Y NO MOSTRARLA EN PANTATLLA 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/*EJECULAMOSA LA PETICIÓN Y GUARDAMOS EL RESULTADO*/
$result = curl_exec($ch);
// UNA ALTERNATIVA SERÍA UTILIZAR FILE_GET-CONTENTS
//$result = file_get_contents(API_URL); // si solo quieres hacer un GTE de una API 
$data = json_decode($result, true);
curl_close($ch);
//var_dump($data); 
?>
<style>
    :root {
        background-color: #000;
        color : #fff;
    }
    body {
        display: grid;
        place-content: center;
    }
    section {
        display: flex;
        justify-content: center;
        text-align: center;
    }
    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
    img{
        margin: 0 auto;
    }
</style>
<head>
    <meta charset="utf-8"/>
    <title> La próxima peícula de Marvel</title>
    <meta  name="descripción" content="próxima pelicula de marvel"  />
    <meta  name="viewport" content="width=divice-idth, initial-scale=1.0"  />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"/>
</head>

<main>
    <section>
        <img src="<?= $data['poster_url'] ?>" alt="Poster de <?= $data['title'] ?>" width="200" 
        style="border-radius: 16px" />
    </section>
    <hgroup>
        <h3><?= $data['title'] ?> se estrena en <?= $data["days_until"] ?> días</h3>
        <p>Fecha de estreno: <?= $data['release_date'] ?> </p>
        <p>La siguiente es: <?= $data['following_production']['title'] ?></p>
    </hgroup>
</main>