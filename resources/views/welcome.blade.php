<x-layout>
    <x-flash type="success">
        The success flash message
    </x-flash>
    <x-flash type="error">
        The error flash message
    </x-flash>
    <x-flash type="warning"  class="border-4 border-black" data-text="{someText:funny}">
        The error flash message
    </x-flash>
    <h1 class="text-center">Use of slots and section</h1>
   <x-section>
       hello --> this is a slot
   </x-section>
    <x-section class="bg-red-500">
        bye
    </x-section>
    <x-section>
        go
    </x-section>
</x-layout>
