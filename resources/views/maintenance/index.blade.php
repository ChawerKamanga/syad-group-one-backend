@extends('layouts.app')

@section('content')
<div id="root">
    
    <div class="relative md:ml-64 bg-blueGray-50">
      <x-dashboard-side-nav />
      <!-- Header -->
      <div class="relative bg-blue-600 md:pt-32 pb-32 pt-12">
        
        

        <nav
    class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4"
    >
    <div
    class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4"
    >
    <a
        class="text-white text-sm uppercase hidden lg:inline-block font-semibold"
        href="/dashboard"
        >Faults</a
    >
    <form
        class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3"
        method="get" 
        action="{{ route('search.faults') }}"
    >
        <div class="relative flex w-full flex-wrap items-stretch">
        <input
            type="search"
            name="query"
            placeholder="Search here..."
            value="{{ request()->get('query') }}"
            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm shadow outline-none focus:outline-none focus:ring w-full pl-10"
        />
        <button
            type="submit"
            class="z-10 h-full leading-snug font-normal absolute text-center text-blueGray-300  bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3"
            ><i class="fas fa-search"></i
        ></button>
        </div>
    </form>
    <ul
        class="flex-col md:flex-row list-none items-center hidden md:flex"
    >
        <a class="text-blueGray-500 block" href="#pablo" onclick="openDropdown(event,'user-dropdown')">
        <div class="items-center flex">
            <span
            class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"
            ><img
                alt="..."
                class="w-full rounded-full align-middle border-none shadow-lg"
                src="{{ asset('images/upload/' . Auth::user()->profile_pic ) }}"
            /></span>
        </div>
        </a>
        <div
        class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
        style="min-width: 12rem;"
        id="user-dropdown"
        >
        <a
            href="{{ route('maintenance.index') }}"
            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
            >Maintenance</a
        >
        <form
            action="{{ route('logout') }}" method="post"
            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
            >
            @csrf
            <button type="submit">Logout</button></form
        >
       
        </div>
    </ul>
    </div>
</nav>

        <div class="px-4 md:px-10 mx-auto w-full">
          <div>
            <!-- Card stats -->
            <section class="dark:bg-gray-900">
                <div class="container mx-auto">
                    
                    <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-12 md:grid-cols-2 xl:grid-cols-4">
                        @foreach ($commonfaults as $commonFault)
                            <div class="p-6 space-y-3 border-2 border-white dark:border-blue-300 rounded-xl">
                                @can('isAdmin', Auth::user())
                                    <a href="{{ route('maintenance.edit', $commonFault) }}">
                                        <span class="inline-block text-white dark:text-blue-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg>
                                        </span>
                                    </a>
                                @elsecan('isStudent', Auth::user())
                                    <span class="inline-block text-white dark:text-blue-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @endcan
                
                                <h1 class="text-2xl font-semibold text-white capitalize dark:text-white">{{ $commonFault->fault_name }}</h1>
                
                                <p class="text-gray-200 dark:text-gray-300">
                                    {{ $commonFault->description }}
                                </p>

                                @can('isStudent', Auth::user())
                                    <button 
                                      type="button" 
                                      class="inline-flex p-1 text-blue-600 capitalize transition-colors duration-200 transform bg-white rounded-full dark:bg-blue-500 dark:text-white hover:underline hover:text-blue-600 dark:hover:text-blue-500"
                                      onclick="allocationConfirm({{ $commonFault->id }})"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <form action="{{ route('fault.report', $commonFault) }}" method="post" id="{{'form-report-'.$commonFault->id}}" class="hidden">
                                      @csrf
                                    </form>
                                @endcan
                
                            </div>
                        @endforeach
            
                       
                    </div>
                </div>
            </section>
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
                      Other Faults
                    </h3>
                  </div>
                  <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                    <a
                      href="{{ route('maintenance.create') }}"
                      class="bg-blue-500 text-white active:bg-blue-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                      style="transition:all .15s ease"
                    >
                      Add Faults
                    </a>
                  </div>
                </div>
              </div>
              <div class="block w-full overflow-x-auto">
                <!-- Projects table -->  
                @if ($faults->count() > 0)
                  <table class="items-center w-full bg-transparent border-collapse">
                    <thead class="thead-light">
                      <tr>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          Fault Name
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          Description
                        </th>
                        <th class="px-6 text-center bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($faults as $fault)
                        <tr>
                          <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            {{ $fault->fault_name }}
                          </th>
                          <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            {{ $fault->description }}
                          </td>
                          <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-center">
                            @can('isAdmin', Auth::user())
                              <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2"
                                href="{{ route('maintenance.edit', $fault) }}"
                              >
                                  Edit
                              </a>
                              <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline">Delete</button>
                            @elsecan('isStudent', Auth::user())
                              <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline" 
                              onclick="allocationConfirm({{ $fault->id }})">Report</button>
                            @endcan
                          </td>
                        </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                @else
                  <div class="items-center w-full bg-transparent border-collapse flex justify-center p-10">
                     <p>No faults found please add by clicking on <a href="{{ route('maintenance.create') }}" class="underline text-blue-600">add faults</a> </p>
                  </div> 
                @endif
              </div>
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