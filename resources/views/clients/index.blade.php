<x-layout title="Clients">

    <div class="container mt-3">
        <h1 class="h3">List of clients</h1>
        <hr>
        <a href="{{ route('client.create') }}" class="btn btn-primary">Add new client</a>
        <hr>
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
              <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Company</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              
                @foreach ($clients as $client )
                <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <img
                            src="{{ asset('images/profile.jpg') }}"
                            alt=""
                            style="width: 45px; height: 45px"
                            class="rounded-circle"
                            />
                        <div class="ms-3">
                          <p class="fw-bold mb-1">{{ $client->name }}</p>
                          <p class="text-muted mb-0">{{ $client->email }}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="fw-normal mb-1">{{ $client->phone }}r</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">{{ $client->gender }}</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">{{ $client->company->name }}r</p>
                    </td>
                    <td>
                      <button type="button" class="btn btn-link btn-sm btn-rounded">
                        Edit
                      </button>
                    </td>
                  </tr>
                @endforeach
              
            </tbody>
          </table>

      <div class="d-flex justify-content-end mt-5">
        {{ $clients->links() }}
      </div>
    </div>

</x-layout>