<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contas</title>
</head>
<body style="font-size: 12px;">
   <h2 style="text-align: center;">Contas</h2>

   <table style="border-collapse: collapse; width:100%">
        <thead>
            <tr style="background-color: aquamarine">
                <th style="border: 1px solid #ccc">ID</th>
                <th style="border: 1px solid #ccc">Nome</th>
                <th style="border: 1px solid #ccc">Vencimento</th>
                <th style="border: 1px solid #ccc">Valor</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contas as $conta)
                <tr>
                    <td style="border:1px solid #ccc; border-top:none; ">{{ $conta->id }}</td>
                    <td style="border:1px solid #ccc; border-top:none; ">{{ $conta->nome }}</td>
                    <td style="border:1px solid #ccc; border-top:none; ">{{ \Carbon\Carbon::parse($conta->vencimento)->tz('America/Sao_Paulo')->format('d/m/Y') }}</td>
                    <td style="border:1px solid #ccc; border-top:none; ">{{ 'R$ ' . number_format($conta->valor, 2, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhuma conta encontrada!</td>
                </tr>
                
            @endforelse
            <tr>
                <td colspan="3" style="border:1px solid #ccc; border-top:none; ">Total</td>
                <td style="border:1px solid #ccc; border-top:none; ">{{ 'R$' . number_format($totalValor, 2, ',', '.')}}</td>
            </tr>
        </tbody>
   </table>
</body>
</html>