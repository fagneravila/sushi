<h1>Usuários</h1>


<div class="button"><a href="<?= BASE_URL ?>/users/add"> Adicionar Usuário</a></div>
<table border="0" width="100%">
    <thead>
        <tr>
            <th>Nome</th>
             <th>Usuario</th>
            <th>Função</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($user_list as $u) { ?>
            <tr>
              
                <td width="100px"><?= $u['nome'] ?></td>
                <td width="100px"><?= $u['usuario'] ?></td>
                <td width="100px"><?= $u['descricao']?></td>
                <td width="100px">
                    <div class="button button_small"><a href="<?= BASE_URL ?>/users/edit/<?= $u['id'] ?>">Editar</a></div>
                    <div class="button button_small"><a href="<?= BASE_URL ?>/users/delete/<?= $u['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></div>

                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

