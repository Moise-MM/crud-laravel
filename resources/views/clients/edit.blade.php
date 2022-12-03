<x-layout title="Create client">

    @php
        $gender = ['M','F']
    @endphp

    <div class="container mt-4">
        <h1 class="h3">Edit client</h1>
        <hr>


        <div class="row">
           <div class="col-6 mx-auto">
                <form action="{{ route('client.update') }}" method="POST">
                    @csrf
                    <div class="card p-5 mt-5">
                        <div class="row">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="John ordy" value="{{ old('name') ?? $client->name}}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @enderror
                             </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-8">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"" id="phone" placeholder="+243 ........." value="{{ old('phone') ?? $client->phone }}">
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('phone') }}
                                    </div>
                                @enderror
                             </div>
                             <div class="mb-3 col-4">
                                <label for="gender" class="form-label" name="gender">Gender</label>
                                <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror"" aria-label="Default select example" id="gender">
                                    <option {{ (old('gender') == $gender[0] or $client->gender == $gender[0]) == true ? "selected" : "" }} value="M">M</option>
                                    <option {{ (old('gender') == $gender[1] or $client->gender == $gender[1])  == true ? "selected" : "" }} value="F">F</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('gender') }}
                                    </div>
                                @enderror
                             </div>
                        </div>
                        <div class="row">
                             <div class="mb-3 col-8">
                                <label for="company_id" class="form-label">Company</label>
                                <select id="company_id" name="company_id" class="form-select @error('company_id') is-invalid @enderror"" aria-label="Default select example" id="company_id">
                                    @foreach ($companies as $company )
                                        <option {{ (old('company_id') ==  $company->id or $client->company_id == $company->id) == true ? "selected" : "" }} value="{{ $company->id }}">{{ $company->name }}</option>  
                                    @endforeach
                                  </select>
                                  @error('company_id')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('company_id') }}
                                    </div>
                                @enderror
                             </div>
                             <div class="col-4">
                                <label for="formFile" class="form-label">Image</label>
                                <input name="image" id="formFile" class="form-control @error('image') is-invalid @enderror"" type="file" id="formFile">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('image') }}
                                    </div>
                                @enderror
                             </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-12">
                               <label for="email" class="form-label">Email</label>
                               <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror"" id="email" placeholder="name@example.com" value="{{ old('email') ?? $client->email }} ">
                               @error('email')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @enderror
                            </div>
                       </div>
                       <button class="btn btn-primary" type="submit">Edit</button>
                    </div>

                    

                </form>
           </div>
        </div>
    </div>

</x-layout>