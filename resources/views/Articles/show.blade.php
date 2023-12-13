<x-layout>
    
    
    
    <div class="container my-5">
        <div class="row col-12 align-items-center text-center my-5">
           
                
            
            <div class="col-12 col-md-12 mb-5">
      
                <div class="card centrato">
                  
                  <img src="{{Storage::url($article->img)}}" alt=""/>
                  <div class="card-body">
                    
        
                    <h2 class="card_title text-white">{{$article->title}}</h2>
                    
                    <p class="text-white">{{$article->subtitle}}</p>
                    
                    <p class="text-white">Redatto il: {{$article->created_at->format('d/m/Y')}}
                      <span>Da: <a href="{{route('Articles.byWriter',['user'=>$article->user->id])}}" class="small text-mute text-capitalize text-white">  {{$article->user->name}}</a></span>
                      <p class="text-white">{{$article->body}}</p>
                      
                      
                      <a href="{{route('Articles.byCategory',['category'=>$article->category->id])}}" class=" small text-mute fst-italic text-capitalize d-flex justify-content-around align-items-center text-center  text-white my-3">Categoria di appartenenza: {{$article->category->name}}</a><span class="card_price">
        
                        <p class="small fst-italic text-capitalize text-white">
                            @foreach ($article->tags as $tag)
                            #{{$tag->name}}
                            @endforeach
                          </p>
                           
        
        
                    </div>
                </div>
                <div>
                  
                  @if(Auth::user() && Auth::user()->is_revisor)
                  <a href="{{route('revisor.acceptArticle',compact('article'))}}" class="btn btn-success text-white my-5">Accetta articolo</a>
                  <a href="{{route('revisor.rejectArticle',compact('article'))}}" class="btn btn-danger text-white my-5">RIfiuta articolo</a>
                  @endif
                </div>
          
   
    
      
</x-layout>
