<nav
    class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4"
    >
    <div
    class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4"
    >
    <a
        class="text-white text-sm uppercase hidden lg:inline-block font-semibold"
        href="/dashboard"
        >{{ $message }}</a
    >
    <form
        class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3"
        method="get" 
        action="{{ route('search') }}"
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
                @if (Auth::user()->profile_pic)
                    src="{{ asset('images/upload/' . Auth::user()->profile_pic ) }}"
                @else
                    src="{{ asset('images/upload/no-pic.png') }}"
                @endif
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