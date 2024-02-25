<x-layout title='Nova Série'>
    <a href='{{ route('series.index') }}' class='btn btn-dark mb-2'>Lista de séries</a>
    <x-series.form :action="route('series.store')" :nome="old('nome')" :update="false"/>
    
</x-layout>