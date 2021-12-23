<?php

function Read_Temperature($ip, $port, $adr, $nRegist)
{
  require_once '../../ModbusMaster/ModbusMaster.php';
  try {
    $modbus = new ModbusMaster($ip, "TCP", $port); //créer un trame Modbus
    $recData = $modbus->readMultipleRegisters(1, $nRegist, $adr);
    $val16bits = $recData[0] * 256 + $recData[1]; //Calcul de la valeur du mot
    return $val16bits;
  } catch (Exception $e) {
    if ($nRegist == 61) {
      return 2;
    }
    if ($nRegist == 59) {
      return 2;
    } else {
      echo "Aucune sonde de température n'est détecté";
    }
  }
}
function Lecture_Temperature($numerodesond)
{
  try {
    $temperature_sonde = Read_Temperature("192.168.52.232", 502, 1, 15 + $numerodesond) / 10; //Lire le registre de la sonde
    return $temperature_sonde;
  }
  #S'il y a une erreur alors on affiche qu'il y a un problème
  catch (Exception $e) {
    echo "Problème de lecture de la température pour enregistrer";
  }
}
#$mot_a_lire = (Read_Temperature("192.168.52.232",502,1,16))/10;
#$tmp = Lecture_Temperature(2);
#echo $tmp;
#$capteur1 = Lecture_Temperature(1);
#$capteur2 = Lecture_Temperature(2);
#$capteur3 = Lecture_Temperature(3);
#$capteur4 = Lecture_Temperature(4);
?>

<!DOCTYPE html>
<html>

<body style="text-align:center;">


  <h4>
    Ventilateur
  </h4>
  <?php

  if (array_key_exists('button1', $_POST)) {
    Allumer_Ventilateur();
  }
  if (array_key_exists('button2', $_POST)) {
    Eteindre_Ventilateur();
  }
  if (array_key_exists('button3', $_POST)) {
    Allumer_Resistance();
  }
  if (array_key_exists('button4', $_POST)) {
    Eteindre_Resistance();
  }

  function Allumer_Ventilateur()
  {
    Ecrire_mot("192.168.52.232", 502, 4, 1);
  }
  function Eteindre_Ventilateur()
  {
    Ecrire_mot("192.168.52.232", 502, 4, 0);
  }
  function Allumer_Resistance()
  {
    Ecrire_mot("192.168.52.232", 502, 5, 1);
  }
  function Eteindre_Resistance()
  {
    Ecrire_mot("192.168.52.232", 502, 5, 0);
  }
  function Ecrire_mot($ip, $port, $adr, $value)
  {
    require_once dirname(__FILE__) . '\ModbusMaster.php';
    $modbus = new ModbusMaster($ip, "TCP", $port);
    $data = array($value);
    $dataType = array("WORD");
    $modbus->writeMultipleRegister(0, $adr, $data, $dataType); // envoi de l'ordre pour allumer le ventilateur
  }
  ?>

  <form method="post">
    <input type="submit" name="button1" class="button" value="Allumer Ventilateur" />
    <input type="submit" name="button2" class="button" value="Eteindre Ventilateur" />
    <input type="submit" name="button3" class="button" value="Allumer Resistance" />
    <input type="submit" name="button4" class="button" value="Eteindre Resistance" />
</body>

</html>