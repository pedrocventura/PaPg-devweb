<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progressão</title>
</head>
<style>
    tr:nth-child(even) {
        background-color: #dddddd;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
</style>

<body>
    <div>
        <form action="backend.php" method="post">
            <div class="col-md-3">
                <label for="">A1</label>
                <input required name="a1" type="number">

            </div>
            <div class="col-md-3">
                <label for="">Razão</label>
                <input required name="razao" type="number">
            </div>
            <div class="col-md-3">
                <label for="">Quantidade de elementos</label>
                <input required name="qtdelemento" type="number">
            </div>
            <div>
                <label for="">Tipo de prog.</label>
                <select required name="tipo" id="">
                    <option value="" hidden selected disabled>Selecione</option>
                    <option value="1">PA</option>
                    <option value="2">PG</option>
                </select>
            </div>
            <button type="submit" id="btnJogar">Gerar</button>
        </form>

    </div>
    <div style="margin-top: 30px;">
        <form action="analise.php" enctype="multipart/form-data" method="post">
            <label for="">Importe sua prog.</label>
            <input required name="file" type="file">

            <button type="submit"> Analisar arquivo</button>
        </form>
    </div>

</body>

</html>

<script>
    const btn = document.getElementById("btnJogar");
</script>