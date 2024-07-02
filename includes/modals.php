<div id="cadastro">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .form-container {
            position: absolute; top: -20%;
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            font-size: 1.5rem;
            color: #333333;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-label {
            color: #555555;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #dddddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #dddddd;
            border-radius: 5px;
            font-size: 1rem;
            height: 200px;
            resize: vertical;
        }

        .btn-primary {
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        .btn-secondary {
            background-color: #555555;
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #4d4d4d;
        }

        .btn-secondary a {
            color: #ffffff;
            text-decoration: none;
        }
    </style>

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