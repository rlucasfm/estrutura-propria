<!-- Begin Page Content -->
<div class="container">

    <form id="formEstrutura">
        <div class="form-group">
            <label for="checkout">Link do checkout</label>
            <input type="text" class="form-control" id="checkout" name="checkout" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Aqui vai o link que o cliente irá ao clickar no botão de compra.</small>
        </div>
        <button type="submit" class="btn btn-primary">Criar estrutura</button>
    </form>  

    <div class="card mt-4">
        <div class="card-body">
            O link para a sua estrutura:  <div id="resultado"></div>
        </div>
    </div>    

    <script>
        $(document).ready(() => {
            $('#formEstrutura').submit((event) => {
                event.preventDefault();

                $.ajax({
                    type: "post",
                    url: "gerarEstrutura",
                    data: {'checkout': $('#checkout').val()},
                    success: function(data){                                                   
                        $("#resultado").html(data)
                    }
                })
            })
        })
    </script>                 

</div>
<!-- /.container -->