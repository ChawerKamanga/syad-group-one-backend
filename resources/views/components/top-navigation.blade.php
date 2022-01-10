<header>
    <!-- Navigation -->
    <nav class="flex items-center justify-between flex-wrap bg-blue-600 p-6">
        <div class="container mx-auto flex">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/must-logo.png') }}" width="40px" height="40px" alt="must-logo">
            </a>
            
        </div>
        <div class="block lg:hidden">
            <button
            class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
            </button>
        </div>
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
            </div>
            <div class="text-gray-300">
            <a href="{{ route('home') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                Home
            </a>
            <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                About
            </a>
            <a href="{{ route('home') }}#contact-us" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                Contact Us
            </a>
            @auth
            <a href="{{ route('dashboard') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                Dashboard
            </a>

            <form action="{{ route('logout') }}" method="post" class="inline">
                @csrf
                <button type="submit" class="inline-block text-md p-4 leading-none border rounded-lg text-white border-white hover:border-transparent hover:text-blue-600 hover:bg-white mt-4 lg:mt-0">
                 Logout
                </button>
             </form>
            @endauth
            @guest
            <a href="{{ route('login') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                Login
            </a>
            <a href="{{ route('application') }}"
                class="inline-block text-md p-4 leading-none border rounded-lg text-white border-white hover:border-transparent hover:text-blue-600 hover:bg-white mt-4 lg:mt-0">
                Apply Now
            </a>
            @endguest
            </div>
        </div>
        </div>
    </nav>
</header>
