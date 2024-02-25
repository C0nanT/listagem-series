<x-layout title='Editar Série'>
    <a href='{{ route('series.index') }}' class='btn btn-dark mb-2'>Lista de séries</a>
    <x-series.form :action="route('series.update', $serie->id)" :nome='$serie->nome' :update="true"/>
    
</x-layout>