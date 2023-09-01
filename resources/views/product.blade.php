<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Products</h1>
    <h2>View Update Stock</h2>
    <form  method="post" action="{{ route('update') }}" accept-charset="UTF-8">
        @csrf
        <div class="form-group">
            <label for="id">Produit</label>
            <select name="id" id="product_id" class="form-control">
                @foreach ($Products as $item)
                <option name="{{ $item->id }}" value="{{ $item->id }}">{{ $item->designation }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="stock">Quantité</label>
            <input type="number" name="stockabrar" id="quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control">
                <option value="achat">Achat</option>
                <option value="vente">Vente</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</body>

</html>