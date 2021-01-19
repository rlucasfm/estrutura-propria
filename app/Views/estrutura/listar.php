<!-- Begin Page Content -->
<div class="container">

    <div class="card">
        <h5>Sua estrutura própria</h5>
        <div class="card-body">
        <?php if($link_checkout != ""): ?>
            Link da estrutura: <a href="<?= esc($link_estrutura); ?>"><?= esc($link_estrutura); ?></a>
            <hr>
            Link do checkout: <a href="<?= esc($link_checkout); ?>"><?= esc($link_checkout); ?></a>

            <button type="button" class="btn btn-danger" id="deleteBtn">Deletar estrutura</button>
        <?php else: ?>
            <h5><?= esc($link_estrutura); ?></h5>
        <?php endif; ?>
        </div>
    </div>

    <script>
    $('#deleteBtn').on('click', () => {
        window.location.href = '/estrutura/estrutura/deletar'
    })
    </script>

</div>