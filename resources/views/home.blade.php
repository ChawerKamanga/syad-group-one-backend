@extends('layouts.app')

@section('content')
  <x-top-navigation/>

  <!-- Hero -->
  <section class="bg-gray-300 text-gray-800 py-36">
    <div class="mx-auto p-4">
    <div class="sm:w-full lg:w-full flex justify-center">
        <div class="py-4 lg:w-6/12">
        <h1 class="text-4xl text-center font-bold uppercase">Online Hostel Accomodation System</h1>
        <p class="mb-4 mt-4 text-center">A system that allocates students online at MUST and other universities.
          You can get in touch with the system by using the below button to apply now.
        </p>
        </div>
    </div>
    </div>
</section>

  <section class="mx-auto p-4 lg:w-6/12 text-gray-700">
    <div class="flex justify-center" style="flex-direction: column;">
      <div class="text-center flex justify-center">
        <img src="{{ asset('img/mockuper_.png') }}" class="lg:w-10/12" alt="image mockup">
      </div>
      <div class="flex justify-center py-4">
        @guest
        <a
          href="{{ route('application') }}"
          class="bg-blue-600 hover:bg-white hover:border hover:border-gray-600  hover:text-gray-600  text-white  p-4 text-lg rounded">
          Apply for Accomodation Now
        </a>
        @endguest
      </div>
    </div>
  </section>

  <section>
    <!-- First Row -->
    <div class="mx-auto  flex justify-center mt-20">
      <div class="container flex flex-col lg:flex-row items-center justify-center">
        <div class="flex justify-center z-10 mb-10 lg:mb-0">
          <div class="max-w-xl py-4 px-8 bg-gray-300 shadow-lg rounded">
            <div class="flex justify-center md:justify-end -mt-16">
              <img class="w-20 h-20 object-cover rounded-full" src="{{ asset('img/stopwatch.png') }}">
            </div>
            <div class="pb-6">
              <h2 class="text-gray-800 text-3xl font-semibold">Fast Load Time</h2>
              <p class="mt-2 text-gray-600">The system loads very fast. It responds to every request just in a few seconds.</p>
            </div>
          </div>
        </div>
  
        <div class="flex flex-1 justify-center z-10 mb-10 lg:mb-0">
          <div class="max-w-xl py-4 px-8 bg-gray-300 shadow-lg rounded">
            <div class="flex justify-center md:justify-end -mt-16">
              <img class="w-20 h-20 object-cover rounded-full" src="{{ asset('img/settings.png') }}">
            </div>
            <div class="pb-6">
              <h2 class="text-gray-800 text-3xl font-semibold">User Friendly</h2>
              <p class="mt-2 text-gray-600">It has a nice and interesting user interface 
                that gives the user the desire to use it. Most of its buttons and icons are 
                self explanatory giving good experience to the user when using it.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Second Row -->
    <div class="mx-auto  flex justify-center mt-20">
      <div class="container flex flex-col lg:flex-row items-center justify-center">
        <div class="flex justify-center z-10 mb-10 lg:mb-0">
          <div class="max-w-xl py-4 px-8 bg-gray-300 shadow-lg rounded">
            <div class="flex justify-center md:justify-end -mt-16">
              <img class="w-20 h-20 object-cover rounded-full" src="{{ asset('img/smartphone.png') }}">
            </div>
            <div class="pb-6">
              <h2 class="text-gray-800 text-3xl font-semibold">Mobile Responsive</h2>
              <p class="mt-2 text-gray-600">The system is able to detect the phone screen size and display appropiate UI. It 
                also it has the same good performance even when it is being used in mobile phones.</p>
            </div>
          </div>
        </div>
  
        <div class="flex flex-1 justify-center z-10 mb-10 lg:mb-0">
          <div class="max-w-xl py-4 px-8 bg-gray-300 shadow-lg rounded">
            <div class="flex justify-center md:justify-end -mt-16">
              <img class="w-20 h-20 object-cover rounded-full" src="{{ asset('img/student.png') }}">
            </div>
            <div class="pb-6">
              <h2 class="text-gray-800 text-3xl font-semibold">Built by Students</h2>
              <p class="mt-2 text-gray-600">The developers are the students who have the full knowledge about the requirements 
                and needs of their fellow students. Hence the best system that meets what the users want.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="mx-auto  flex justify-center flex-col mt-20 text-gray-700 w-9/12">
      <div class="text-center flex-1">
        <h1 class="text-3xl font-bold">Mobile Responsive</h1>
        <p>Some of the pictures that display how it looks on the mobile phones, tablets and other gadgets when it is being used.</p>
      </div>
      <div class="mt-10 flex justify-center">
          <img src="{{ asset('img/mockuper_1.png') }}" alt="phone mockup" class="lg:w-4/12">
          <img src="{{ asset('img/mockuper_2.png') }}" class="lg:w-4/12" alt="image mockup">
          <img src="{{ asset('img/mockuper_phone.png') }}" alt="phone mockup" class="lg:w-4/12">
      </div>
      <div class="mt-10 flex justify-center">
        <img src="{{ asset('img/mockuper_ipad.png') }}" alt="phone mockup" class="lg:w-5/12">
        <img src="{{ asset('img/mockuper_removebg.png') }}" alt="phone mockup" class="lg:w-5/12">

    </div>
    </div>
  </section>

  <section id="contact-us">
    <div class="mx-auto flex justify-center flex-col mt-20 text-gray-700">
      <div class="text-center flex-1">
        <h1 class="text-3xl font-bold">Contact Us</h1>
        <p>For queries please contact us by filling in the spaces below and give us your feedback about the system.</p>
      </div>
    </div>
    <!-- The form -->
    <div class="mt-10 flex justify-center container mx-auto">
      <form class="w-full my-4" method="POST" action="{{ route('contactus') }}">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
              First Name
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-4 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
              id="grid-first-name" type="text" placeholder="Your Firstname" name="firstname">
           
          </div>
          <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
              Last Name
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-4 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
              id="grid-last-name" type="text" placeholder="Your Lastname" name="lastname">
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              E-mail
            </label>
            <input class="appearance-none block w-full @error('email') border-red-500 @enderror bg-gray-200 text-gray-700 border border-gray-200 rounded py-4 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
              id="email" type="email" placeholder="Your Email..." name="email">
              @error('email')
                <p class="text-red-600 text-xs italic">{{ $message }}</p> 
              @enderror
            </div>
          </div>
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Subject
              </label>
              <input class="appearance-none block w-full @error('email') border-red-500 @enderror bg-gray-200 text-gray-700 border border-gray-200 rounded py-4 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                id="email" type="text" placeholder="Enter Your Subject.. " name="subject">
                @error('subject')
                  <p class="text-red-600 text-xs italic">{{ $message }}</p> 
                @enderror
              </div>
            </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Message
            </label>
            <textarea class=" no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" 
              id="message" name="message"></textarea>
            @error('message')
              <p class="text-red-600 text-xs italic">{{ $message }}</p> 
            @enderror
          </div>
        </div>
        <div class="md:flex md:items-center">
          <div class="md:w-1/3">
            <button class="shadow bg-blue-600 hover:bg-blue-700 focus:shadow-outline focus:outline-none text-white font-bold py-3 px-4 rounded" 
              type="submit">
              Send Feedback
            </button>
          </div>
          <div class="md:w-2/3"></div>
        </div>
      </form>
    </div>
  </section>

  <x-footer/>
@endsection