<?php
require_once("cnpj.php");


function verificaDadosCadastroEmpresa($email,$cnpj,$senha){


  //verifica se é email
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo "Informe uma email válido";
    exit();
  }

  //verifica se é cnpj
  if( strlen($cnpj)<14 || !preg_match("((\d{2}).(\d{3}).(\d{3})/(\d{4})-(\d{2}))",$cnpj) || !isCnpjValid($cnpj)){
    echo "Informe um cnpj válido";
    exit();
  }

  //senha no mínimo 8 caracteres
  if(strlen($senha)<8){
    echo "Sua senha tem que ter 8 caracteres no mínimo";
    exit();
  }

}

//verificar_dados_cadastro_empresa(1,2,3,4,5,6);

 ?>
