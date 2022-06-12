<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt example</title>
    <style>
        * {
            font-size: 12px;
            font-family: 'Times New Roman';
        }

        p {
            margin: 0;
        }

        .mt-1 {
            margin-top: .455rem;
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
        }

        td.description,
        th.description {
            width: 75px;
            max-width: 75px;
        }

        td.quantity,
        th.quantity {
            width: 20px;
            max-width: 20px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 60px;
            max-width: 60px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 155px;
            max-width: 155px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @media print {

            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <div class="ticket">
        <p class="centered">TIKET MASUK</p>
        <table>
            <thead>
                <tr>
                    <th class="description">Nama Tiket</th>
                    <th class="quantity">Qty</th>
                    <th class="price">Sub</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($transactions as $transaction)
                    <td class="description">{{ $transaction->tiket->name_tiket }}</td>
                    <td class="quantity">{{ $transaction->qty }}</td>
                    <td class="price">@currency($transaction->qty * $transaction->tiket->harga_tiket)</td>
                    @endforeach;
                </tr>
            </tbody>
        </table>
        <p class="centered mt-1">Terima Kasih</p>
    </div>
</body>

</html>