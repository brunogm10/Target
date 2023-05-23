<?php

// Tópico 1

//Variavel
$indice = 13;
$soma = 0;
$k = 0;

while($k < $indice){
    $k++;
    $soma += $k;
}

//Exibe o resultado
echo "<h1>Resultado</h1>";
echo "<p>Indice: $indice</p>";
echo "<p>Soma: $soma</p>";

/////////////// Fim Tópico 1


// Tópico 2
//Sequencia de Fibonacci
$numero = 34;
$matriz = array(
    "Anterior"=>0,
    "Atual"=>1,
    "Proximo"=>0,
    "Lista"=>array()
);

if (isset($_GET['numero']))
    $numero = $_GET['numero'];
    
while ($matriz['Anterior'] < $numero) {
    $matriz['Lista'][] = $matriz['Anterior'];
    $matriz['Proximo'] = $matriz['Anterior'] + $matriz['Atual'];
    $matriz['Anterior'] = $matriz['Atual'];
    $matriz['Atual'] = $matriz['Proximo'];
}

//Verifica se o numero existe na Lista
if (in_array($numero, $matriz['Lista']))
    $resultado = "O número $numero existe na sequência de Fibonacci";
else
    $resultado = "O número $numero não existe na sequência de Fibonacci";
/////////////// Fim Tópico 2


// Tópico 3

//carrega o arquivo json
$json = file_get_contents("dados.json");
//decodifica o arquivo json
$json = json_decode($json, true);

//Variaveis
$menorValor = array(
    "dia"=>0,
    "valor"=>0
);

$maiorValor = array(
    "dia"=>0,
    "valor"=>0
);

//Busca o menor valor
foreach ($json as $key => $value) {
    if ($menorValor['valor'] == 0 || ($value < $menorValor['valor'] && $value != 0)) {
        $menorValor['dia'] = $key;
        $menorValor['valor'] = $value;
    }
}

//Busca o maior valor
foreach ($json as $key => $value) {
    if ($maiorValor['valor'] == 0 || ($value > $maiorValor['valor']  && $value != 0)) {
        $maiorValor['dia'] = $key;
        $maiorValor['valor'] = $value;
    }
}

//Criar análise de Dados
$analise = array(
    "semFaturamento"=>0,
    "comFaturamento"=>0,
    "totalFaturado"=>0.0,
    "mediaFaturado"=>0.0,
    "DiasAcimaMedia"=>array()
);

//Conta os valores faturados e somatória
foreach ($json as $key => $value) {
    if ($value == 0)
        $analise['semFaturamento']++;
    else
        $analise['comFaturamento']++;
    
    $analise['totalFaturado'] += $value;
}

//Cria a médias dos valores faturados
$analise['mediaFaturado'] = $analise['totalFaturado'] / $analise['comFaturamento'];

//Busca os dias acima da média
foreach ($json as $key => $value) {
    if ($value > $analise['mediaFaturado'])
        $analise['DiasAcimaMedia'][] = $key;
}

//Exibo os resultados
echo "<h1>Menor Valor</h1>";
echo "<p>Dia: ".$menorValor['dia']." - Valor: ".$menorValor['valor']."</p>";
echo "<h1>Maior Valor</h1>";
echo "<p>Dia: ".$maiorValor['dia']." - Valor: ".$maiorValor['valor']."</p>";
echo "<h1>Análise de Dados</h1>";
echo "<p>Dias sem Faturamento: ".$analise['semFaturamento']."</p>";
echo "<p>Dias com Faturamento: ".$analise['comFaturamento']."</p>";
echo "<p>Total Faturado: ".$analise['totalFaturado']."</p>";
echo "<p>Média Faturado: ".$analise['mediaFaturado']."</p>";
echo "<p>". count($analise['DiasAcimaMedia']) ." Dias Acima da Média: ".implode(", ", $analise['DiasAcimaMedia'])."</p>";

/////////////// Fim Tópico 3

// Tópico 4

//Variaveis
$faturamento = array(
    "SP"=>67836.43,
    "RJ"=>36678.66,
    "MG"=>29229.88,
    "ES"=>27165.48,
    "Outros"=>19849.53
);

$percentual = array(
    "SP"=>0.0,
    "RJ"=>0.0,
    "MG"=>0.0,
    "ES"=>0.0,
    "Outros"=>0.0
);

$totalFaturamento = 0.0;

//Calcula o total do faturamento
foreach ($faturamento as $key => $value) {
    $totalFaturamento += $value;
}

//Calcula o percentual de cada estado
foreach ($faturamento as $key => $value) {
    $percentual[$key] = ($value / $totalFaturamento) * 100;
}

//Exibe o resultado
echo "<h1>Faturamento</h1>";
echo "<p>Total Faturamento: $totalFaturamento</p>";
echo "<p>Percentual de cada estado</p>";
foreach ($percentual as $key => $value) {
    echo "<p>$key: $value%</p>";
}

/////////////// Fim Tópico 4

// Tópico 5

//Variaveis
$texto = "Inverter Texto";
$inverso = "";

// Inverte o texto e armazena na variavel $inverso
for ($i = strlen($texto); $i >= 0; $i--) {
    $inverso .= substr($texto, $i, 1);
}

//Exibe o resultado
echo "<h1>Texto</h1>";
echo "<p>$texto</p>";
echo "<h1>Inverso</h1>";
echo "<p>$inverso</p>";

/////////////// Fim Tópico 5
?>