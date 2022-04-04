<div>
    @if ($state == 'successful')

        <div
            class="px-2 inline-flex items-center space-x-1  leading-5 font-semibold rounded-lg bg-green-100 text-green-700  ">
            <span>Aprobado</span>
            @svg("heroicon-s-check",'h-4 w-4')
        </div>

    @else
        <div
            class="px-2 inline-flex items-center space-x-1  leading-5 font-semibold rounded-lg bg-gray-100 text-gray-700 ">
            @if ($state == 'refunded')

                <span> Rembolsado</span>
                @svg("heroicon-o-receipt-refund",'h-4 w-4')
            @endif
            @if ($state == 'canceled')
                <span>Cancelado</span>
                @svg("heroicon-s-x",'h-4 w-4')
            @endif
        </div>

    @endif
</div>
