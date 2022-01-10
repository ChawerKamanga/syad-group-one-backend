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
                  <form action="{{ route('halls.update', $hall) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col items-center mt-10 py-2 border-gray-300">
                      <div class="items-center  w-10/12">
                        <div class="flex md:flex-row">
                          <div class="w-full flex-1 mx-4">
                            <label for="hall-name">Hall Name</label>
                            <div class="bg-white my-2 p-1 flex border flex-col border-blue-400 rounded">
                              <input placeholder="Enter hall name..." name="hall_name" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"
                              value="{{ $hall->hall_name }}"
                              required
                              id="hall-name">
                            </div>
                          </div>
                          <div class="w-full flex-1 mx-2">
                            <label for="number-of-people">Maximum # of People</label>
                            <div class="bg-white my-2 p-1 flex flex-col border border-blue-400 rounded">
                              <input placeholder="Enter maximum number of people in the hall/block" name="max_number" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"
                              type="number"
                              min="1"
                              id="number-of-people"
                              required
                              value="{{ $hall->max_students }}">
                            </div>
                          </div>
                        </div>

                        <div class="p-2 flex md:flex-row">
                            <div class="w-full flex-1 mx-4">
                              @if ($hall->is_at_camp == 0)
                                <label class="cursor-pointer label">
                                    <span class="label-text mr-5">Found at Camp?</span> 
                                    <input type="checkbox" class="checkbox" name="is_at_camp">
                                </label>
                              @else
                                <label class="cursor-pointer label">
                                  <span class="label-text mr-5">Found at Camp?</span> 
                                  <input type="checkbox" class="checkbox" checked="checked" name="is_at_camp">
                                </label>
                              @endif
                            </div>

                            <div class="w-full flex-1 mx-4 flex">
                              <div class="mr-5">
                                @if ($hall->gender == 'M')
                                    <input type="radio" id="male" name="gender" value="M" required checked>
                                    <label for="male">Male</label>
                                @else
                                    <input type="radio" id="male" name="gender" value="M" required>
                                    <label for="male">Male</label>
                                @endif
                              </div>

                              <div class="">
                                @if ($hall->gender == 'F')
                                   <input type="radio" id="female" name="gender" value="F" checked>
                                   <label for="female">Female</label>
                                @else
                                  <input type="radio" id="female" name="gender" value="F">
                                  <label for="female">Female</label>
                                @endif
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