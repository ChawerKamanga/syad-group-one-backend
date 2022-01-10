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
                                User Roles
                              </h3>
                            </div>
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                              <button
                              class="bg-blue-500 text-white active:bg-blue-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                              type="button"
                              style="transition:all .15s ease"
                              onclick="addRole()"
                            >
                                Add Roles
                              </button>
                              <form action="{{ route('roles.store') }}" method="post" class="hidden" id="hidden-form">
                                @csrf
                                <input type="text" name="role_name" id="role" class="hidden" value="">
                              </form>
                            </div>
                          </div>
                        </div>
                        <div class="block w-full overflow-x-auto">
                          @if ($roles->count())
                          <table class="items-center w-full bg-transparent border-collapse">
                            <thead class="thead-light">
                                <tr>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Role ID
                                  </th>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Role Name
                                  </th>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Added At
                                  </th>
                                  <th
                                  class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold"
                                  style="min-width:140px"
                                  >Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                    {{ $role->id }} 
                                </th>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $role->role_name }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                  {{ $role->created_at->diffForHumans() }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 flex justify-center">
                                  <div class="m-1">
                                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                                    onclick="editRole( {{ $role->id }}, '{{ $role->role_name }}' )">Edit</button>
                                    <form action="{{ route('roles.update', $role) }}" method="post" class="hidden" id="{{'form-edit-'.$role->id}}">
                                      @csrf
                                      @method('PUT')
                                      <input type="text" name="role_name" id="{{'role-edit-'.$role->id}}" class="hidden" value="">
                                    </form>
                                  </div>
                                  <div class="m-1">
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                    onclick="
                                      deleteconfirm({{$role->id}})
                                    ">Delete</button>
                                    <form action="{{ route('roles.destroy', $role) }}" method="post" id="{{'form-delete-'.$role->id}}">
                                      @csrf
                                      @method('DELETE')
                                    </form>
                                  </div>
                                </td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                          <div class="m-2">
                            {{ $roles->links() }}
                          </div>
                          @else
                          <p class="px-10 py-5 text-lg text-gray-500 text-center uppercase">There are no roles Please add them</p>
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
    async function addRole() {
      let hiddenForm = document.querySelector('#hidden-form');
      let textInput = document.querySelector('#role');

      const { value: role } = await Swal.fire({
        title: 'Enter your role',
        input: 'text',
        showCancelButton: true,
        inputValidator: (value) => {
          if (!value) {
            return 'You need to write something!'
          }
        }
      })

      if (role) {
        textInput.setAttribute('value', role.toString())
        hiddenForm.submit();
      }
    }

    async function editRole(id, roleName) {
      let hiddenForm = document.querySelector('#form-edit-' + id)
      let textInput = document.querySelector('#role-edit-' + id)

      const inputValue = roleName

      const { value: role } = await Swal.fire({
        title: 'Edit Role',
        input: 'text',
        inputLabel: 'Edit ' + roleName + ' role',
        inputValue: inputValue,
        showCancelButton: true,
        inputValidator: (value) => {
          if (!value) {
            return 'You need to write something!'
          }
        }
      })

      if (role) {
        textInput.setAttribute('value', role.toString())
        hiddenForm.submit();
      }
    }

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