
<x-layout title='Séries'>

    <a href='series/criar'>Adicionar série</a>

    <ul>
        @foreach($series as $serie)
            <li>
                {{$serie}} 
            </li>
        @endforeach 

    </ul>


<div class="alert alert-success" role="alert">...</div>
<div class="alert alert-info" role="alert">...</div>
<div class="alert alert-warning" role="alert">...</div>
<div class="alert alert-danger" role="alert">...</div>



</x-layout>