
    <style>
        /* Estilos para o botão de mostrar/ocultar */
        #show-hide {
            background-color: #766DF4;
            color: #fff;
            border: none;
            padding: 10px;
            bottom: 20px;
            right: 20px;
            border-radius: 10px;
            cursor: pointer;
            position: fixed;
        }

        /* Estilos para o contador de notificações */
        #notification-count {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: red;
            color: white;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            text-align: center;
            font-size: 14px;
        }

        /* Estilos para a caixinha flutuante */
        #notification-box {
            background-color: #f9f9f9;
            color: #333;
            width: 350px;
            height: 200px;
            position: fixed;
            bottom: 30px;
            right: -300px; /* Ocultar a caixinha à direita */
            transition: right 0.3s;
            padding: 40px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <!-- Caixinha flutuante -->
    <div id="notification-box">
        <button id="show-hide" onclick="toggleNotificationBox()">
            <i class="fa-solid fa-envelope"></i>
            <span id="notification-count">3</span> <!-- Contador de notificações -->
        </button>
        <h2>Notificação</h2>
        <p>Esta é uma notificação de exemplo.</p>
    </div>

    <script>
        // Função para mostrar/ocultar a caixinha flutuante
        function toggleNotificationBox() {
            const box = document.getElementById("notification-box");
            const button = document.getElementById("show-hide");

            if (box.style.right === "50px") {
                // Se a caixinha está visível, oculta-a
                box.style.right = "-300px";
                button.innerHTML = "<i class='fa-solid fa-envelope'></i>";
            } else {
                // Se a caixinha está oculta, mostra-a
                box.style.right = "50px";
                button.innerHTML = "<i class='fa-solid fa-envelope-open'></i>";
            }
        }
    </script>
