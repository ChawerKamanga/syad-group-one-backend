@extends('layouts.app')

@section('content')
    <x-top-navigation/>
    <form class="h-screen bg-gray-300  flex justify-center items-center" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <!-- Start From Here -->
      <div
        class="bg-white rounded-lg w-2/3 flex flex-col justify-center sm:justify-start items-center sm:items-start sm:flex-row space-x-2 p-8  ">
        <section class="container mx-auto px-4">
          <div class="p-5">
            <div class="mt-1 p-4">
                <div class="flex flex-col md:flex-row">
                  <div class="w-full flex-1 mx-2 svelte-1l8159u">
                    <label class="font-bold text-gray-600 text-xs leading-8 uppercase h-6 mx-2 mt-3" for="fullname">Full Name</label>
                    <div class="bg-white my-2 p-1 flex border border-blue-400 rounded svelte-1l8159u">
                      <input placeholder="your fullname" class="p-1 px-2 appearance-none outline-none w-full text-gray-800" type="text" id="fullname" name="fullname"
                        required value="{{ old('fullname') }}"
                      >
                    </div>
                  </div>
                  <div class="w-full flex-1 mx-2 svelte-1l8159u">
                    <label class="font-bold text-gray-600 text-xs leading-8 uppercase h-6 mx-2 mt-3" for="reg_number">Registration Number</label>
                    <div class="bg-white my-2 p-1 flex border border-blue-400 rounded svelte-1l8159u">
                      <input placeholder="your registration number" class="p-1 px-2 appearance-none outline-none w-full text-gray-800" name="reg_number" id="reg_number"
                        required value="{{ old('reg_number') }}"
                      >
                    </div>
                  </div>
                </div>
                <div class="flex flex-col md:flex-row">
                  <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <label class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase" for="email"> Your Email</label>
                    <div class="bg-white my-2 p-1 flex border border-blue-400 rounded svelte-1l8159u">
                      <input placeholder="regnumber@must.ac.mw"
                        type="email"
                        required
                        class="p-1 px-2 appearance-none outline-none w-full text-gray-800" id="email" name="email"
                        value="{{ old('email') }}">
                    </div>
                  </div>
                  <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="w-full mx-2 flex-1 svelte-1l8159u">
                      <label class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase" for="phonenumber">Phonenumber</label>
                      <div class="bg-white my-2 p-1 flex border border-blue-400 rounded svelte-1l8159u">
                        <input placeholder="your phone number"
                          type="text"
                          required
                          class="p-1 px-2 appearance-none outline-none w-full text-gray-800" name="phonenumber" id="phonenumber"
                          value="{{ old('phonenumber') }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="flex flex-col md:flex-row">
                  <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <label class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase" for="password">Create Password</label>
                    <div class="bg-white my-2 p-1 flex border border-blue-400 rounded svelte-1l8159u">
                      <input
                        type="password"
                        required
                        class="p-1 px-2 appearance-none outline-none w-full text-gray-800" id="password" name="password"
                        value="{{ old('password') }}">
                    </div>
                  </div>
                  <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="w-full mx-2 flex-1 svelte-1l8159u">
                      <label class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase" for="password_confirmation">Confirm Password</label>
                      <div class="bg-white my-2 p-1 flex border border-blue-400 rounded">
                        <input 
                          type="password"
                          required
                          class="p-1 px-2 appearance-none outline-none w-full text-gray-800" name="password_confirmation" id="password_confirmation"
                          value="{{ old('password_confirmation') }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="flex flex-col md:flex-row">
                  <div class="w-full mx-2 flex-1">
                    <div class="mt-3">
                      <label for="cars" class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase" for="year-of-study">Year of
                        Study</label>
                    </div>
                    <select name="year_of_study" class="w-full py-3 px-2 rounded" id="year-of-study">
                      <option value="" selected disabled hidden>Choose your current year</option>
                      @foreach ($years as $year)
                          <option value="{{ $year }}" {{ old('year_of_study') == $year ? 'selected' : '' }}>Year {{ $year }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="w-full mx-2 flex-1">
                    <div class="mt-3">
                      <label for="cars" class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase" for="program">Choose your
                        program</label>
                    </div>
                    <select name="program" class="w-full py-3 px-2 rounded" id="program">
                      <option value="" selected disabled hidden>Choose your program</option>
                      @foreach ($programs as $program)
                        <option value="{{ $program->id }}" {{ old('program') == $program->id ? 'selected' : '' }}>{{ $program->program_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="flex flex-col md:flex-row">
                  <div class="w-full mx-2">
                    <label class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase" for="payment-photo">Upload proof of payment
                    </label>
                    <div class="bg-white my-2 p-1 flex border border-blue-400 rounded svelte-1l8159u">
                      <input type="file" name="payment_photo" class="p-1 px-2 appearance-none outline-none w-full text-gray-800" id="payment-photo" 
                      accept=".jpg, .jpeg, .png">
                    </div>
                  </div>
                </div>
                <div class="flex flex-col md:flex-row">
                  <div class="w-full flex-1 mx-2 svelte-1l8159u">
                    <span class="font-bold text-gray-600 text-xs leading-8 uppercase h-6 mx-2 mt-3">Gender</span>
                    <div class="flex">
                      <div class="m-2">
                        <input type="radio" id="male" name="gender" value="M" id="male">
                        <label for="male" class="cursor-pointer">Male</label>
                      </div>
                      <div class="m-2">
                        <input type="radio" name="gender" value="F" id="female">
                        <label for="female" class="cursor-pointer">Female</label>
                      </div>
                    </div>
                  </div>
                  <div class="w-full flex-1 mx-2 svelte-1l8159u">
                    <span class="font-bold text-gray-600 text-xs leading-8 uppercase h-6 mx-2 mt-3">Do You have a disability</span>
                    <div class="flex">
                      <div class="m-2">
                        <input type="radio" id="yes" name="has_disability" value="1" id="yes">
                        <label for="yes" class="cursor-pointer">Yes</label>
                      </div>
                      <div class="m-2">
                        <input type="radio" id="no" name="has_disability" value="0" id="no">
                        <label for="no" class="cursor-pointer">No</label>
                      </div>
                    </div>
                  </div>
                </div>
              <div class="flex p-2 mt-4 items-center">
                <button
                  type="submit"
                  class="flex-auto flex flex-row-reverse text-base w-2/3  ml-2  hover:scale-110 focus:outline-none justify-center px-4 py-2 m-2 rounded font-bold cursor-pointer 
                      hover:bg-blue-700  
                      bg-blue-600 
                      text-blue-100 
                      border duration-200 ease-in-out 
                      border-blue-600 transition
                      ">
                  Submit
                </button>
              </div>
            </div>
  
          </div>
        </section>
      </div>
  
    </form>  
    <x-footer/>
@endsection