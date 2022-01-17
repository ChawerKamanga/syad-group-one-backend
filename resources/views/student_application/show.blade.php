@extends('layouts.daisy')

@section('content')
  <div id="root">
    <x-dashboard-side-nav />
    <div class="relative md:ml-64 bg-blueGray-50">
      <x-admin-top-navigation :message="$msg" />
      <!-- Header -->
      <main class="profile-page">
          <section class="relative block" style="height: 500px;">
            <div
              class="absolute top-0 w-full h-full bg-center bg-cover bg-blue-600"
            >
              <span
                id="blackOverlay"
                class="w-full h-full absolute"
              ></span>
            </div>
            <div
              class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
              style="height: 70px;"
            >
              <svg
                class="absolute bottom-0 overflow-hidden"
                xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none"
                version="1.1"
                viewBox="0 0 2560 100"
                x="0"
                y="0"
              >
                <polygon
                  class="text-gray-300 fill-current"
                  points="2560 0 2560 100 0 100"
                ></polygon>
              </svg>
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
                          <img
                            alt="..."
                            @if ($user->profile_pic)
                              src="{{ asset('images/upload/' . $user->profile_pic ) }}"
                            @else
                              src="{{ asset('images/upload/no-pic.png') }}"                                
                            @endif
                            class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16"
                            style="max-width: 150px;"
                          />
                        </div>
                      </div>
                      <div
                        class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center"
                      >
                        <div class="py-6 px-3 mt-32 sm:mt-0">
                          
                        </div>
                      </div>
                      <div class="w-full lg:w-4/12 px-4 lg:order-1">
                      </div>
                    </div>
                    <div class="text-center mt-12">
                      <h3
                        class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2"
                      >
                        {{ $user->fullname }}
                      </h3>
                      <div
                        class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase"
                      >
                        <i
                          class="fas fa-map-marker-alt mr-2 text-lg text-gray-500"
                        ></i>
                        @if ($user->is_allocated ==  0)
                          Not Yet Allocated
                        @else
                          Allocated {{ $user->hall->hall_name }} Room {{ $user->room->room_name }}
                        @endif
                      </div>
                      <div class="mb-2 text-gray-700 mt-10">
                        <i class="fas fa-briefcase mr-2 text-lg text-gray-500"></i
                        > {{ $user->program->program_name }}
                      </div>
                      <div class="mb-2 text-gray-700">
                        <i class="fas fa-university mr-2 text-lg text-gray-500"></i
                        > Year {{ $user->year_of_study }}  
                      </div>
                      <div class="mb-2 text-gray-700">
                        <i class="fas fa-university mr-2 text-lg text-gray-500"></i> 
                          @if ($user->gender == 'M')
                            Male
                          @else
                            Female 
                          @endif
                      </div>
                    </div>

                    @if ($user->is_allocated == 0)
                      <div class="flex mt-10 justify-center border-t border-gray-300">
                        <div class="pt-5">
                          <img src="{{ asset('images/upload/' . $user->payment_photo) }}" alt="fees payement photo">
                        </div>
                      </div>
                      <div class="mt-10 py-10 text-center">
  
                        <form method="POST" action="{{ route('allocation.store') }}">
                          @csrf
                          <div class="flex">
  
                            @if ($campusHalls)
                              <div class="p-6 card bordered w-6/12 m-5 bg-gray-600">
                                @forelse ($campusHalls as $campusHall)
                                  <div class="form-control">
                                    <label class="cursor-pointer label">
                                      <span class="label-text">{{ $campusHall->hall_name }}</span> 
                                      <input type="radio" name="hall_id" class="radio radio-primary" value="{{ $campusHall->id }}">
                                    </label>
                                  </div> 
                                @empty
                                  <div class="form-control">
                                    <p class="text-gray-200">No Halls Added Yet please <a href="{{ route('halls.create') }}" class="text-blue-500 underline">add them</a> </p>
                                  </div>
                                @endforelse
                              </div>
                            @endif
  
                            
                              @if ($campHalls)
                              <div class="p-6 card bordered w-4/12 m-5 bg-gray-600">
                                @forelse ($campHalls as $campHall)
                                  <div class="form-control">
                                    <label class="cursor-pointer label">
                                      <span class="label-text">{{ $campHall->hall_name }}</span> 
                                      <input type="radio" name="hall_id" class="radio radio-primary" value="{{ $campHall->id }}">
                                    </label>
                                  </div> 
                                @empty
                                  <div class="form-control">
                                    <p class="text-gray-200">No Halls Added Yet please <a href="{{ route('halls.create') }}" class="text-blue-500 underline">add them</a> </p>
                                  </div>
                                @endforelse
                              </div>
                              @endif
  
                              <div class="p-6 card bordered w-6/12 m-5 bg-gray-600">
                                @if ($rooms->count() > 0)
                                  <select name="room_id" class="select select-bordered select-primary w-full bg-gray-100">
                                    <option disabled="disabled" selected="selected">Choose your room</option> 
                                    @foreach ($rooms as $room)
                                      <option value="{{ $room->id  }}">Room {{ $room->room_name }}</option> 
                                    @endforeach
                                    
                                  </select>
                                @else
                                <div class="form-control">
                                  <p class="text-gray-200">No Rooms Added Yet Please <a href="{{ route('rooms.index') }}" class="text-blue-500 underline">Add Them</a> </p>
                                </div>
                                @endif
                              </div>
                              
                          </div>
  
                            <div class="flex flex-wrap justify-center">
                              <input type="hidden" id="userId" name="user_id" value="{{ $user->id }}">
                              <button class="btn btn-block m-5 bg-gray-600 hover:bg-gray-700 border-gray-700"
                              type="submit">
                                Allocate
                              </button>
                            </div>
  
                          </form>
  
  
                        </div>
                      </div>
                    @else
                    <div class="mt-10 py-10 text-center">
                      
                        <div class="flex flex-wrap justify-center">
                          <input type="hidden" id="userId" name="user_id" value="{{ $user->id }}">
                          <button class="btn btn-block m-5 bg-blue-600 hover:bg-blue-700 border-blue-700"
                          type="submit" onclick="deleteconfirm({{$user->id}})">
                            Deallocate
                          </button>
                        </div>

                        <form method="POST" action="{{ route('allocation.deallocate', $user) }}" id="{{'form-delete-'.$user->id}}">
                          @csrf
                          @method('DELETE')
                        </form>

                      </div>
                    </div>
                    @endif



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
        confirmButtonText: 'Yes, Deallocate!'
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


