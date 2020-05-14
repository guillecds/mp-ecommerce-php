<?php

// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

$access_token = 'APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398';
$payment_id = $_POST["payment_id"];

$cURLConnection = curl_init();
curl_setopt($cURLConnection, CURLOPT_URL, "https://api.mercadopago.com/v1/payments/$payment_id?access_token=$access_token");
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonResponse = json_decode($response);

$order_id = $jsonResponse->order->id;
$payment_method_id = $jsonResponse->payment_method_id;
$transaction_amount = $jsonResponse->transaction_amount;

?>


<div class="container m-t-20">
    <div class="container">
		  <div class="jumbotron text-center">
			  <h1 class="display-3">Gracias por su compra!</h1>
			  <p class="lead"><strong>Pago aprobado</strong> nuestro equipo de postventa revisará el pago y cuando sea acreditado le enviaremos el comprobante de su compra y detalles sobre la entrega de sus articulos.</p>
			  <hr>
			   	ID Pago de MercadoPago: <?= $payment_id ?>
			  <br>
			  	Número de orden del pedido: <?= $order_id ?>
			  <br>
			  	payment_method_id: <?= $payment_method_id ?>
			  <br>
			  	Monto pagado: <?= $transaction_amount ?>
		</div>
    </div>
</div>
