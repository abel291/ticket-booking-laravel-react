@props(['date', 'ref'])
<div>

    <div x-data x-init="
        flatpickr($refs.{{ $ref }}, {                     
            altInput: true,
            altFormat: 'j F Y',
            dateFormat: 'Y-m-d',        
            //minDate: 'today',        
            defaultDate:'{{ $date }}'
        })
    ">

        <input type="text" x-ref="{{ $ref }}" {!! $attributes->merge(['class' => ' border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>

    </div>
</div>
