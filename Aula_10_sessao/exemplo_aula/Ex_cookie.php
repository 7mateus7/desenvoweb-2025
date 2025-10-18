<?php
// 86400 = 1 dia - *30 – Expires em 30 dias

setcookie("usuario", "nome_user", time() + (86400 * 30), "/");
echo "<html>";
echo "<body>"; 

if(!isset($_COOKIE["usuario"])) {
echo "O Cookie 'usuario' não foi definido!";
} else {
echo "Cookie 'usuario' definido!<br>";
echo "O valor é: " . $_COOKIE["usuario"];
}

echo "</body>";
echo "</html>";

?>