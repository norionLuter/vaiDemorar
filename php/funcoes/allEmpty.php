<?php
// verificar dodas as variáveis vazias
function allEmpty() {
  foreach (func_get_args() as $arg) {

    if (empty($arg)) {

      continue;
    } else {

      return false;
    }
  }
  return true;
}


 ?>
