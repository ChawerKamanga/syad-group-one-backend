@extends('layouts.app')

@section('content')
<div id="root">
    
    <div class="relative md:ml-64 bg-blueGray-50">
      <x-dashboard-side-nav />
      <!-- Header -->
      <div class="relative md:pt-32 pb-32 pt-12 bg-blue-600">
        <x-admin-top-navigation :message="$msg" />
       
      </div>
      <!-- Table -->
      <div class="px-4 md:px-10 mx-auto w-full -m-24">
       
        <div class="flex flex-wrap mt-4">
          <div class="w-full xl:w-12/12 mb-12 xl:mb-0 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
              <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                  <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                    <h3 class="font-semibold text-base text-blueGray-700">
                      Search Results
                    </h3>
                  </div>
                  <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                    <a
                      href=""
                      class="bg-blue-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                      style="transition:all .15s ease"
                    >
                      See All
                    </a>
                </div>
                </div>
              </div>
              @if ($results)
              <div class="block w-full overflow-x-auto">

                @if ($results->count())
                  <table class="items-center w-full bg-transparent border-collapse">
                    <thead class="thead-light">
                        <tr>
                          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Fault Name
                          </th>
                          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Description
                          </th>
                          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($results as $fault)
                        <tr>
                        <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                          <a href="">
                            {{ $fault->fault_name }} 
                          </a>
                        </th>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            {{ $fault->description }}
                        </td>
                        
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <button
                              class="bg-blue-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 float-right"
                              style="transition:all .15s ease"
                              type="button"
                              onclick="allocationConfirm({{ $fault->id }})"
                            >
                              Report
                            </button>
                            <form action="{{ route('fault.report', $fault) }}" method="post" id="{{'form-report-'.$fault->id}}" class="hidden">
                                @csrf
                            </form>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                @else
                <div class="p-5">
                  <p class="px-10 py-5 text-lg text-gray-500 text-center uppercase">No Results Found</p>
                </div>
                @endif
              </div>
              <div class="m-2">
                {{ $results->links() }}
              </div>
            </div>
            @endif
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  function allocationConfirm(id) {
      let button = document.getElementById('form-report-' + id);
          Swal.fire({
        title: 'Are you sure?',
        text: "Do you really have that fault in your room?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, send it!'
      }).then((result) => {
        if (result.isConfirmed) {
          button.submit()
        }
      })
}
</script>
@endsection