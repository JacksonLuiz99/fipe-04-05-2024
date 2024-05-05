<!DOCTYPE html>
<html>
<head>
    <title>Consulta Tabela FIPE</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Consulta Tabela FIPE</h1>

        <div class="resultado">
            <h2>Marcas disponíveis:</h2>
            <ul class="lista">
                <?php
                require_once 'fipe_api.php';
                $tipoVeiculo = "carros";
                $marcas = listarMarcas($tipoVeiculo);
                foreach ($marcas as $marca) {
                    echo "<li>{$marca['codigo']} - {$marca['nome']}</li>";
                }
                ?>
            </ul>
        </div>

        <div class="resultado">
            <h2>Modelos disponíveis:</h2>
            <ul class="lista">
                <?php
                $codigoMarca = "59"; // Exemplo: VW - VolksWagen
                $modelos = listarModelos($tipoVeiculo, $codigoMarca);
                foreach ($modelos['modelos'] as $modelo) {
                    echo "<li>{$modelo['codigo']} - {$modelo['nome']}</li>";
                }
                ?>
            </ul>
        </div>

        <div class="resultado">
            <h2>Anos disponíveis:</h2>
            <ul class="lista">
                <?php
                $codigoModelo = "5940"; // Exemplo: VW - Amarok
                $anos = listarAnos($tipoVeiculo, $codigoMarca, $codigoModelo);
                foreach ($anos as $ano) {
                    echo "<li>{$ano['codigo']} - {$ano['nome']}</li>";
                }
                ?>
            </ul>
        </div>

        <div class="resultado">
            <h2>Detalhes do veículo:</h2>
            <div class="detalhes">
                <?php
                $codigoAno = "2014-3"; // Exemplo: Ano 2014
                $valor = obterValor($tipoVeiculo, $codigoMarca, $codigoModelo, $codigoAno);
                echo "<p><span class='info'>Marca:</span> {$valor['Marca']}</p>";
                echo "<p><span class='info'>Modelo:</span> {$valor['Modelo']}</p>";
                echo "<p><span class='info'>Ano:</span> {$valor['AnoModelo']}</p>";
                echo "<p class='valor'><span class='info'>Valor:</span> {$valor['Valor']}</p>";
                ?>
            </div>
        </div>

    </div>
</body>
</html>
