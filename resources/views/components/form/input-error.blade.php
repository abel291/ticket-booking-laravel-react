@props(['for'])

@error($for)
    <span class="text-sm text-red-600 dark:text-red-400 space-y-1">{{ $message }}</span>
@enderror
