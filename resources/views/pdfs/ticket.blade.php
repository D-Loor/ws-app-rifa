<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ticket</title>

        <style>
            @page {
                margin-top: 80px;
                margin-bottom: 0px;
                margin-right: 40px;
                margin-left: 40px;
            }

            * {
                font-family: sans-serif;
            }

            .container {
                padding: 0 40px;
            }

            .datos-ticket span {
                font-size: 17px;
                word-spacing: 0px;
                letter-spacing: 1px;
            }

            .datos-ticket .vendedor {
                position: absolute;
                right: 0;
                margin-right: 48px;
            }

            .portada {    
                margin-top: 180px;
                width: 630px;
                height: 559px;
                position: absolute;
                opacity: 0.5;
            }

            .datos-rifa {
                position: relative;
                padding-top: 30px;
                margin-top: 35px;
            }

            .datos-rifa .empresa {
                font-style: italic;
                font-size: 50px;
                margin-left: 20px;
            }

            .datos-rifa .numero {
                font-size: 95px;
                position: absolute;
                right: 0;
            }

            .datos-rifa .valor {
                text-align: center;
                font-weight: bold;
                font-size: 50px;
                margin-top: 60px;
                letter-spacing: 1px;
            }

            .datos-rifa .precio {
                font-size: 70px;
            }

            .premios-table {
                width: 100%;
                border-collapse: collapse;
            }

            .premios-table td {
                font-size: 40px;
                font-weight: bold;
                padding: 10px;
                text-align: center;
            }

            .premios-table td strong{ 
                font-size: 75px;
            }

            .full-width {
                text-align: center;
            }

            .footer {
                margin-top: 160px;
                font-size: 16px;
                text-align: center;
            }

            .footer .fecha{
                word-spacing: 200px;
                text-decoration: underline;
            }

            .footer .condiciones {
                font-weight: bold;
            }

        </style>
    </head>

    <body>
        <div class="container">
            <div class="datos-ticket">
                <span class="vendedor">vendedor: {{ $vendedor }}</span>
            </div>

            <img src='images/manos.png' class="portada">

            <div class="datos-rifa">
                <strong class="empresa">Miller365</strong>
                <strong class="numero">#{{ $numero }}</strong>

                <p class="valor">Valor $<strong class="precio">{{ $valor }}</strong></p>

                <table class="premios-table">
                    <tr>
                        <td>1era <strong>${{ $premio1 }}</strong></td>
                        <td>4ta <strong>${{ $premio4 }}</strong></td>
                    </tr>
                    <tr>
                        <td>2da <strong>${{ $premio2 }}</strong></td>
                        <td>5ta <strong>${{ $premio5 }}</strong></td>
                    </tr>
                    <tr>
                        <td>3era <strong>${{ $premio3 }}</strong></td>
                        <td>6ta <strong>${{ $premio6 }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="full-width">7ma <strong>${{ $premio7 }}</strong></td>
                    </tr>
                </table>

            </div>

            <div class="footer">
                <p class="fecha">{{ $fecha }}                      Miller365</p>

                <p class="condiciones">Todo boleto ganador tiene 7 días de vigencia para reclamar tu premio.</p>
            </div>
        </div>
        


    </body>

</html>