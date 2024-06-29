<div id="cadastro">
    <div class="modal-body">
        <div class="row">
            <div class="col-12">
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
                                <option value="1">Principal</option>
                                <option value="0">Secundária</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName1" class="form-label">Imagem do Produto</label>
                            <input name="campo_imagem" type="file" class="form-control" id="exampleInputName1"
                                aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <button type="button" class="btn btn-secondary"><a href="admin.php"
                                style="color: #ffffff; text-decoration: none;">Cancelar</a></button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>