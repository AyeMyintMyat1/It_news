<div class="row header mb-3">
    <div class="col-12  py-md-2">
        <div class="p-0 p-md-2 bg-primary rounded d-flex justify-content-between align-items-center">
            <button class="btn btn-primary  p-1 d-block d-lg-none" id="show-sidebar-btn"><i
                    class="feather-menu text-white" style="font-size:45px;"></i>
            </button>
            <form action="" method="post" class="d-none d-md-block">
                <div class="d-flex">
                    <input type="text" class="form-control w-100 me-2" placeholder="Everything Seach">
                    <button class="btn btn-light"><i class="feather-search text-primary"></i></button>
                </div>
            </form>
            <div class="dropdown me-2 me-md-0">
                <button class="btn btn-light " type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('small/'.Auth::user()->photo) }}" alt="" class="user-img me-2 shadow-sm img">
                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                </ul>

            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="feather-power text-danger me-1" style="font-size: 22px;"></i>
                        {{ __('Logout') }}
                    </a>
                </li>


            </form>
        </div>
    </div>
</div>
