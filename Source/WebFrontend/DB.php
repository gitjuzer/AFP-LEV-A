<?php
function DBconnect()
  {
    $uid = mysqli_connect('localhost', 'root', '');
    mysqli_set_charset($uid, 'utf8');
    mysqli_select_db($uid, 'test2');

    return $uid;
  }

function DBquery($id, $querystring, $mode)
  {
   // $lista = array();
   return $result = mysqli_query($id, $querystring);
   // if ($mode == 0)
   //   {
    //    while ($row = mysqli_fetch_array($result))
    //    { $lista[] = $row; }
    //    return $lista;
     // }

    //if ($mode == 1)
     // {
      //  return true;
      //}

  }

function DBclose($id)
  {
    mysqli_close($id);
  }

$row = array();
$adatok = array();


?>
