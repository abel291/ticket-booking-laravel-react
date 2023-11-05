<div>
    <div
        class="px-2 inline-flex text-sm items-center space-x-1 capitalize  leading-5 font-semibold rounded-lg bg-{{ $status->color() }}-100 text-{{ $status->color() }}-700  ">
        <span>{{ $status->text() }}</span>
        @svg($status->icon(), 'h-4 w-4')
    </div>
</div>
