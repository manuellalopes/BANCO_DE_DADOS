<?php

    try {
        // PDO = PHP Data Object
        $conectar = new PDO("sqlite:banco/banco_biblioteca.db"); 

        $sql = $conectar->query("SELECT * FROM tb_livro");
        $tb_livros = $sql->fetchAll(PDO::FETCH_ASSOC);

    } catch (\Throwable $th) {
        echo "nao ok";
    }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Biblioteca</title>
    <link rel="stylesheet" href="/css/estilo.css">
</head>
<body>
<header> 
        <img src="/img/Biblioteca-Banner.png" alt="Banner-de-Livros" title="Banner de Livros">   
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="usuarios.php">Usuários</a></li>
                <li><a href="livros.php">Livros</a></li>
                <li><a href="#">Emprestimos</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="cadastro-usuario">
            <h2>Cadastro de Livros</h2>
            <form action="livros_cadastro.php" method="POST">
                <label for="nome">Titulo:</label>
                <input type="text" name="titulo" id="titulo">

                <label for="telefone">Autor:</label>
                <input type="text" name="autor" id="autor">

                <label for="rua">Editora:</label>
                <input type="text" name="editora" id="editora">

                <label for="numero">Ano de publicação:</label>
                <input type="text" name="ano de publicacao" id="ano de publicacao">

                <label for="cep">Quantidade:</label>
                <input type="text" name="quantidade" id="quantidade">


                <div class="botoes">
                    <input type="submit" value="Cadastrar">
                    <input type="reset" value="Limpar">
                </div>

            </form>
        </div>

        <div class="consulta-livros">
            <h2>Consulta de Livros</h2>
            <table>
                <tr>
                    <th>Código de Catalogação</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Opções</th>
                </tr>
                <?php
                for($i = 0; $i < count($tb_livros); $i++){
                    echo "<tr>";
                    echo "<td id='td_centro'>" . $tb_livros[$i]['codigo_catalogacao'] . "</td>";
                    echo "<td>" . $tb_livros[$i]['titulo'] . "</td>";
                    echo "<td>" . $tb_livros[$i]['autor'] . "</td>";
                    echo "<td id='td_centro'>";
                        echo "<a href=''>Visualizar</a>";
                        echo "<a href=''>Excluir</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </main>
</body>
</html>

<?php
    $conectar = null;
?>