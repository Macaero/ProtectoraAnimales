<footer class="bg-secondary bg-gradient opacity-75 d-flex justify-content-around text-light rounded"> <!-- Pie -->
    <p class="p-1 m-2"><i class="bi bi-house"></i> Cáceres</p>
    <p class="p-1 m-2"><i class="bi bi-envelope"></i> protectorasol@gmail.com</p>
      </footer> <!-- Fin pie -->
    </main> <!-- Fin contenedor principal -->
    <script>
      /* Notificaciones mensajes */
      $.post(BASE_URL+"Chat/notificaciones",function(datos){
        console.log(datos);
        if(datos>0){
          $("#badgeChat").html(datos);
        }else{
          $("#badgeChat").html();
        }
      });
    </script>
  </body>
</html>