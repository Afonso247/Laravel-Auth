@section('web-title', 'Página de Artigos')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Seja bem-vindo,') }} <strong style="color: #3E6D9C;">{{ Auth::user()->name }}</strong>.
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}
                @livewire('show-articles')
            </div>
        </div>
    </div>
</x-app-layout>
