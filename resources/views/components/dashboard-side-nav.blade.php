<nav
    class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6"
    >
        <div
          class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto"
        >
          <button
            class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
            type="button"
            onclick="toggleNavbar('example-collapse-sidebar')"
          >
            <i class="fas fa-bars"></i></button
          >
          <a
            class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
            href="{{ route('home') }}"
          >
            Hostel Accomodation System
          </a>
          <ul class="md:hidden items-center flex flex-wrap list-none">
            <li class="inline-block relative">
              <a
                class="text-gray-600 block py-1 px-3"
                href="#pablo"
                onclick="openDropdown(event,'notification-dropdown')"
                ><i class="fas fa-bell"></i
              ></a>
              <div
                class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                style="min-width: 12rem;"
                id="notification-dropdown"
              >
                <a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-800"
                  >Action</a
                ><a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-800"
                  >Another action</a
                ><a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-800"
                  >Something else here</a
                >
                <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                <a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-800"
                  >Seprated link</a
                >
              </div>
            </li>
            <li class="inline-block relative">
              <a
                class="text-gray-600 block"
                href="#pablo"
                onclick="openDropdown(event,'user-responsive-dropdown')"
                ><div class="items-center flex">
                  <span
                    class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"
                    ><img
                      alt="..."
                      class="w-full rounded-full align-middle border-none shadow-lg"
                      src="./assets/img/img.jpg"
                  /></span></div
              ></a>
              <div
                class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                style="min-width: 12rem;"
                id="user-responsive-dropdown"
              >
                <a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-800"
                  >Action</a
                ><a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-800"
                  >Another action</a
                ><a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-800"
                  >Something else here</a
                >
                <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                <a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-800"
                  >Seprated link</a
                >
              </div>
            </li>
          </ul>
          <div
            class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
            id="example-collapse-sidebar"
          >
            <div
              class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200"
            >
              <div class="flex flex-wrap">
                <div class="w-6/12">
                  <a
                    class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                    href="javascript:void(0)"
                  >
                    Online Hostel Application System
                  </a>
                </div>
                <div class="w-6/12 flex justify-end">
                  <button
                    type="button"
                    class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                    onclick="toggleNavbar('example-collapse-sidebar')"
                  >
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </div>
            <form class="mt-6 mb-4 md:hidden">
              <div class="mb-3 pt-0">
                <input
                  type="text"
                  placeholder="Search"
                  class="border-0 px-3 py-2 h-12 border border-solid  border-blueGray-500 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal"
                />
              </div>
            </form>
            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
              <li class="items-center">
                <a
                  class="text-gray-800 hover:text-gray-600 text-xs uppercase py-3 font-bold block"
                  href="{{ route('dashboard') }}"
                  ><i class="fas fa-tv text-gray-500 mr-2 text-sm"></i>
                  Dashboard</a
                >
              </li>
             
              @can('viewAny', Auth::user())
                <li class="items-center">
                  <a
                    class="text-gray-800 hover:text-gray-600 text-xs uppercase py-3 font-bold block"
                    href="{{ route('new-applicants') }}"
                    ><i class="fas fa-newspaper text-gray-500 mr-2 text-sm"></i>
                    New Applicants</a
                  >
                </li>
                <li class="items-center">
                  <a
                    class="text-gray-800 hover:text-gray-600 text-xs uppercase py-3 font-bold block"
                    href="{{ route('allocated-students') }}" 
                    ><i class="fas fa-signature text-gray-500 mr-2 text-sm"></i>
                    Allocated Students</a
                  >
                </li>
                <li class="items-center">
                  <a
                    class="text-gray-800 hover:text-gray-600  text-xs uppercase py-3 font-bold block"
                    href="{{ route('halls.index') }}"
                    ><i class="fas fa-building text-gray-500 mr-2 text-sm"></i>
                    Halls</a
                  >
                </li>
                <li class="items-center">
                  <a
                    class="text-gray-800 hover:text-gray-600  text-xs uppercase py-3 font-bold block"
                    href="{{ route('rooms.index') }}"
                    ><i class="fas fa-bed text-gray-500 mr-2 text-sm"></i>
                    Rooms</a
                  >
                </li>
              @endcan
              @can('isAdmin', Auth::user())
                <li class="items-center">
                  <a
                    class="text-gray-800 hover:text-gray-600 text-xs uppercase py-3 font-bold block"
                    href="{{ route('admin.editprofile', Auth::user()) }}"
                    ><i class="fas fa-user-circle text-gray-500 mr-2 text-sm"></i>
                    Edit Profile</a
                  >
                </li>

                <li class="items-center">
                  <a
                    class="text-gray-800 hover:text-gray-600 text-xs uppercase py-3 font-bold block"
                    href="{{ route('roles.index') }}"
                    ><i class="fas fa-database text-gray-500 mr-2 text-sm"></i>
                    Roles</a
                  >
                </li>
                <li class="items-center">
                  <a
                    class="text-gray-800 hover:text-gray-600 text-xs uppercase py-3 font-bold block"
                    href="{{ route('admin.index') }}"
                    >
                    <i class="fas fa-user-shield text-gray-500 mr-2 text-sm"></i>
                    Admins</a
                  >
                </li>
                <li class="inline-flex">
                  <a
                    class="text-gray-800 hover:text-gray-600 text-sm block mb-4 no-underline font-semibold"
                    href="{{ route('programs.index') }}"
                    >
                    <i class="fas fa-briefcase mr-2 text-gray-500 text-base"></i>
                    Programs</a
                  >
                </li>
                  <li class="inline-flex">
                    <a
                      class="text-gray-800 hover:text-gray-600 text-sm block mb-4 no-underline font-semibold"
                      href="{{ route('contactus.index') }}"
                      >
                      <i class="fas fa-id-card-alt mr-2 text-gray-500 text-base"></i>
                      Contact Us</a
                    >
                </li>
              @elsecan('isStudent', Auth::user())
                <li class="items-center">
                  <a
                    class="text-gray-800 hover:text-gray-600 text-xs uppercase py-3 font-bold block"
                    href="{{ route('users.edit', Auth::user()) }}"
                    ><i class="fas fa-user-circle text-gray-500 mr-2 text-sm"></i>
                    Edit Profile</a
                  >
                </li>
              @endcan
              <li class="items-center">
                <a
                  class="text-gray-800 hover:text-gray-600 text-xs uppercase py-3 font-bold block"
                  href="{{ route('home') }}"
                  >
                  <i class="far fa-paper-plane text-gray-500 mr-2 text-sm"></i>
                  Landing Page</a
                >
              </li>
              @can('viewAny', Auth::user())
              <li class="items-center">
                <a
                class="text-gray-800 text-xs uppercase py-3 font-bold block"
                href="{{ route('admin.register') }}"
                ><i
                class="fas fa-clipboard-list text-gray-500 mr-2 text-sm"
                ></i>
                Register (Admin)</a
                >
              </li>
              @endcan
              
              <li class="items-center">
                <form action="{{ route('logout') }}" method="post" class="inline">
                  @csrf
                  <button type="submit">
                    <i class="fas fa-fingerprint text-gray-500 mr-2 text-sm"></i> 
                    <span class="text-gray-800 hover:text-gray-600 text-xs uppercase font-bold py-3">Logout</span>
                  </button>
                </form>
              </li>
            </ul>
            <hr class="my-4 md:min-w-full" />
            <h6
            class="md:min-w-full text-gray-600 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
            >
            Maintenance Actions
          </h6>
            <ul
            class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4"
            >
          
            {{-- Maintenance --}}
            <li class="items-center">
              <a
                class="text-gray-800 hover:text-gray-600 text-xs uppercase py-3 font-bold block"
                href="{{ route('maintenance.index') }}"
                >
                <i class="fas fa-tools text-gray-500 mr-2 text-sm"></i>
                Maintenance</a
              >
            </li>

            @can('viewAny', Auth::user())
              <li class="items-center">
                <a
                  class="text-gray-800 hover:text-gray-600 text-xs uppercase py-3 font-bold block"
                  href="{{ route('fault.reports') }}"
                  >
                  <i class="fas fa-file-alt text-gray-500 mr-2 text-sm"></i>
                  Reported Faults
                </a>
              </li>
                
              </ul>
            @endcan
          </div>
    </div>
</nav>