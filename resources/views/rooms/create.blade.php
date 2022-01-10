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
                  <form action="{{ route('rooms.store') }}" method="POST">
                    @csrf
                    <div class="flex flex-col items-center mt-10 py-2 border-gray-300">
                      <div class="items-center  w-10/12">
                        <div class="flex md:flex-row">
                          <div class="w-full flex-1 mx-4">
                            <label for="room-name">Room Name</label>
                            <div class="bg-white my-2 p-1 flex border flex-col border-blue-400 rounded">
                              <input placeholder="Enter room name..." name="room_name" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"
                              value="{{ old('room_name') }}"
                              id="room-name"
                              type="text">
                            </div>
                          </div>
                          <div class="w-full flex-1 mx-2">
                            <label for="max-number">Maximum Number of Students</label>
                            <div class="bg-white my-2 p-1 flex flex-col border border-blue-400 rounded">
                              <input placeholder="Enter maximum students..." name="max_students" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"
                              value="{{ old('max_students') }}"
                              type="number"
                              min="1"
                              id="max-number"
                              >
                            </div>
                          </div>
                        </div>
                        <div class="flex md:flex-row">
                            <div class="flex w-full flex-1 mx-4">
                                <p class="mr-5">Select floor:</p>

                                <div class="mr-2">
                                  <input type="radio" id="ground" name="floor_number" value="0"
                                         checked>
                                  <label class="cursor-pointer" for="ground">Ground</label>
                                </div>
                                
                                <div class="mr-2">
                                  <input type="radio" id="first" name="floor_number" value="1">
                                  <label class="cursor-pointer" for="first">First</label>
                                </div>
                                
                                <div class="mr-2">
                                  <input type="radio" id="second" name="floor_number" value="2">
                                  <label class="cursor-pointer" for="second">Second</label>
                                </div>
                            </div>
                            
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