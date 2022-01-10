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
                                Contact Us Messages
                              </h3>
                            </div>
                            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                              <button
                              class="bg-blue-500 text-white active:bg-blue-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                              type="button"
                              style="transition:all .15s ease"
                            >
                                See All
                            </button>
                            </div>
                          </div>
                        </div>
                        <div class="block w-full overflow-x-auto">
                          @if ($messages->count())
                          <table class="items-center w-full bg-transparent border-collapse">
                            <thead class="thead-light">
                                <tr>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Sender's Name
                                  </th>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Sender's Email
                                  </th>
                                  <th
                                  class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                  style="min-width:140px"
                                  >Subject</th>
                                  <th
                                  class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                  style="min-width:140px"
                                  >Message</th>
                                  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Received At
                                  </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                    {{ $message->firstname }} {{ $message->lastname }} 
                                </th>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    <a href="student_profile.html">{{ $message->email }}</a>
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $message->subject }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $message->message }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $message->created_at->diffForHumans() }}
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                          @else
                          <p class="px-10 py-5 text-lg text-gray-500 text-center uppercase">There are no Contact Us Messages</p>
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
@endsection