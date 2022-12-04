<x-layout title="Create client">
    <div class="container mt-4">
        <h1 class="h3">Edit company</h1>
        <hr>

        <div class="row">
           <div class="col-6 mx-auto">
                <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card p-4 mt-2">
                        <div class="row">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="NTM" value="{{ old('name') ?? $company->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @enderror
                             </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" name="website" class="form-control @error('website') is-invalid @enderror"" id="website" placeholder="www.google.com" value="{{ old('website') ?? $company->website }}">
                                @error('website')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('website') }}
                                    </div>
                                @enderror
                             </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-12">
                               <label for="email" class="form-label">Email</label>
                               <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror"" id="email" placeholder="name@example.com" value="{{ old('email') ?? $company->email }} ">
                               @error('email')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @enderror
                            </div>
                       </div>
                       <div class="row">
                        <div class="mb-3 col-12">
                           <label for="address" class="form-label">Address</label>
                           <textarea name="address" id="" cols="30" rows="5" class="form-control @error('address') is-invalid @enderror"" id="address">
                            {{ old('address') ?? $company->address }} 
                           </textarea>
                           @error('address')
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @enderror
                        </div>
                   </div>
                       <button class="btn btn-primary" type="submit">Save</button>
                    </div>

                </form>
           </div>
        </div>
    </div>

</x-layout>