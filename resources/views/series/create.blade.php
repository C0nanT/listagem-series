<x-layout title='Nova Série'>

    <a href='{{ route('series.index') }}' class='btn btn-dark mb-2'>Lista de séries</a>

    <form action='{{ route('series.store') }}' method='post' class=''>
    @csrf
        <div class='mb-3'>
            <label for='nome' class='form-label'>Nome: </label>
            <input type='text' id='nome' name='nome' class='form-control'>
        </div>
        <button type='submit' class='btn btn-primary'>Enviar</button>
    </form> 
    
</x-layout>