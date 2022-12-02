<x-layout title="companies">
    

    <div class="container mt-3">
        <h1 class="h3">List of companies</h1>

        <hr>

        <div class="table-responsive">
            <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Website</th>
                    <th scope="col">address</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($companies as $company )
                    <tr>
                        <th>{{ $company->name }}</th>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website }}</td>
                        <td>{{ $company->address }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
    

</x-layout>