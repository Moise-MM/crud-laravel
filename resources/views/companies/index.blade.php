<x-layout title="companies">
    

    <div class="container mt-3">
        <h1 class="h3">List of companies</h1>
        <hr>
        <a href="{{ route('company.create') }}" class="btn btn-primary">Add new company</a>
        <hr>

        <div class="table-responsive">
            <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Website</th>
                    <th scope="col">address</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($companies as $company )
                    <tr>
                        <th>{{ $company->name }}</th>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website }}</td>
                        <td>{{ $company->address }}</td>
                        <td class="d-flex">
                          <a href="{{ route('company.edit',$company->id) }}" class="btn btn-link btn-sm btn-rounded">
                            Edit
                          </a>
                          <form method="POST" action="{{ route('company.destroy',$company->id) }}">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-link btn-sm btn-rounded">Delete</button>
                        </form>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>

        <div class="d-flex justify-content-end mt-5">
          {{ $companies->links() }}
        </div>
    </div>
    

</x-layout>