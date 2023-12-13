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

    <form method="POST" action="{{route('register')}}"
    >
    @csrf
    <div class="container">
      <div class="row box4">
        <div class="col-12 col-md-12">
          <div class="mb-1  pt-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
          <input type="name" name="name" class="form-control" id="name" value="{{old('name')}}">
          </div>
          <div class="mb-1 pt-2">
          <label for="exampleInputEmail1" class="form-label">Indirizzo Mail</label>
          <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
          </div>
        <div class="mb-1  pt-2">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <div class="mb-1  pt-2">
            <label for="exampleInputPassword1" class="form-label mb-3 pt-2">Conferma Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation">
        </div>
         
        <button type="submit" class="btn btn-primary mb-3 text-center d-flex align-items-center mt-3">Registrati</button>
         
      </form>

        </div>
          
      </div>
      <div style="height: 250px"></div>
    </div>











</x-layout>