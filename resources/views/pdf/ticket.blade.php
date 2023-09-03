<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Boleto | {{ $code }} | {{ $data['user']['name'] }} </title>
    <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ public_path('css/dashboard.css') }}">

    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body class="">

    @foreach ($order_tickets as $ticket)
        @for ($i = 0; $i < $ticket['quantity']; $i++)
            <div class="page-break">
                <table class="w-full">
                    <tbody>
                        <tr>
                            <td class="p-1">
                                <img class="w-28" src="{{ public_path('img/logo_black.png') }}">
                            </td>
                            <td class="text-right p-3 font-bold">
                                <span>Pedido n°{{ $code }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="border-2 border-gray-400 p-5 text-black rounded-md">
                    <table class="w-full">
                        <tbody>
                            <tr>

                                <td>
                                    <h1 class="font-bold text-2xl uppercase">{{ $data['event']['title'] }}
                                        ({{ $i + 1 }}/{{ $ticket['quantity'] }})</h1>
                                </td>
                                <td>
                                    <div>
                                        <img class="w-40 rounded-md" src="{{ public_path('/img/events/img-1.jpg') }}"
                                            alt="">
                                    </div>
                                </td>
                                {{-- //////////////////////////// --}}
                            </tr>
                            <tr>
                                <td>
                                    <div class="mt-3 space-y-3 ">
                                        <table class="text-xs">
                                            <tbody>
                                                <tr class="border-t border-gray-100">
                                                    <td class="p-2 block  text-gray-700">
                                                        Tipo Boleto
                                                    </td>
                                                    <td class="p-2 text-black font-bold ">

                                                        {{ $ticket['name'] }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-gray-100">
                                                    <td class="p-2 block  text-gray-700">
                                                        Precio
                                                    </td>
                                                    <td class="p-2 text-black font-bold ">
                                                        @money($ticket['price'])
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-gray-100">
                                                    <td class="p-2 block  text-gray-700">
                                                        Fecha
                                                    </td>
                                                    <td class="p-2 font-bold uppercase text-emerald-500 ">
                                                        {{ $session_format }}
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-gray-100">
                                                    <td class="p-2 block  text-gray-700">
                                                        Direccion
                                                    </td>
                                                    <td class="p-2">
                                                        <div class="text-black font-bold">
                                                            {{ $data['event']['location_name'] }}
                                                        </div>
                                                        <div class="text-black font-bold">
                                                            {{ $data['event']['location_address'] }}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-gray-100">
                                                    <td class="p-2 block  text-gray-700">
                                                        Informacion del pedido</td>
                                                    <td class="p-2 text-black font-bold ">
                                                        Pedido N°{{ $code }} <br>
                                                        Hecho por {{ $data['user']['name'] }} el {{ $created_at }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                                <td class="align-bottom">
                                    <div class="visible-print text-center">
                                        <div class="inline-block">
                                            <img class="w-28"
                                                src="data:image/svg+xml;base64,{{ base64_encode($qrcode) }}">
                                        </div>
                                        <span class="block text-xs mt-2">codigo de verificacion</span>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            </div>
        @endfor
    @endforeach

</body>

</html>
