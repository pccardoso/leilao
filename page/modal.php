<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-search"></i> Pesquisa Avançada</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalVisUsu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-search"></i> Visualizar Usuário</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td><i class="bi bi-person-fill"></i> Nome:</td><td><span id="spanUsuNom"></span></td>
            </tr>
            <tr>
              <td><i class="bi bi-whatsapp"></i> Telefone:</td><td><span id="spanUsuTel"></span></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar Leilão -->
<div class="modal fade" id="modalEdiLei" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-search"></i> Editar Leilão</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">

            <div class="form-group">
              <label for="">Nome do Produto:</label>
              <input type="text" id="eNomProE" class="form-control" disabled>
            </div>

            <br>

            <div class="form-group">
              <label for="forStatus">Status do Leilão:</label>
              <select id="sStaLeiEdi" class="form-control">
                <option value=""> - Selecione o status - </option>
                <option value="1">Aberto</option>
                <option value="0">Fechado</option>
              </select>
            </div>

            <div class="form-group">
              <label for="forValorLance">Valor do Lance:</label>
              <input type="text" id="eValLanEdi" class="form-control">
            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" id="btnSalLeiEdi" class="btn btn-success">Salvar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar Produto -->
<div class="modal fade" id="modalEdiPro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-pencil"></i> Editar Produto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">

            <div class="form-group">
              <label for="">Nome do Produto:</label>
              <input type="text" id="eNomProEdi" class="form-control">
            </div>

            <div class="form-group">
              <label for="">Descrição do Produto:</label>
              <textarea name="" id="eDesProEdi" class="form-control"></textarea>
            </div>

            <div class="form-group">
              <label for="">Valor do Produto:</label>
              <input type="text" id="eValProEdi" class="form-control">
            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" id="btnSalProEdi" class="btn btn-success">Salvar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar Categoria -->
<div class="modal fade" id="modalEdiCat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-pencil"></i> Editar Produto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">

            <div class="form-group">
              <label for="">Nome da Categoria:</label>
              <input type="text" id="eNomCatEdi" class="form-control">
            </div>

            <div class="form-group">
              <label for="">Descrição da Categoria:</label>
              <textarea name="" id="eDesCatEdi" class="form-control"></textarea>
            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" id="btnSalCatEdi" class="btn btn-success">Salvar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar Usuário -->
<div class="modal fade" id="modalEdiUsu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-pencil"></i> Editar Usuário</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">

            <div class="form-group">
              <label for="">Nome do Usuário:</label>
              <input type="text" id="eNomUsuEdi" class="form-control">
            </div>

            <div class="form-group">
              <label for="">CPF do Usuário:</label>
              <input type="text" id="eCpfUsuEdi" class="form-control">
            </div>

            <div class="form-group">
              <label for="">Usuário:</label>
              <input type="text" id="eUsuUsuEdi" class="form-control">
            </div>

            <div class="form-group">
              <label for="">Whatsapp do Usuário:</label>
              <input type="text" id="eWhaUsuEdi" class="form-control">
            </div>

            <div class="form-group">
              <label for="">Permissões do Usuário:</label>
              <select name="" id="ePerUsuEdi" class="form-control">
                  <option value="">-- selecione --</option>
                  <option value="0">Usuário Comum</option>
                  <option value="1">Administrador</option>
              </select>
            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" id="btnSalUsuEdi" class="btn btn-success">Salvar</button>
      </div>
    </div>
  </div>
</div>