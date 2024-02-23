$(document).ready(function () {
    function hideOverLay() {

        $("#overlay").fadeOut('slow', function() {
          $("#loader-container").hide();
          $("#custom-loader").hide();
      
        });
      
      
      
      }
      

    function showOverLay() {

        $("#overlay").show();

    }


    function consultarProdutos(nome) {
        // Carregar o spinner no container
        $("#spinner-container");

        $("#loader").show();

        $.ajax({
            url: "views/produtos/consultaProdutos.php",
            method: "GET",
            data: { produto: nome },
            success: function (data) {
                $(".resultados").hide().html(data).fadeIn('fast'); 

                $("#loader").hide();



            },
            error: function () {
                $("#loader").show();
            },
        });
    
    }
    $(document).ready(function () {
        $("#pesquisar-produto").on("input", function () {
            let nome = $(this).val();
            consultarProdutos(nome);
        });
    });
    function qtd_produtos(id_user) {
        // Carregar o spinner no container
        $("#spinner-container-qtd").show(); // Mostrar o spinner
        $("#loader_qtd").show();

        $.ajax({
            url: "views/produtos/qtd_produtos.php",
            method: "GET",
            data: { id_user: id_user }, // Renomeando a chave para id_user
            success: function (data) {
                $("#quantidade_de_produtos").html(data);
            },
            error: function () {
                $("#spinner-container-qtd").show(); // Mostrar o spinner
                $("#loader_qtd").show();

            },
            complete: function () {
                ; // Esconder o loader após a conclusão
            }
        });
    }
    function cat_produtos(id_user) {
        // Carregar o spinner no container
        $("#spinner-container-cat").show(); // Mostrar o spinner
        $("#loader_cat").show();

        $.ajax({
            url: "views/produtos/consultaCategoriasQtd.php",
            method: "GET",
            data: { id_user: id_user }, // Renomeando a chave para id_user
            success: function (data) {
                $("#categorias_cad").html(data);
            },
            error: function () {
                $("#spinner-container-cat").show(); // Mostrar o spinner
                $("#loader_cat").show();

            },
            complete: function () {
                ; // Esconder o loader após a conclusão
            }
        });
    }

    // Carregar os resultados iniciais
    consultarProdutos('');
    qtd_produtos()
    cat_produtos()
    $("#pesquisar-produto").on("input", function () {
        let nome = $(this).val();
        consultarProdutos(nome);
    });

    if (document.querySelector('#aumenta_qtd') && document.querySelector('#diminui_qtd')) {
        document.querySelector('#aumenta_qtd').addEventListener('click', () => {
            document.querySelector('#qtd').value++
            document.querySelector('#qtd-prod').textContent = document.querySelector('#qtd').value
        })

        document.querySelector('#diminui_qtd').addEventListener('click', () => {
            if (document.querySelector('#qtd').value >= 0) {

                document.querySelector('#qtd').value--
                document.querySelector('#qtd-prod').textContent = document.querySelector('#qtd').value

            } else if (document.querySelector('#qtd').value >= 0) {

                document.querySelector('#qtd').value = 0
            }
        })

    }

    function cadastraProduto() {
        $("#envia-btn").on("click", () => {
            let categoria = $("#id_categoria").val()
            let titulo = $("#title").val()
            let descricao = $("#description").val()
            let preco = $("#moeda").val()
            let qtd = $("#qtd").val()

            // Obtém o arquivo de imagem selecionado
            let imagem = document.getElementById('imagemInput').files[0];

            // Cria um objeto FormData para enviar os dados, incluindo a imagem
            let formData = new FormData();
            formData.append('categoria', categoria);
            formData.append('titulo', titulo);
            formData.append('descricao', descricao);
            formData.append('preco', preco);
            formData.append('qtd', qtd);
            formData.append('imagem', imagem);

            $.ajax({
                url: "ajax/cadastraProduto.php",
                method: "POST",
                data: formData,
                contentType: false, // Necessário para enviar arquivos
                processData: false, // Necessário para enviar arquivos
                success: function (dados) {
                    consultarProdutos('');
                    showSuccessMessage("Produto cadastrado com sucesso!")
                    $("#id_categoria").val("")
                    $("#title").val("")
                    $("#description").val("")
                    $("#moeda").val("")
                    $("#qtd").val("")
                    $("#imagemInput").val("")

                    qtd_produtos()

                },
                error: function (error) {
                    console.log(error);
                }
            });
        });


        consultarProdutos('');
    }
    cadastraProduto()

    function cadastraCategoria() {

        $('#cad-cat-btn').on('click', () => {
            let categoria = $("#cadastra-categoria").val()

            if (categoria !== '') {

                let dados = {
                    categoria: categoria // Substitua 'categoria' pelo nome correto do campo
                };

                $.ajax({
                    url: "ajax/cadastraCategoria.php",
                    method: "POST",
                    data: dados,
                    success: function (data) {

                        $("#cadastra-categoria").val("")
                        showSuccessMessage("Categoria cadastrada com Sucesso!")
                        showCategories()
                        cat_produtos()
                        categoriasSelect()
                    },

                    error: function (e) {
                        console.log(e)
                    }

                })
            }
        }
        )
    }
    cadastraCategoria()

    function showCategories() {

        $.ajax({
            url: "views/produtos/consultaCategorias.php",
            method: "GET",
            success: function (data) {
                $("#lista-categorias").html(data);
            },
            error: function () {
                $("#spinner-container-cat").show(); // Mostrar o spinner
                $("#loader_cat").show();
            },
            complete: function () {
                // Esconder o loader após a conclusão
                $("#spinner-container-cat").hide();
                $("#loader_cat").hide();
            }
        });
    }
    showCategories()
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('delete-cat')) {
            const categoryId = event.target.getAttribute('data-category-id');
            $.ajax({
                url: "ajax/deletaCategoria.php",
                method: "POST",
                data: {
                    categoryId: categoryId
                },
                success: function (data) {
                    showSuccessMessage("Categoria deletada com sucesso")
                    showCategories()
                    qtd_produtos()
                    categoriasSelect()



                },
                error: function (xhr, status, error) {
                    console.log(xhr, status, error);
                }
            });
        }
    });

    function categoriasSelect() {

        $.ajax({
            url: "ajax/selectCategorias.php",
            method: "GET",
            success: function (data) {
                $("#id_categoria").html(data);

                console.log(data)
            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {


            }
        });
    }
    categoriasSelect()
    hideOverLay()
})