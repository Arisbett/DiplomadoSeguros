<?php include "include/header.php"?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Boton Flotante con Css</title>

    <!--Icon-Font-->

    <style>
    #btn-mas {
        display: none;
        margin: 50px;
        margin-right: 50px;
    }

    .redes a,
    .btn-mas label {
        display: block;
        text-decoration: none;
        width: 55px;
        height: 55px;
        line-height: 55px;
        text-align: center;
        border-radius: 50%;
        box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.4);
        transition: all 500ms ease;
    }

    .redes a {
        margin-bottom: -15px;
        opacity: 0;
        visibility: hidden;
    }

    #btn-mas:checked~.redes a {
        margin-bottom: 10px;
        opacity: 1;
        visibility: visible;
    }

    .btn-mas label {
        cursor: pointer;

        font-size: 23px;
    }

    #btn-mas:checked~.btn-mas label {
        transform: rotate(360deg);
        font-size: 25px;
        margin-left: -60px;
        margin-bottom: 50px;
    }
    </style>
</head>

<body>
    <div class="container">
        <input type="checkbox" id="btn-mas">
        <div class="redes">
            <a href="#"><iframe width="350" height="430" allow="microphone;"
                    src="https://console.dialogflow.com/api-client/demo/embedded/9bce53f4-790c-46cb-b620-b51599eabc29"></iframe></a>

        </div>
        <div class="btn-mas">
            <label for="btn-mas" class="glyphicon glyphicon-info-sign
"></label>
        </div>
    </div>
</body>

</html>







<?php include "include/footer.php"?>