<nav {{ $attributes->merge(['class' => 'breadcrumb-one']) }} aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg></a>
        </li>
        <li class="breadcrumb-item text-capitalize">
            <a href="javascript:void(0);">{{ Request::segment(1) }}</a>
        </li>
        @if (Request::segment(2))
            <li class="breadcrumb-item text-capitalize"><a href="javascript:void(0);">{{ Request::segment(2) }}</a>
            </li>
        @endif
    </ol>
</nav>
