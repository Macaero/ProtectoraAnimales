<script src="https://www.paypal.com/sdk/js?client-id=ATo0nUedIdmP3_6PDRgOH_RjNuF2CgWnZIm7WlwDk9wUBeVnBUYI6odJLSU7w3E6qftlS6fLrmhN1Mws&currency=EUR"></script>
<script src="<?php echo BASE_URL; ?>app/views/donaciones_v.js"></script>
<section class="row d-flex justify-content-center">
    <div class="col-5 bg-light text-center p-5 m-5 border border-dark rounded fs-4">
        <p>¡Muchas gracias por ayudarnos!</p>
        <p>Introduzca el importe que desea donar</p>
        <input type="number" name="importe" id="importe" step="0.01" class="p-1">
        <button id="btnPaypal" class="btn btn-outline-dark m-1"><i class="bi bi-paypal"></i></button>
        <div id="mensaje" class="m-1 p-1"></div>
        <div id="contenedor" class="m-3 p-1"></div>
        <div id="historial" class="mt-2"></div>
    </div>
</section>