<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Barcode</title>
    <style>
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            @foreach ($dataUser as $key => $i)
                <td class="text-center" style="border: 1px solid">
                    <img style="margin-top: 5px" src="data:image/png;base64,{{ DNS2D::getBarcodePNG(strval($i['barcode']), 'QRCODE') }}" alt="barcode" width="150" height="150">
                    <p>{{ $i['name'] }}</p>
                </td>
                @if (($key+1) % 3 == 0)
                    </tr><tr>
                @endif
            @endforeach
        </tr>
    </table>
</body>
</html>
