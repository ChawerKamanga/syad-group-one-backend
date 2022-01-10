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
                <div class="px-6">
                  <div class="flex flex-wrap justify-center">
                    <div
                      class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center"
                    >
                      <div class="relative">
                      </div>
                    </div>

                  </div>
                  <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col items-center mt-10 py-2 border-gray-300">
                      <div class="items-center  w-10/12">
                        <div class="flex md:flex-row">
                          <div class="w-full flex-1 mx-4">
                            <label for="fullname">Full Name</label>
                            <div class="bg-white my-2 p-1 flex border flex-col border-blue-400 rounded svelte-1l8159u">
                              <input 
                                placeholder="Enter Full Name" 
                                name="fullname" 
                                class="p-1 px-2 appearance-none outline-none w-full text-gray-800"
                                value="{{ $admin->fullname }}" 
                                id="fullname" 
                                required
                              >
                            </div>
                          </div>
                          <div class="w-full flex-1 mx-2 svelte-1l8159u">
                            <label for="email">Email</label>
                            <div class="bg-white my-2 p-1 flex flex-col border border-blue-400 rounded svelte-1l8159u">
                              <input 
                                placeholder="Enter their email..." 
                                type="email"
                                required
                                name="email" 
                                class="p-1 px-2 appearance-none outline-none w-full text-gray-800"
                                value="{{ $admin->email }}"
                                id="email"
                              >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="flex flex-col items-center py-2 border-gray-300">
                      <div class="items-center  w-10/12">
                        <div class="flex md:flex-row">
                          
                          <div class="w-full flex-1 mx-4">
                            <label for="password">Create Password</label>
                            <div class="bg-white my-2 p-1 flex border flex-col border-blue-400 rounded svelte-1l8159u">
                              <input 
                                placeholder="Enter their password..." 
                                name="password" 
                                type="password"
                                class="p-1 px-2 appearance-none outline-none w-full text-gray-800"
                                value="{{ old('password') }}"
                                id="password"
                              >
                            </div>
                          </div>

                          <div class="w-full flex-1 mx-4">
                            <label for="phonenumber">Phonenumber</label>
                            <div class="bg-white my-2 p-1 flex border flex-col border-blue-400 rounded svelte-1l8159u">
                              <input 
                                placeholder="Enter phonenumber..." 
                                name="phonenumber" 
                                class="p-1 px-2 appearance-none outline-none w-full text-gray-800"
                                value="{{ $admin->phonenumber }}">
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>

                    <div class="flex flex-col items-center mx-2 py-2 border-gray-300">
                        <div class="items-center  w-10/12">
                          <div class="flex md:flex-row">

                            <div class="w-full flex-1 mx-2 mt-2">
                              <span>Gender</span>
                              <div class="mt-2">
                                <input type="radio" id="male" name="gender" value="M" checked>
                                <label for="male" class="mx-2 cursor-pointer">Male</label>
                              
                                <input type="radio" id="female" name="gender" value="F">
                                <label for="female" class="mx-1 cursor-pointer">Female</label>
                              </div>
                            </div>

                            @if ($roles->count() == 0)
                              <div class="w-full flex-1 mx-2 mt-2">
                                <p>There are no roles added in the system please <a href="{{ route('roles.index') }}" class="underline text-blue-500">add them</a></p>
                              </div>
                            @else
                              <div class="w-full flex-1 mx-2 mt-2">
                                <select name="role_id" id="pet-select" class="w-full py-3 px-2 rounded mt-2" required>
                                  <option value="">Please choose a role</option>
                                  @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            @endif

                          </div>
                        </div>
                      </div>
  
                    <div class="flex flex-col items-center mt-10 py-2 pb-10 border-gray-300">
                      <div class="items-center  w-10/12">
                          <div class="flex md:flex-row justify-center">
                              <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">Submit</button>
                          </div>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </section>
      </main>
  </div>
</div>
@endsection