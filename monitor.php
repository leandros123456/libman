<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empréstimo de Livro</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <fieldset>
        <legend>Monitor</legend>
        <a href="create_client.html"><button>Cadastrar cliente</button></a>
        <a href="registry.html"><button>Cadastrar livro</button></a>
        <form method="post" action="remove.php">
            <span>Identifcação: </span>
            <input type="number" name="id">
            <button type="submit">Remover emprésitmo</button>
        </form>
        <form method="post" action="add.php">
            <span>ID Usuário: </span>
            <input type="number" name="userid">
            <span>ID Livro</span>
            <input type="number" name="bookid">
            <button type="submit">Emprestar</button>
        </form>
    </fieldset>
    <div style="display: flex; flex-direction: row; justify-content: space-around">
        <div>
            <h2>Livros disponíveis</h2>
            <table border="1">
                <tr>
                    <th>ID Livro</th>
                    <th>ISBN</th>
                    <th>Título livro</th>
                </tr>
                <?php
                include "conn.php";
                $sql = "SELECT l.id AS livro_id, m.isbn, m.titulo FROM livros l
                INNER JOIN modelos m ON l.modelo = m.isbn
                LEFT JOIN emprestimo e ON l.id = e.livro WHERE e.livro IS NULL";
                $result = $conn->query($sql);
                while ($row = $result->fetch_array()) {
                    $id = $row["livro_id"];
                    $isbn = $row["isbn"];
                    $titulo = $row["titulo"];
                    echo "<tr>
                    <td>$id</td>
                    <td>$isbn</td>
                    <td>$titulo</td>
                    </tr>";
                }

                ?>
            </table>
        </div>
        <div>
            <h2>Clientes cadastrados</h2>
            <table border="1">
                <tr>
                    <th>ID Cliente</th>
                    <th>Nome</th>
                </tr>
                <?php
                include "conn.php";

                $sql = "SELECT * FROM clientes";

                $result = $conn->query($sql);
                while ($row = $result->fetch_array()) {
                    $id = $row['id'];
                    $nome = $row['nome'];
                    echo "<tr>
                    <td>$id</td>
                    <td>$nome</td>
                    </tr>";
                }
                ?>
            </table>
        </div>
    </div>
    <h2>Empréstimos</h2>
    <table border="1">
        <tr>
            <th>ID Emprestimo</th>
            <th>ID Credor</th>
            <th>Nome credor</th>
            <th>ID Livro</th>
            <th>ISBN</th>
            <th>Título Livro</th>
        </tr>
        <?php
        include "conn.php";
        $sql = "SELECT emprestimo.id as id_emprestimo, clientes.id as id_credor, clientes.nome as nome_credor, livros.id as id_livro, modelos.isbn as isbn, modelos.titulo as titulo FROM emprestimo
INNER JOIN clientes ON clientes.id = emprestimo.usuario
INNER JOIN livros ON livros.id = emprestimo.livro
INNER JOIN modelos ON modelos.isbn = livros.modelo";

        $result = $conn->query($sql);
        while ($row = $result->fetch_array()) {
            $id_emprestimo = $row["id_emprestimo"];
            $nome_credor = $row["nome_credor"];
            $id_credor = $row["id_credor"];
            $id_livro = $row["id_livro"];
            $isbn = $row["isbn"];
            $nome_livro = $row["titulo"];

            echo "<tr>
            <td>$id_emprestimo</td>
            <td>$id_credor</td>
            <td>$nome_credor</td>
            <td>$id_livro</td>
            <td>$isbn</td>
            <td>$nome_livro</td>
            </tr>";
        }
        ?>
    </table>
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
</body>

</html>