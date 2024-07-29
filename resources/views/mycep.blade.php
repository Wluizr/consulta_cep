<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de CEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Consulta de CEP</h1>
        <form action="/searchMyCep" method="POST">
            @csrf
            <div class="form-group">
                <label for="cep">Qual seria o Cep?</label>
                <input 
                    type="text"
                    id="myCep"
                    name="myCep"
                    class="form-control"
                    pattern="\d{5}-\d{3}" 
                    placeholder="Formato: XXXXX-XXX"
                    maxlength="9"
                />
            </div>
            <button type="submit" class="btn btn-primary mt-3">Buscar</button>
            <button type="button" class="btn btn-secondary mt-3" onclick="clearForm()">Limpar</button>
        </form>

        @if (session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif

        @if (isset($address))
            <div class="alert alert-info mt-3">
                <p><strong>Logradouro:</strong> {{ $address['logradouro'] }}</p>
                <p><strong>Bairro:</strong> {{ $address['bairro'] }}</p>
                <p><strong>Cidade:</strong> {{ $address['localidade'] }}</p>
                <p><strong>Estado:</strong> {{ $address['uf'] }}</p>
            </div>
        @endif
    </div>

    <script>
        function clearForm() {
            document.getElementById('myCep').value = '';
        }
    </script>
</body>
</html>
