<?php
  //Variáveis

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $opcoes = $_POST['escolhas'];
  $mensagem = $_POST['msg'];

  // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
  date_default_timezone_set('America/Sao_Paulo');

  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');

  // Corpo E-mail
  $arquivo = "
    <style type='text/css'>
      body {
      margin:0px;
      font-family:Verdane;
      font-size:12px;
      color: #666666;
      }
      a{
        color: #666666;
        text-decoration: none;
      }
      a:hover {
        color: #FF0000;
        text-decoration: none;
      }
    </style>
    
    <html>
      <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
        <tr>
          <td>
            <tr>
              <td width='500'>Nome: $nome</td>
            </tr>
            <tr>
              <td width='320'>E-mail: <b>$email</b></td>
            </tr>
            <tr>
              <td width='320'>Telefone: <b>$telefone</b></td>
            </tr>
            <tr>
              <td width='320'>Opções: $opcoes</td>
            </tr>
            <tr>
              <td width='320'>Mensagem: $mensagem</td>
            </tr>
          </td>
        </tr>  
        <tr>
          <td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
        </tr>
      </table>
    </html>
 ";

//enviar
   
  // emails para quem será enviado o formulário
  $emailenviar = "emailQueRecebera@host.com";
  $destino = $emailenviar;
  $assunto = "Contato pelo Site";
 
  // É necessário indicar que o formato do e-mail é html
  $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=utf8_encode(data)' . "\r\n";
      $headers .= "From: $nome ";
  //$headers .= "Bcc: $EmailPadrao\r\n";
   
  $enviaremail = mail($destino, $assunto, $arquivo, $headers);
  if($enviaremail){
    $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> Obrigado pelo contato!!!";
    echo "$mgm <meta http-equiv='refresh' content='4;URL=index.html'>";
  } else {
    $mgm = "ERRO AO ENVIAR E-MAIL!";
    echo "$mgm <meta http-equiv='refresh' content='4;URL=index.html'>";
   }
?>