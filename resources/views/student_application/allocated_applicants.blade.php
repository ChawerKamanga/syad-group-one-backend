@extends('layouts.app')

@section('content')
<div id="root">
    
    <div class="relative md:ml-64 bg-blueGray-50">
      <x-dashboard-side-nav />
      <!-- Header -->
      <div class="relative md:pt-32 pb-32 pt-12 bg-blue-600">
        <x-admin-top-navigation :message="$msg" />
        <div class="px-4 md:px-10 mx-auto w-full">
          <div>
            <!-- Card stats -->
            <div class="flex flex-wrap">
              <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                  <div class="flex-auto p-4">

                    <a href="">
                      <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                          <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            Allocated Applicants ({{ Str::plural('Male',  $numberOfallalocatedMales) }})
                          </h5>
                          <span class="font-semibold text-xl text-blueGray-700">
                            {{ $numberOfallalocatedMales }} 
                          </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                            <i class="fa fa-user-tie"></i>
                          </div>
                        </div>
                      </div>
                    </a>
                      <p class="text-sm text-blueGray-400 mt-4">
                      <span class="text-red-500 mr-2">
                        <i class="fas fa-arrow-up"></i> 

                        @if ( $numberOfallalocated  == 0 )
                          0% 
                        @else
                          {{ ceil(($numberOfallalocatedMales / $numberOfallalocated * 100)) }}%
                        @endif
                      </span>
                      <span class="whitespace-nowrap">
                        
                      </span>
                    </p>
                  </div>
                </div>
              </div>

              <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                  <div class="flex-auto p-4">

                    <a href="">
                      <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                          <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            Allocated Applicants ({{ Str::plural('Female',  
                             $numberOfallalocatedFemales) }})
                          </h5>
                          <span class="font-semibold text-xl text-blueGray-700">
                            {{ $numberOfallalocatedFemales }} 
                          </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-yellow-500">
                            <i class="fa fa-female"></i>
                          </div>
                        </div>
                      </div>
                    </a>
                      <p class="text-sm text-blueGray-400 mt-4">
                      <span class="text-red-500 mr-2">
                        <i class="fas fa-arrow-up"></i> 
                        @if ( $numberOfallalocated == 0 )
                          0%
                        @else
                          {{ ceil(($numberOfallalocatedFemales / $numberOfallalocated) * 100) }}%
                        @endif
                      </span>
                      <span class="whitespace-nowrap">
                        
                      </span>
                    </p>
                  </div>
                </div>
              </div>

              <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                  <div class="flex-auto p-4">

                    <a href="">
                      <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                          <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            Allocated Applicants with disability
                          </h5>
                          <span class="font-semibold text-xl text-blueGray-700">
                            {{ $numberOfallalocatedDisability }} 
                          </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-blue-500">
                            <i class="fab fa-accessible-icon"></i>
                          </div>
                        </div>
                      </div>
                    </a>
                      <p class="text-sm text-blueGray-400 mt-4">
                      <span class="text-red-500 mr-2">
                        <i class="fas fa-arrow-up"></i> 
                        @if ($numberOfallalocated == 0)
                           0% 
                        @else
                          {{ ceil(($numberOfallalocatedDisability / $numberOfallalocated) * 100) }}%
                        @endif
                      </span>
                      <span class="whitespace-nowrap">
                        
                      </span>
                    </p>
                  </div>
                </div>
              </div>

              <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                  <div class="flex-auto p-4">

                    <a href="">
                      <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                          <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            Allocated Applicants in year 5
                          </h5>
                          <span class="font-semibold text-xl text-blueGray-700">
                            {{ $numberOfallalocatedYear5 }} 
                          </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-green-500">
                            <i class="fas fa-graduation-cap"></i>
                          </div>
                        </div>
                      </div>
                    </a>
                      <p class="text-sm text-blueGray-400 mt-4">
                      <span class="text-red-500 mr-2">
                        <i class="fas fa-arrow-up"></i> 
                        @if ($numberOfallalocated == 0 )
                          0%
                        @else
                          {{ ceil(($numberOfallalocatedYear5 / $numberOfallalocated) * 100) }}%
                        @endif
                      </span>
                      <span class="whitespace-nowrap">
                        
                      </span>
                    </p>
                  </div>
                </div>
              </div>

              <div class="w-full lg:w-6/12 xl:w-3/12 px-4 py-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                  <div class="flex-auto p-4">

                    <a href="">
                      <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                          <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            Allocated Applicants in year 4
                          </h5>
                          <span class="font-semibold text-xl text-blueGray-700">
                            {{ $numberOfallalocatedYear4 }} 
                          </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500">
                            <i class="fas fa-graduation-cap"></i>
                          </div>
                        </div>
                      </div>
                    </a>
                      <p class="text-sm text-blueGray-400 mt-4">
                      <span class="text-red-500 mr-2">
                        <i class="fas fa-arrow-up"></i> 
                        @if ($numberOfallalocated == 0)
                          0% 
                        @else
                          {{ ceil(($numberOfallalocatedYear4 / $numberOfallalocated) * 100) }}%
                        @endif
                      </span>
                      <span class="whitespace-nowrap">
                        
                      </span>
                    </p>
                  </div>
                </div>
              </div>

              <div class="w-full lg:w-6/12 xl:w-3/12 px-4 py-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                  <div class="flex-auto p-4">

                    <a href="">
                      <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                          <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            Allocated Applicants in year 3
                          </h5>
                          <span class="font-semibold text-xl text-blueGray-700">
                            {{ $numberOfallalocatedYear3 }} 
                          </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-purple-500">
                            <i class="fas fa-user-graduate"></i>
                          </div>
                        </div>
                      </div>
                    </a>
                      <p class="text-sm text-blueGray-400 mt-4">
                      <span class="text-red-500 mr-2">
                        <i class="fas fa-arrow-up"></i> 
                        @if ($numberOfallalocated == 0)
                          0%
                        @else
                          {{ ceil(($numberOfallalocatedYear3 / $numberOfallalocated) * 100) }}%
                        @endif
                      </span>
                      <span class="whitespace-nowrap">
                        
                      </span>
                    </p>
                  </div>
                </div>
              </div>

              <div class="w-full lg:w-6/12 xl:w-3/12 px-4 py-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                  <div class="flex-auto p-4">

                    <a href="">
                      <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                          <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            Allocated Applicants in year 2
                          </h5>
                          <span class="font-semibold text-xl text-blueGray-700">
                            {{ $numberOfallalocatedYear2 }} 
                          </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-gray-500">
                            <i class="fas fa-user-graduate"></i>
                          </div>
                        </div>
                      </div>
                    </a>
                      <p class="text-sm text-blueGray-400 mt-4">
                      <span class="text-red-500 mr-2">
                        <i class="fas fa-arrow-up"></i> 
                        @if ( $numberOfallalocated == 0 )
                          0%
                        @else
                          {{ ceil(($numberOfallalocatedYear2 / $numberOfallalocated) * 100) }}%
                        @endif
                      </span>
                      <span class="whitespace-nowrap">
                        
                      </span>
                    </p>
                  </div>
                </div>
              </div>

              <div class="w-full lg:w-6/12 xl:w-3/12 px-4 py-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                  <div class="flex-auto p-4">

                    <a href="">
                      <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                          <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            Allocated Applicants in year 1
                          </h5>
                          <span class="font-semibold text-xl text-blueGray-700">
                            {{ $numberOfallalocatedYear1 }} 
                          </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-indigo-500">
                            <i class="fas fa-book-reader"></i>
                          </div>
                        </div>
                      </div>
                    </a>
                      <p class="text-sm text-blueGray-400 mt-4">
                      <span class="text-red-500 mr-2">
                        <i class="fas fa-arrow-up"></i> 
                        @if ($numberOfallalocated == 0)
                          0%
                        @else
                          {{ ceil(($numberOfallalocatedYear1 / $numberOfallalocated) * 100) }}%
                        @endif
                      </span>
                      <span class="whitespace-nowrap">
                        
                      </span>
                    </p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
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
                      Allocated Applicants {{ $routeName }}
                    </h3>
                  </div>
                  <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                    <a
                      href=""
                      class="bg-green-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                      style="transition:all .15s ease"
                    >
                      Order By Year
                    </a>
                    <a
                      href=""
                      class="bg-yellow-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                      style="transition:all .15s ease"
                    >
                      Order By Program
                    </a>
                  <a
                    href=""
                    class="bg-red-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                    style="transition:all .15s ease"
                  >
                      Order By Date
                  </a>
                </div>
                </div>
              </div>
              <div class="block w-full overflow-x-auto">
                @if ($newApplicatants->count())
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
                          Application Time
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                        </th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach ($newApplicatants as $newApplicatant)
                      <tr>
                      <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                        <a href="{{ route('users.show', $newApplicatant) }}">
                          {{ $newApplicatant->fullname }} 
                        </a>
                      </th>
                      <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                          {{ $newApplicatant->email }}
                      </td>
                      <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                          {{ $newApplicatant->reg_number }}
                      </td>
                      <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                          {{ $newApplicatant->year_of_study }}
                      </td> 
                      <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                          {{ $newApplicatant->gender }}
                      </td> 
                      <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                          @if ( $newApplicatant->has_disability == 1)
                            Yes  
                          @else
                            No
                          @endif
                      </td>
                      <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                          {{ $newApplicatant->phonenumber }}
                      </td> 
                      <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                        {{ $newApplicatant->created_at->diffForHumans() }}
                      </td>
                      <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                        <button
                          class="bg-blue-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                          style="transition:all .15s ease"
                          type="button"
                          onclick="deleteconfirm({{$newApplicatant->id}})"
                          >
                          Deallocate
                        </button>

                        <form method="POST" action="{{ route('allocation.deallocate', $newApplicatant) }}" id="{{'form-delete-'.$newApplicatant->id}}">
                            @csrf
                            @method('DELETE')
                        </form>
                      </td>
                      </tr>
                  @endforeach
                </tbody>
                  </table>
              </div>
              <div class="m-2">
                {{ $newApplicatants->links() }}
              </div>
              @else
              <div class="p-5">
                <p class="px-10 py-5 text-lg text-gray-500 text-center uppercase">There are no applicants yet please tell them to start applying for accomodation</p>
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