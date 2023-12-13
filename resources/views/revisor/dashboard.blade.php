<x-layout>
    <div class="container-fluid p-3 text-center text-black">
        <div class="row justify-content-center">
            <h1 class="display-4 tesxt-capitalize">
                Bentornato Revisore
            </h1>
        </div>
    </div>

@if(session('message'))
<div class="alert alert-success text-center">{{session('message')}}</div>
@endif

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="text-black">Articoli da revisionare!</h2>
            <x-articles-table :articles="$unrevisionedArticles"/>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="text-black">Articoli Pubblicati</h2>
            <x-articles-table :articles="$acceptedArticles"/>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="text-black">Articoli respinti</h2>
            <x-articles-table :articles="$rejectedArticles"/>
        </div>
    </div>
</div>

</x-layout>