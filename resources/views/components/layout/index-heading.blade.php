@props(['heading', 'subheading'])
<section class="relative flex flex-col gap-2">
    <x-title name="{{$heading}}"/>
    <x-subheading>
        {{$subheading}}
    </x-subheading>
</section>
