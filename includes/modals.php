<div id="cadastro">
    <div class="form-container">
        <form action="includes/insert-noticia.php" method="POST" enctype="multipart/form-data">
            <h1 class="form-title">Nova Notícia</h1>
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Título da Notícia</label>
                <input name="campo_titulo" type="text" class="form-control" id="exampleInputName1"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Subtítulo</label>
                <input name="campo_subtitulo" type="text" class="form-control" id="exampleInputName1"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="isMain" class="form-label">Tipo de Notícia:</label>
                <select id="isMain" name="campo_principal" required class="form-control">
                    <option value="">Selecione...</option>
                    <option value="1">Notícia Principal</option>
                    <option value="0">Notícia Secundária</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Categoria</label>
                <select id="category" name="campo_categoria" required class="form-control">
                    <option value="">Selecione...</option>
                    <option value="F1">F1</option>
                    <option value="F2">F2</option>
                    <option value="Formula E">Fórmula E</option>
                    <option value="Formula Indy">Fórmula Indy</option>
                    <option value="Formula Truck">Fórmula Truck</option>
                    <option value="MotoGP">MotoGP</option>
                    <option value="Nascar">Nascar</option>
                    <option value="Ralis">Ralis</option>
                    <option value="Stock Car">Stock Car</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="newsText" class="form-label">Texto da Notícia</label>
                <textarea name="campo_texto" id="newsText" class="form-textarea" maxlength="10000"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Imagem do Produto</label>
                <input name="campo_imagem" type="file" class="form-control" id="exampleInputName1"
                    aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <button type="button" class="btn btn-secondary"><a href="admin.php">Cancelar</a></button>
        </form>
    </div>
</div>


<div id="employeeModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Gerenciar Funcionário</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nível de Acesso</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['id'])) {
                    $id = $mysqli->real_escape_string($_SESSION['id']);
                    $result = $mysqli->query("SELECT id, nome, sobrenome, email, nivel, assinante FROM tbl_login WHERE id != $id ORDER BY id ASC");

                    if ($result) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '    <th scope="row">' . $row['id'] . '</th>';
                            echo '    <td>' . $row['nome'] . ' ' . $row['sobrenome'] . '</td>';
                            echo '    <td>' . $row['email'] . '</td>';
                            echo '    <td>';

                            if ($row['nivel'] != 'Admin') {
                                echo '        <form action="includes/update-nivel.php" method="POST">';
                                echo '            <input type="hidden" name="id" value="' . $row['id'] . '">';
                                echo '            <select name="nivel" onchange="this.form.submit()">';
                                echo '                <option value="User" ' . ($row['nivel'] == 'User' ? 'selected' : '') . '>User</option>';
                                echo '                <option value="Jornalista" ' . ($row['nivel'] == 'Jornalista' ? 'selected' : '') . '>Jornalista</option>';
                                echo '            </select>';

                                if ($row['nivel'] == 'Jornalista') {
                                    echo '            <input type="hidden" name="assinante" value="1">';
                                } else {
                                    echo '            <input type="hidden" name="assinante" value="0">';
                                }

                                echo '        </form>';
                            } else {
                                echo $row['nivel'];
                            }

                            echo '    </td>';
                            echo '</tr>';
                        }
                    } else {
                        echo 'Erro na consulta: ' . $mysqli->error;
                    }
                } else {
                    echo 'ID de sessão não encontrado.';
                }
                ?>
            </tbody>
        </table>




    </div>
</div>





<div id="editNewsModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeEditNewsModal()">&times;</span>
        <h2>Editar Notícias</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Subtítulo</th>
                    <th scope="col">Texto</th>
                    <th scope="col">Texto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['id'])) {
                    $id = $mysqli->real_escape_string($_SESSION['id']);
                    $result = $mysqli->query("SELECT id, titulo, subtitulo, texto, categoria, principal FROM tbl_noticias WHERE id != $id ORDER BY id ASC");

                    if ($result) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '    <th scope="row">' . $row['id'] . '</th>';
                            echo '    <td>' . $row['titulo'] . '</td>';
                            echo '    <td>' . $row['subtitulo'] . '</td>';
                            echo '    <td>' . $row['texto'] . '</td>';
                            echo '    <td>' . $row['categoria'] . '</td>';
                            echo '    <td>' . $row['principal'] . '</td>';
                            echo '    <td><a href="includes/editar_noticia.php?id=' . $row['id'] . '">Editar</a></td>'; // Botão Editar que leva para a página de edição
                            echo '   </tr>';
                        }
                    } else {
                        echo 'Erro na consulta: ' . $mysqli->error;
                    }
                } else {
                    echo 'ID de sessão não encontrado.';
                }
                ?>

            </tbody>
        </table>
    </div>
</div>