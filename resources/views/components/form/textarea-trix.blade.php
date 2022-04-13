<div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
    @php
        $id_trix = 'trix-' . uniqid();
    @endphp
    <input id={{ $id_trix }} value="Editor content goes here" type="hidden" name="content" {!! $attributes !!}>
    <trix-editor class="text-sm h-52" input={{ $id_trix }}></trix-editor>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
</div>
