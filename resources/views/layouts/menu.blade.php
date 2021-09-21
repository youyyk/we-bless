<div>
    <ul class="flex border-b">

        <li class="-mb-px mr-1">
            <a class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold"
               href="{{route("apartments.index")}}">All AP</a>
        </li>
        <li class="mr-1">
            <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold"
               href="{{route("apartments.create")}}">Add AP</a>
        </li>
        <li class="mr-1">
            <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold"
               href="{{route("tasks.index")}}">ALL Task</a>
        </li>
        <li class="mr-1">
            <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold"
               href="{{route('tasks.create')}}">Add Task</a>
        </li>
        <li class="mr-1">
            <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold
                        @if(\Request::routeIs('tags.*')) bg-gray-300 @endif"
               href="{{route('tags.index')}}">ALL Tag</a>
        </li>

    <!--User Menu-->
        @if(Auth::check())
            <li class="mr-1">
                <a href="#" class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold
                            @if(\Request::routeIs('tags.*')) bg-gray-300 @endif">
                    {{Auth::user()->name}}
                </a>
            </li>
            <li class="mr-1">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold
                            @if(\Request::routeIs('tags.*')) bg-gray-300 @endif">
                        LOGOUT
                    </button>
                </form>
            </li>
        @else
            <li class="mr-1">
                <a href="{{route('login')}}" class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold
                            @if(\Request::routeIs('tags.*')) bg-gray-300 @endif">
                    Login
                </a>
            </li>
            <li class="mr-1">
                <a href="{{route('register')}}" class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold
                            @if(\Request::routeIs('tags.*')) bg-gray-300 @endif">
                    Register
                </a>
            </li>
        @endif
    </ul>
</div>
