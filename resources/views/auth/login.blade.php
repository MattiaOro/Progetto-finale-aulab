<x-layout>
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

    {{-- ** Sessione avvenuta --}}

    @if(session()->has('message'))
   <div class="alert alert-success">
       {{ session()->get('message') }}
   </div>
	@endif

    
    <form method="POST" action="{{route('login')}}">

    @csrf
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6 col-md-12 mb-3 text-center align-items-center box3">
          <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="name" name="name" class="form-control" id="name">
        
        
        <label for="exampleInputEmail1" class="form-label">Indirizzo mail</label>
        <input type="email" class="form-control" id="email" name="email">
        
      
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
      
     
        
        
      </form>
    </div>
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary ">Accedi</button>
    </div>
  
  </div>
  
        










</x-layout>