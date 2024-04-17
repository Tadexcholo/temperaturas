<?php
require __DIR__ . '/vendor/autoload.php';

$options = array(
  'cluster' => 'us2',
  'useTLS' => true
);

$pusher = new Pusher\Pusher(
  'c9a1745350483af9e80c',
  '0a0142bc8113851294c1',
  '1767953',
  $options
);

// Verifica si se han enviado tanto el mensaje como el nombre de usuario
if(isset($_POST['txtMensaje']) && isset($_POST['username'])) {
  // Extrae el mensaje y el nombre de usuario del formulario POST
  $message = $_POST['txtMensaje'];
  $username = $_POST['username'];

  // Combina el mensaje y el nombre de usuario en un array
  $data = array(
    'txtMensaje' => $message,
    'user' => $username
  );

  // Envía el mensaje a Pusher
  $pusher->trigger("my-channel", "my-event", $data);
}
?>
