<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ticket</title>

        <style>
            @page {
                margin-top: 30px;
                margin-bottom: 0px;
                margin-right: 10px;
                margin-left: 10px;

            }

            * {
                font-family: sans-serif;
            }

            .datos-ticket span {
                font-size: 17px;
                word-spacing: 0px;
                letter-spacing: 1px;
            }

            .datos-ticket .vendedor {
                float: right;
            }

            .portada {
                width: 789px;
                height: 559px;
                position: absolute;
            }

            .datos-rifa {
                position: relative;
                margin-top: 5px;
            }

            .datos-rifa .empresa {
                font-style: italic;
                font-size: 35px;
                margin-left: 20px;
            }

            .datos-rifa .numero {
                font-size: 75px;
                float: right;
            }

            .datos-rifa .valor {
                text-align: center;
                font-weight: 500;
                font-size: 35px;
                margin-top: 5px;
                letter-spacing: 1px;
            }

            .datos-rifa .precio {
                font-size: 55px;
            }

            .datos-rifa .premios div span {
                font-weight: bold;
            }

            .grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }

            .col {
                padding: 0 20px;
                justify-self: center;
            }

            .grid > .col:last-child:nth-child(odd) {
                grid-column: span 2;
                justify-self: center;
            }

        </style>
    </head>

    <body>
        <div class="datos-ticket">
            <!-- <span class="fecha-hora">{{ $fechaHora }}</span> -->
            <span class="vendedor">vendedor: {{ $vendedor }}</span>
        </div>

        <img src='images/manos.png' class="portada">

        <div class="datos-rifa">
          <strong class="empresa">Miller365</strong>
          <strong class="numero">#{{ $numero }}</strong>

          <p class="valor">Valor $<strong class="precio">{{ $valor }}</strong></p>

          <div class="premios grid">
            <div class="col"> 
                <span>1era <strong>${{ $premio1 }}</strong></span>
            </div>
            <div class="col"> 
                <span>4ta <strong>${{ $premio4 }}</strong></span>
            </div>
            <div class="col"> 
                <span>2da <strong>${{ $premio2 }}</strong></span>
            </div>
            <div class="col"> 
                <span>5ta <strong>${{ $premio5 }}</strong></span>
            </div>
            <div class="col"> 
                <span>3era <strong>${{ $premio3 }}</strong></span>
            </div>
            <div class="col"> 
                <span>6ta <strong>${{ $premio6 }}</strong></span>
            </div>
            <div class="col"> 
                <span>7ma <strong>${{ $premio7 }}</strong></span>
            </div>
          </div>

        </div>


    </body>

</html>