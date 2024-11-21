<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Requisição assíncrona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #b3ec6c;
        }

        h1,p,label{
            text-align: center;
            color: #42b5aa;
            padding: 5px;
        }

        button{
            background-color: #b3ec6c;
            color: #42b5aa;
            padding: 5px;
            font-weight: bold;
            border: 1px solid #42b5aa;
            margin-top: 10px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.5s ease-in-out;
        }

        button:hover {
            background-color: #42b5aa;
            color: #b3ec6c;
        }

        hr{
            width: 50%;
            margin: 0 auto;
            color: #42b5aa;
            border-top-width: 2px;
        }
        
    </style>
  </head>
  <body>
    <h1>Requisição Assíncrona</h1>
    <p><strong>CALCULAR DELTA</strong></p>

    <div class="container">

        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12"> 
                <label for="a" class="form-label">A</label>
                <input type="text" class="form-control" name="a" id="a">
            </div>
            
            <div class="col-lg-4 col-md-12 col-sm-12">
                <label for="b" class="form-label">B</label>
                <input type="text" class="form-control" name="b" id="b">
            </div>
            
            <div class="col-lg-4 col-md-12 col-sm-12"> 
                <label for="c" class="form-label">C</label>
                <input type="text" class="form-control" name="c" id="c">
            </div>
        </div>

        <div class="row mt-3">
            <div class="d-grid gap-2 col-6 mx-auto">
                <button onclick="calcularDelta();">CALCULAR</button>
            </div>
        </div>
       
        <br>
        <br>
        <hr>
        <br>
        <p id="resultado"></p>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function calcularDelta(){
            const campo = document.getElementById("resultado");

            campo.innerHTML = "";
            campo.innerHTML = "Aguarde... Calculando no servidor ...";
            //obtemos os dados dos campos html
            //armazenamos os valores em variáveis.
            const a = document.getElementById("a").value;
            const b = document.getElementById("b").value;
            const c = document.getElementById("c").value;

            //criamos um objeto com todas as variáveis
            //que o servidor precisa para realizar o calculo
            const payload = {
                a, 
                b, 
                c
            };

            //convertemos o objeto em json
            //para poder trafegar na rede
            const json = JSON.stringify(payload);

            //configuramos a requisição e aguardamos a resposta
            fetch('/processar.php', {
                method: 'POST',
                header: { 'Content-Type': 'application/json'},
                body: json  //é a informação do json  
            })
            .then(resposta => resposta.json())
            .then(dados => {              
                campo.innerHTML = "O resultado do calculo é: " + dados.delta;
            });
        }

    </script>

  </body>
</html>