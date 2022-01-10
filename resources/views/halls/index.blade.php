@extends('layouts.app')

@section('content')
<div id="root">
    
    <div class="relative md:ml-64 bg-blueGray-50">
      <x-dashboard-side-nav />
      <!-- Header -->
      <div class="relative bg-blue-600 md:pt-32 pb-32 pt-12">
        
        <x-admin-top-navigation :message="$msg" />

        <div class="px-4 md:px-10 mx-auto w-full">
          <div>
            <!-- Card stats -->
            <div class="flex flex-wrap">
              @foreach ($campusHalls as $campusHall)
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4 pt-3">
                  <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                    <div class="flex-auto p-4">

                      <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                          <a href="{{ route('halls.show', $campusHall) }}">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                              # of Students ({{ $campusHall->hall_name }})
                            </h5>
                            <span class="font-semibold text-xl text-blueGray-700">
                              {{ $campusHall->users->count() }}
                            </span>
                          </a>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <a href="{{ route('halls.show', $campusHall) }}">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full 
                              @if ($campusHall->gender == 'M')
                                bg-blue-500
                              @else
                                bg-pink-500
                              @endif
                            ">
                              @if ($campusHall->gender == 'M')
                                <i class="fa fa-user-tie"></i>  
                              @else
                                <i class="fa fa-female"></i>
                              @endif
                            </div>
                          </a>
                        </div>
                      </div>
                      <p class="text-sm text-blueGray-400 mt-4">
                        <span class="text-red-500 mr-2">
                          <i class="fas fa-arrow-up"></i> 
                          {{ ($campusHall->users->count() / $campusHall->max_students) * 100}}%
                        </span>
                        <span class="whitespace-nowrap">
                          hall is full
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <!-- Table -->
      <div class="px-4 md:px-10 mx-auto w-full -m-24">
       
        <div class="flex flex-wrap mt-4">
          <div class="w-full xl:w-12/12 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
              <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                  <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                    <h3 class="font-semibold text-base text-blueGray-700">
                      Camp Side
                    </h3>
                  </div>
                  <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                    <a
                      href="{{ route('halls.create') }}"
                      class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                      style="transition:all .15s ease"
                    >
                      Add Halls
                    </a>
                  </div>
                </div>
              </div>
              <div class="block w-full overflow-x-auto">
                <!-- Projects table -->
                @if ($campHalls->count() > 0)
                  <table class="items-center w-full bg-transparent border-collapse">
                    <thead class="thead-light">
                      <tr>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          Block Name
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          # of Student
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          Gender
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          Is For People with Disability
                        </th>
                        <th
                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                        style="min-width:140px"
                        ></th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($campHalls as $campHall)
                        <tr>
                          <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            <a href="{{ route('halls.show', $campHall) }}">
                              {{ $campHall->hall_name }}
                            </a>
                          </th>
                          <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            {{ $campHall->max_students }}
                          </td>
                          <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            @if ($campHall->gender == 'M')
                              For Males                                
                            @else
                              For Females  
                            @endif
                          </td>
                          <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            @if ($campHall->is_for_disability == 1)
                              Yes                                
                            @else
                              No
                            @endif
                          </td>
                          <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <div class="flex items-center">
                              <span class="mr-2">{{ ($campHall->users->count() / $campHall->max_students) * 100}}%</span>
                              @if (($campHall->users->count() / $campHall->max_students) * 100 <= 49)
                                <div class="relative w-full">
                                  <div class="overflow-hidden h-2 text-xs flex rounded bg-green-200">
                                    <div
                                    style="width:{{ ($campHall->users->count() / $campHall->max_students) * 100}}%"
                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"
                                    ></div>
                                  </div>
                                </div>
                              @else
                                <div class="relative w-full">
                                  <div class="overflow-hidden h-2 text-xs flex rounded bg-red-200">
                                    <div
                                    style="width:{{ ($campHall->users->count() / $campHall->max_students) * 100}}%"
                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500"
                                    ></div>
                                  </div>
                                </div>
                              @endif
                            </div>
                          </td>
                          <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <a href="{{ route('new-applicants') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Students</a>
                            <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                              href="{{ route('halls.edit', $campHall) }}"
                            >
                              Edit
                            </button>
                          </td>
                        </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                @else
                  <div class="items-center w-full bg-transparent border-collapse flex justify-center p-10">
                     <p>No Camp Block found please add by clicking on <a href="{{ route('halls.create') }}" class="underline text-blue-600">add halls</a> </p>
                  </div> 
                @endif
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </div>
@endsection