<?php

$xml = simplexml_load_file('signos.xml');
$nome = $_GET['nome'];
$nome = utf8_decode($nome);
$inputdata = $_GET['inputdata'];
$calculosigno = explode('-',$inputdata);

foreach ($calculosigno as $stringarray){
    $dia = (int)$calculosigno[2];
    $mes = (int)$calculosigno[1];
    $ano = (int)$calculosigno[0];
};

$dia2 = $dia.'/'.$mes.'/'.$ano;
$join = $mes.'/'.$dia;
$join = strtotime($join);

foreach($xml->signo as $signos){
    $dataIni = explode('/', $signos->dataInicio);
    $dataIni = $dataIni[1].'/'.$dataIni[0];

    $dataFim = explode('/', $signos->dataFim);
    $dataFim = $dataFim[1].'/'.$dataFim[0];

      if($join <= strtotime($dataFim) && $join >= strtotime($dataIni)){
            echo 'Olá, '.$nome.' o seu aniversário é no dia: '.$dia2;
            echo '<p>'.'O seu signo é: '.$signos->signoNome.'</p>';
            echo '<p>'.'As características desse signo são: '.$signos->descricao.'</p>';
        }    
}

?>
