@props(['img', 'multiple' => false,])
<div>
    
    @if ($multiple) {{-- $img is array --}}
        <div class="flex flex-wrap ">
            @foreach ($img as $item)
                <div class=" mb-3 mr-3">
                    <img class="rounded-lg h-32 max-w-full" src="{{url('/storage/'.$item->img) }}?{{ rand(1, 300) }}">
                </div>
            @endforeach
        </div>
    @else
        @if ($img)
            <img class="rounded-lg h-32 max-w-full" src="{{url('/storage/'.$img)}}?{{ rand(1, 300) }}">
        @endif
    @endif
</div>
