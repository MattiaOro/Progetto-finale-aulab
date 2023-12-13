<x-layout>


<div class="container-fluid p-3 text-center text-black">
    <div class="row justify-content-center">
        <h1 class="display-4 tesxt-capitalize">
            Categoria {{$category->name}}
        </h1>
    </div>
</div>

    <div class="container my-5">
      <div class="row justify-content-around">
        @foreach ($articles as $article)
        <div class="col-12 col-md-5 mb-5 d-flex justify-content-center">
      
            <div class="card" style="width: 21rem;">
              
              <img class="cardcustom" src="{{Storage::url($article->img)}}" alt=""/>
              <div class="card-body text-white">
                

                <h2 class="card_title text-white">{{$article->title}}</h2>
                
                <p class="text-white">{{$article->subtitle}}</p>
                
                <p class="text-white">Redatto il: {{$article->created_at->format('d/m/Y')}}
                  <span>Da: <a href="{{route('Articles.byWriter',['user'=>$article->user->id])}}" class="small text-mute text-capitalize">  {{$article->user->name}}</a></span>
                  <a href="{{route('Articles.show',compact('article'))}}" class="btn btn-dark d-flex justify-content-around align-items-center text-center my-3">Scopri di più</a>
                  
                  
                  <a href="{{route('Articles.byCategory',['category'=>$article->category->id])}}" class="small text-mute fst-italic text-capitalize d-flex justify-content-around align-items-center text-center text-white my-3">Categoria di apparteneza: {{$article->category->name}}</a><span class="card_price">
              
                    <p class="small fst-italic text-capitalize text-white">
                      @foreach ($article->tags as $tag)
                      #{{$tag->name}}
                      @endforeach
                    </p>
                </div>
              </div>
            </div>
        @endforeach
          
      </div>
  </div>
  
  
  </x-layout>