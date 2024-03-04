<x-layout title="Editar Série '{!! $serie->nome !!}'">
    <a href='{{ route('series.index') }}' class='btn btn-dark mb-2'>Lista de séries</a>    
    
    <form action="{{ route('series.update', $serie->id) }}" method='post' class=''>

        @csrf
        @method('PUT')

        <div class='mb-3'>
            <label for='nome' class='form-label'>Nome: </label>
            <input type='text' id='nome' name='nome' class='form-control' @isset($serie->nome) value='{{ $serie->nome }}' @endisset>
        </div>
        <button type='submit' class='btn btn-primary'>Enviar</button>
    </form> 

</x-layout>