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
                            Student Fullname
                          </th>
                          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            email
                          </th>
                          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Registration Number
                          </th>
                          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Year of Study
                          </th><th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Gender
                          </th>
                          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Has Disability
                          </th>
                          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Phone Number
                          </th>
                          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($results as $student)
                        <tr>
                        <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                          <a href="{{ route('users.show', $student) }}">
                            {{ $student->fullname }} 
                          </a>
                        </th>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            {{ $student->email }}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            {{ $student->reg_number }}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            {{ $student->year_of_study }}
                        </td> 
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            {{ $student->gender }}
                        </td> 
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            @if ( $student->has_disability == 1)
                              Yes  
                            @else
                              No
                            @endif
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            {{ $student->phonenumber }}
                        </td> 
                        @can('isAdmin', Auth::user())
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                          @if ($student->is_allocated)
                            <button
                              class="bg-blue-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                              style="transition:all .15s ease"
                              type="button"
                              onclick="deleteconfirm({{$student->id}})"
                              >
                              Deallocate
                            </button>
                            <form method="POST" action="{{ route('allocation.deallocate', $student) }}" id="{{'form-delete-'.$student->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                          @else
                            <a
                              class="bg-blue-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                              style="transition:all .15s ease"
                              type="button"
                              href="{{ route('users.show', $student) }}"
                            >
                              Allocate
                            </a>
                          @endif

                        </td>
                        @endcan
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
  function deleteconfirm(id) {
    let button = document.getElementById('form-delete-' + id);
        Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Deallocate!'
    }).then((result) => {
      if (result.isConfirmed) {
        button.submit()
      }
    })
  }
</script>
@endsection