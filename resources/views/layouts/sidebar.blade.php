<div class="col-12  col-lg-3 col-xl-2  vh-100 sidebar ">
    <div class="d-flex align-items-center justify-content-between my-2 nav-top">
        <div class="text-center">
{{--            <span class="btn btn-primary"><i class="feather-shopping-bag" style="font-size: 35px;"></i></span>--}}
{{--            <span class="h3 text-primary text-uppercase mb-0 ms-1">My Shop</span>--}}
            <img src="{{ asset(\App\Base::$logo) }}" alt="" class="w-50" style="filter: drop-shadow(5px 5px 5px #00000020)">
        </div>
        <button class="btn btn-light my-2 p-0 float-end d-block d-lg-none" id="hide-sidebar-btn"> <i
                class="feather-x text-danger" style="font-size:45px;"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul>

            <x-menu-item link="{{ route('home') }}" class="fa-solid fa-home" menu="Dashboard" ></x-menu-item>
            <x-menu-title></x-menu-title>
            <x-menu-item  class="fa-solid fa-circle-plus" menu="Add List" ></x-menu-item>
            <x-menu-item  class="fa-solid fa-list" menu="Item List" counter="5" ></x-menu-item>
            <x-menu-spacer></x-menu-spacer>
            <x-menu-title title="Article Manager"></x-menu-title>
            <x-menu-item  class="fa-solid fa-plus-circle" menu="Add Article" link="{{ route('article.create') }}"></x-menu-item>
            <x-menu-item  class="fa-solid fa-list" menu="Article list" link="{{ route('article.index') }}"></x-menu-item>

            <x-menu-item  class="fa-solid fa-layer-group" menu="Category Manager" link="{{ route('category.index') }}"></x-menu-item>
            <x-menu-spacer></x-menu-spacer>
            <x-menu-title title="User Profile"></x-menu-title>
            <x-menu-item  class="fa-solid fa-circle-user" menu="Your Profile"  link="{{ route('profile.profilePhoto') }}" ></x-menu-item>
            <x-menu-item  class="fa-solid fa-photo-film" menu="Update Photo"  link="{{ route('profile.photo.edit') }}" ></x-menu-item>
            <x-menu-item  class="fa-solid fa-key" menu="Change Password"  link="{{ route('profile.changePassword') }}" ></x-menu-item>
            <x-menu-item  class="fa-solid fa-message" menu="Change Name"  link="{{ route('profile.changeName') }}" ></x-menu-item>
            <x-menu-item  class="fa-solid fa-mail-bulk" menu="Change Email"  link="{{ route('profile.changeEmail') }}" ></x-menu-item>
            <li class="menu-item text-center">
                <a href="{{ route('logout') }}" class="menu-item-link bg-danger rounded text-white"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    <span><i class=" feather-power me-1 fa-fw "></i>Logout</span>
                </a>
            </li>
            </li>
        </ul>
    </div>
</div>
