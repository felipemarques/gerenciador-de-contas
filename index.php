<?php //includando rodapé ?>
<?php require_once('template/header.php') ?>
        <div class="jumbotron">
            <div class="container">
                <h1>Olá Renato,</h1>
                <div class="alert alert-success" role="alert">
                    <strong>Que beleza!</strong> a próxima conta vence somente em 06/10/2014
                </div>
                <div class="alert alert-info hidden" role="alert">
                    <strong>Prepare-se!</strong> Você tem 2 contas que vencem no próximos 5 dias.
                </div>
                <div class="alert alert-warning hidden" role="alert">
                    <strong>Cuidado!</strong> Você tem 9 contas vencendo hoje.
                </div>
                <div class="alert alert-danger hidden" role="alert">
                    <strong>Temos um problema!</strong> Você possui 2 contas em aberto.
                </div>
            </div>
        </div>

        <div class="container">
                
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Parcelas do mês</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Conta</th>
                                        <th>Parcela</th>
                                        <th>Vencimento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Telefone</td>
                                        <td>Mensal</td>
                                        <td>06/10</td>
                                    </tr>
                                    <tr>
                                        <td>NetFlix</td>
                                        <td>Mensal</td>
                                        <td>06/10</td>
                                    </tr>
                                    <tr>
                                        <td>Tênis Dafiti</td>
                                        <td>02 de 02</td>
                                        <td>07/10</td>
                                    </tr>
                                    <tr>
                                        <td>Telefone</td>
                                        <td>Mensal</td>
                                        <td>06/10</td>
                                    </tr>
                                    <tr>
                                        <td>NetFlix</td>
                                        <td>Mensal</td>
                                        <td>06/10</td>
                                    </tr>
                                    <tr>
                                        <td>Tênis Dafiti</td>
                                        <td>02 de 02</td>
                                        <td>07/10</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>
                                <a href="/parcelas.php"><button type="button" class="btn btn-sm btn-info center-block">Ver Todos</button></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php //includando rodapé ?>
<?php require_once('template/footer.php') ?>
