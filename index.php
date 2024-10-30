<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<inp, initial-scale=1.0">
    <title>Vendas Piso</title>
</head>
<body>
    <h1>Calculadora para Vendas</h1>

    <pre>
        <fieldset>
    <label>Largura do Cômodo (m²) </label>
    <input type="number" name="larguraComodo" id="larguraComodo"/>

    <label>Comprimento do Cômodo (m²) </label>
    <input type="number" name="comprimentoComodo" id="comprimentoComodo"/>
</fieldset>

<fieldset>

    <label>Largura do Piso/Azulejo (m²) </label>
    <input type="number" name="larguraPiso" id="larguraPiso"/>

    <label>Comprimento do Piso/Azulejo (m²) </label>
    <input type="number" name="comprimentoPiso" id="comprimentoPiso"/>

    <button onclick="calcular();">Calcular</button>

    <p id="resultado"></p>

    </fieldset>
    
    </pre>
    <script>
        function calcular(){
            const numero1 = document.getElementById("numero1").value;
            const numero2 = document.getElementById("numero2").value;
            const numero3 = document.getElementById("numero3").value;

            fetch('/calculo.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json'},
                body: JSON.stringify({
                    numero1: parseFloat(numero1),
                    numero2: parseFloat(numero2),
                    numero3: parseFloat(numero3)               
                })
            })
            .then(resposta => resposta.json())
            .then(dados =>{

                document.getElementById("resultado").innerHTML = 
                    "Soma: " + dados.soma;
            })
            .catch(erro =>{
                document.getElementById("resultado").innerHTML = 
                "Erro ao processar";
            });
        }
    </script>
</body>
</html>