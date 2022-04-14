@props(['time', 'ref'])
<div>

    <div x-data x-init="flatpickr($refs.{{ $ref }}, {
        
        enableTime: true,
        noCalendar: true,
        dateFormat: 'h:i K',
        time_24hr: false,
        //minDate: 'today',     
        defaultDate: '{{ $time }}'
    })">
        <input type="text" x-ref="{{ $ref }}" {!! $attributes->merge(['class' => ' border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>

    </div>
</div>
