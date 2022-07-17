@props(['name'])

@error($name)
    <p class="text-sm text-red-600">{{ $message }}</p>
@enderror