@extends('layouts.app')

@section('content')
<main>
    <form class="absolute w-full h-full" method="POST" action="{{ route('login.store') }}">
      @csrf
      <div class="absolute top-0 w-full h-full bg-gray-900"
        style="background-image: url({{ asset('img/register_bg_2.png') }}); background-size: 100%; background-repeat: no-repeat;">
      </div>
      <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
          <div class="w-full lg:w-4/12 px-4">
            <div
              class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0">
              <div class="flex-auto px-4 lg:px-10 py-10 pt-10">
                <form>
                  <div class="relative w-full mb-3">
                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                      for="email">Email</label>
                    <input type="email"
                      required
                      class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                      placeholder="Email" name="email" id="email" style="transition: all 0.15s ease 0s;" />
                  </div>
                  <div class="relative w-full mb-3">
                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                      for="grid-password">Password</label>
                    <input type="password"
                      name="password" required
                      class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                      placeholder="Password" id="grid-password" style="transition: all 0.15s ease 0s;" />
                  </div>
                  <div>
                    <label class="inline-flex items-center cursor-pointer"><input id="customCheckLogin" type="checkbox"
                        class="form-checkbox border-0 rounded text-gray-800 ml-1 w-5 h-5"
                        style="transition: all 0.15s ease 0s;" /><span
                        class="ml-2 text-sm font-semibold text-gray-700">Remember me</span></label>
                  </div>
                  <div class="text-center mt-6 w-full">
                    <button
                      type="submit"
                      class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 
                      rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full block"
                      style="transition: all 0.15s ease 0s;">
                      Sign In
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="flex flex-wrap mt-2">
              <div class="w-1/2">
                <a href="#pablo" class="text-gray-300"><small>Forgot password?</small></a>
              </div>
              <div class="w-1/2 text-right">
                <a href="#pablo" class="text-gray-300"><small>Create new account</small></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </main>

  <script>
    function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("block");
    }
  </script>
@endsection