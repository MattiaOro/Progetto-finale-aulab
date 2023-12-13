<x-layout>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

    <div class="container-fluid p-3 text-center text-black">
        <div class="row justify-content-center">
            <h1 class="display-4 tesxt-capitalize">
                Bentornato Amministratore
            </h1>
        </div>
    </div>

@if(session('message'))
<div class="alert alert-success text-center">{{session('message')}}</div>
@endif

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>Richieste per ruolo di amministratore</h2>
            <x-requests-table :roleRequests="$adminRequest" role="amministratore"/>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>Richieste per ruolo di revisore</h2>
            <x-requests-table :roleRequests="$revisorRequest" role="revisore"/>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>Richieste per ruolo di redattore</h2>
            <x-requests-table :roleRequests="$writerRequest" role="redattore"/>
        </div>
    </div>
</div>

<hr>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>I tags della piattaforma</h2>
            <x-metainfo-table :metaInfos="$tags" metaType="tags"/>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>Le categorie della piattaforma</h2>
            <x-metainfo-table :metaInfos="$categories" metaType="categorie"/>
            <form action="{{route('admin.storeCategory')}}" method="POST">
                @csrf
                <input type="text" name="name" class="form-control me-2" placeholder="Inserisci una nuova categoria">
                <button type="submit" class="btn btn-success text-white my-3">Aggiungi</button>
            </form>
        </div>
    </div>
</div>



</x-layout>