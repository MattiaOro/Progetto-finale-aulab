<x-layout>
    
    @if(Session::has('message'))
    <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
    
    <div class="container-fluid text-center text-black">
        <div class="row justify-content-center">
            <h1 class="display-4 text-capitalize">
                Candidati per un ruolo
            </h1>
        </div>
    </div>
   
    
    <div class="container-fluid">
        <div class="row mb-3 d-flex justify-content-evenly">
            <div class="col-4 box ">
                <h2>Lavora come amministratore</h2>
                <p>Cosa farai: Ti occuperai della gestione del sito e dei suoi contenuti nella sua interezza</p>
                <h2>Lavora come revisore</h2>
                <p>Cosa farai: Ti occuperai di vagliare gli articoli scritti dagli utenti con il ruolo di scrittore</h2>
                    <h2>Lavora come redattore</h2>    
                    <p>Cosa farai: Ti occuperai della scrittura degli articoli del sito</p>
                </div>
                
                    <div class="col-12 col-md-6 box"> 
                        {{-- ! snippet errori --}}
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif      
                    <form action="{{route('careers.submit')}}" method="POST">
                        @csrf
                        <div class="col-5 ">
                            <label for="role" class="form-label fs-5">Per quale ruolo ti stai candidando?</label>
                            <select name="role" id="role" class="form-control ">
                                <option 
                                @if (Auth::user()->is_admin==true)
                                disabled
                                @endif value="admin">Amministratore</option>
                                <option @if (Auth::user()->is_revisor==true)
                                    disabled
                                    @endif value="revisor">Revisore</option>
                                <option @if (Auth::user()->is_writer==true)
                                    disabled
                                    @endif value="writer">Redattore</option>
                            </select>
                        </div>
                        <div>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{old('email', Auth::user()->email)}}">
                        </div>
                        <div>
                            <label for="message" class="form-label">Parlaci di te</label>
                            <textarea name="message" class="form-control" id="message" value="{{old('message')}}"></textarea>
                            
                        </div>
                        <div>
                            <button class="my-3 bottone">
                                Invia la tua candidatura
                            </button>
                        </div>
                    </form>
                    
                </div>
                
            </div>
            <div style="height: 180px"></div>
        </div>
        
        
        
                              
                    
                </div>
            </div>
        </div>
        
        
        
        
        
        
    </x-layout>