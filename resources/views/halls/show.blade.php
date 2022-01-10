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
                                {{ $hall->slug }} Students
                              </h3>
                            </div>
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                              @can('create', Auth::user())
                                <a
                                  href="{{ route('new-applicants') }}"
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
                          @if ($users->count())
                          <table class="items-center w-full bg-transparent border-collapse">
                            <thead class="thead-light">
                                <tr>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Full Name
                                  </th>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Program
                                  </th>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Year of study
                                  </th>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    phonenumber
                                  </th>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Room
                                  </th>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Email
                                  </th>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    RegNumber
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
                            @foreach ($users as $user)
                                <tr>
                                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                    {{ $user->fullname }} 
                                </th>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $user->program->program_name }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $user->year_of_study }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $user->phonenumber }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $user->room->room_name }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $user->email }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $user->reg_number }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                  {{ $user->created_at->diffForHumans() }}
                                </td>
                                @can('update', Auth::user())
                                  <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 flex justify-center">
                                    <div class="m-2">
                                        <button
                                            class="bg-blue-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                                            style="transition:all .15s ease"
                                            type="button"
                                            onclick="deleteconfirm({{$user->id}})"
                                            >
                                            Deallocate
                                        </button>

                                        <form method="POST" action="{{ route('allocation.deallocate', $user) }}" id="{{'form-delete-'.$user->id}}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                  </td>
                                @endcan
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                          <div class="m-2">
                            {{ $users->links() }}
                          </div>
                          @else
                          <p class="px-10 py-5 text-lg text-gray-500 text-center uppercase">There are no Students please 
                              <a href="{{ route('new-applicants') }}" class="underline text-blue-500">add them</a></p>
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

