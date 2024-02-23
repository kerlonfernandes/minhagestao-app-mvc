
<style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .aviso {
            display: none;
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 90%;
        }

        .aviso p {
            margin: 0;
            font-size: 14px;
        }

        .aviso strong {
            color: #721c24;
        }

        .aviso em {
            font-style: italic;
            color: #777;
        }

        .aviso button {
            background-color: #721c24;
            color: #fff;
            border: none;
            padding: 8px 15px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .aviso button:hover {
            background-color: #5b171f;
        }
    </style>



    <div id="aviso" class="aviso">
        <p><strong>ATENÇÃO:</strong> Esta aplicação está em desenvolvimento e pode conter falhas ou bugs. Está em
            constante aprimoramento. Relate qualquer erro ao desenvolvedor. <em>by: Minha Gestão.</em></p>
        <button onclick="fecharAviso()">Fechar</button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            if (localStorage.getItem("avisoFechado") !== "true") {
                exibirAviso();
            }
        });

        function exibirAviso() {
            var aviso = document.getElementById("aviso");
            aviso.style.display = "block";
        }

        function fecharAviso() {
            var aviso = document.getElementById("aviso");
            aviso.style.display = "none";

            // Define um sinalizador indicando que o aviso foi fechado
            localStorage.setItem("avisoFechado", "true");
        }

    </script>
