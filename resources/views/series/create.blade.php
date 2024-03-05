<x-layout title='Nova Série'>
    <a href='{{ route('series.index') }}' class='btn btn-dark mb-2'>Lista de séries</a>
    <form action="{{ route('series.store') }}" method='post' class=''>
        @csrf
        
        <div class='mb-3 row'>
            <div class='col-8'>
                <label for='nome' class='form-label'>Nome: </label>
                <input autofocus type='text' id='nome' name='nome' class='form-control' value='{{ old('nome') }}'>
            </div>

            <div class='col-2'>
                <label for='seasons' class='form-label'>Temporadas: </label>
                <input type='text' id='seasons' name='seasons' class='form-control' value='{{ old('seasons') }}'>
            </div>
            <div class='col-2'>
                <label for='episodes' class='form-label'>Episódios por Temporada: </label>
                <input type='text' id='episodes' name='episodes' class='form-control' value='{{ old('episodes') }}'>
            </div>
        </div>
            <button type='submit' class='btn btn-primary'>Enviar</button>

    </form> 
    
</x-layout>