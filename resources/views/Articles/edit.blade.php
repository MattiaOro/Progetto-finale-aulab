<x-layout>
    <div class="container-fluid p-3 text-center text-black">
        <div class="row justify-content-center">
            <h1 class="display-1">
                Modifica articolo
            </h1>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5">
                @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                  @endif
                 <form action="{{route('Articles.update',compact('article'))}}" method="POST" class="p-2 " enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label ">Titolo:</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{$article->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo:</label>
                        <input type="text" name="subtitle" class="form-control" id="subtitle" value="{{$article->subtitle}}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">immagine</label>
                        <input type="file" name="image" class="form-control" id="image"> 
                        {{-- controlla image o img --}}
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria:</label>
                        <select name="category" id="category" class="form-control text-capitalize">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" @if ($article->category && $category->id ==$article->category->id) selected @endif>{{$category->name}}
                                </option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Corpo del testo:</label>
                       <textarea name="body" id="body" cols="30" rows="7" class="form-control">{{$article->body}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags:</label>
                        <input type="text" name="tags" class="form-control" id="tags" value="{{$article->tags->implode('name',',')}}">
                        <span class="small fst-italic">Dividi ogni tag con una virgola!</span>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-success text-white">Inserisci un articolo</button>
                        <a href="{{route('homepage')}}" class="btn btn-warning">Torna alla home</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
</x-layout>