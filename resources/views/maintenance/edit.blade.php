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
                  <form action="{{ route('maintenance.update', $fault) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col items-center mt-10 py-2 border-gray-300">
                      <div class="items-center  w-10/12">
                        <div class="flex md:flex-row">
                          <div class="w-full flex-1 mx-4">
                            <label for="fault-name">Fault Name</label>
                            <div class="bg-white my-2 p-1 flex border flex-col border-blue-400 rounded">
                              <input placeholder="Enter fault name..." name="fault_name" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"
                              value="{{ $fault->fault_name }}"
                              required
                              id="fault-name">
                            </div>
                          </div>
                        </div>

                        <div class="p-2 flex md:flex-row">
                            <div class="w-full flex-1 mx-2">
                                <label for="description">Description</label>
                                <div class="bg-white my-2 p-1 flex flex-col border border-blue-400 rounded">
                                    <textarea name="description"
                                        id="description"
                                        rows="5" cols="30"
                                        placeholder="Description text." required>{{ $fault->description }}</textarea>
                                </div>
                              </div>
                        </div>

                        @can('isAdmin', Auth::user())
                          <div class="p-2 flex md:flex-row">
                            <div class="w-full flex-1 mx-4">
                              <label class="cursor-pointer label">
                                <span class="label-text mr-5">Is a common fault?</span> 
                                @if ($fault->is_common)
                                  <input type="checkbox" class="checkbox" name="is_common" value="1" checked>
                                @else
                                  <input type="checkbox" class="checkbox" name="is_common" value="1">
                                @endif
                              </label>
                            </div>
                          </div>
                        @endcan
                        
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