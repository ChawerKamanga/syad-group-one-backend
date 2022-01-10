@extends('layouts.app')

@section('content')
<div id="root">
  <x-dashboard-side-nav />
  <div class="relative md:ml-64 ">
    <x-admin-top-navigation :message="$msg" />
    <!-- Header -->
    <main class="profile-page">
        <section class="relative block" style="height: 500px;">
          <div
            class="absolute top-0 w-full h-full bg-center bg-cover bg-blue-600"
          >
            <span
              id="blackOverlay"
              class="w-full h-full absolute opacity-50"
            ></span>
          </div>
          <div
            class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
            style="height: 70px;"
          >
          </div>
        </section>
        <section class="relative py-16 bg-gray-300">
          <div class="container mx-auto px-4">
            <div
              class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64"
            >
                <div class="flex flex-wrap mt-4">
                    <div class="w-full xl:w-12/12 px-4">
                      <div class="flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                        <div class="rounded-t mb-0 px-4 py-3 border-0">
                          <div class="flex flex-wrap items-center">
                            <div class="w-full px-4 max-w-full flex-grow flex-1">
                              <h3 class="font-semibold text-base text-blueGray-700 uppercase">
                                University Admins
                              </h3>
                            </div>
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                              @can('create', Auth::user())
                                <a
                                  href="{{ route('admin.register') }}"
                                  class="bg-blue-500 text-white active:bg-blue-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                                  type="button"
                                  style="transition:all .15s ease"
                                >
                                  Add Addmin
                                </a>
                              @endcan
                            </div>
                          </div>
                        </div>
                        <div class="block w-full overflow-x-auto">
                          @if ($admins->count())
                          <table class="items-center w-full bg-transparent border-collapse">
                            <thead class="thead-light">
                                <tr>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Full Name
                                  </th>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    email
                                  </th>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Phonenumber
                                  </th>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Gender
                                  </th>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Role
                                  </th>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Added At
                                  </th>
                                  @can('update', Auth::user())
                                    <th
                                    class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold"
                                    style="min-width:140px"
                                    >Actions</th>
                                  @endcan
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                    {{ $admin->fullname }} 
                                </th>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $admin->email }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $admin->phonenumber }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    @if ($admin->gender == 'M')
                                        Male
                                    @else
                                        Female
                                    @endif
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $admin->role->role_name }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                  {{ $admin->created_at->diffForHumans() }}
                                </td>
                                @can('update', Auth::user())
                                  <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 flex justify-center">
                                    <div class="m-2">
                                      <a href="{{ route('admin.edit', $admin) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                    </div>
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                    onclick="
                                      deleteconfirm({{$admin->id}})
                                    ">Delete</button>
                                    <form action="{{ route('admin.destroy', $admin->id) }}" method="post" id="{{'form-delete-'.$admin->id}}">
                                      @csrf
                                      @method('DELETE')
                                    </form>
                                  </td>
                                @endcan
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                          <div class="m-2">
                            {{ $admins->links() }}
                          </div>
                          @else
                          <p class="px-10 py-5 text-lg text-gray-500 text-center uppercase">There are no Admins Please 
                              <a href="{{ route('admin.register') }}" class="underline text-blue-500">add them</a></p>
                          @endif
                        </div>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        </section>
      </main>
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
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        button.submit()
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
  }
</script>
@endsection