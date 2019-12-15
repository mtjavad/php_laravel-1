<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    @if (\Illuminate\Support\Facades\Auth::check())
        <li class="nav-item ">
            <span class="nav-link text-success" > کاربر عزیز: {{\Illuminate\Support\Facades\Auth::user()->name}}</span>
        </li>
    @else
    <a class="navbar-brand" href="#">برنامه من</a>
    @endif
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            @if (\Illuminate\Support\Facades\Auth::check())
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('book.index')}}">لیست کتاب ها</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('book.create')}}">ایجاد کتاب</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('author.index')}}">لیست نویسنده ها</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('author.create')}}">ایجاد نویسنده</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('category.index')}}">لیست دسته بندی ها</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('category.create')}}">ایجاد دسته بندی</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link  text-danger" href="{{route('logout')}}">خروج</a>
                </li>

            @else
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('book.index')}}">لیست کتاب ها</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('author.index')}}">لیست نویسنده ها</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('category.index')}}">لیست دسته بندی ها</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('login')}}">ورود</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('register')}}">ثبت نام</a>
                </li>
            @endif
        </ul>
    </div>
</nav>