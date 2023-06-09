<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta content="Codescandy" name="author">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-M8S4MT3EYG');
    </script>

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon/Cetakno-logo.ico">


    <!-- Libs CSS -->
    <link href="libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="libs/feather-webfont/dist/feather-icons.css" rel="stylesheet">
    <link href="libs/simplebar/dist/simplebar.min.css" rel="stylesheet">


    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.min.css">
    <link href="libs/dropzone/dist/min/dropzone.min.css" rel="stylesheet">


    <title>Cetakno</title>
</head>
<body>
<form action="{{route('login')}}" method="get">
    {{ csrf_field() }}
    Halo <button type='submit' name='login' value='login'>Login</button>
</form>

@if (isset($shops))
    @php
        $counter = 0;
    @endphp
    <p>
        Ini
    <table>
        <thead>
            <tr>
                <th>Nama Toko</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shops as $shop)
                <tr>
                    <td>{{ $counter += 1 }}</td>
                    <td>{{ $shop->ID_PRODUCT }}</td>
                    <td>{{ $shop->ID_CONTAINER }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
    </p>
@endif


@if (isset($containers))
    @php
        $counter = 0;
    @endphp
    {{-- {{ $containers }} --}}
    @foreach ($containers as $container)
        <tr>
            <td>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="productOne">
                    <label class="form-check-label" for="productOne">

                    </label>
                </div>
            </td>
            {{--                           
                              <td>{{ $counter+=1 }}</td>
                              <td>{{ $container->ID_PRODUCT }}</td>
                              <td>{{ $container->ID_CONTAINER }}</td> --}}
            <td>
                {{$counter+=1}}
            </td>
            @php
                $products = $container->products->first();

if ($products) {
    
        $productName = $products->PRODUCT_NAME;
        // Lakukan operasi dengan nama produk
        
} else {
    // Handle ketika tidak ada produk terkait
}
            @endphp
            <td><a href="#" class="text-reset"> {{ $productName }} </a></td>
            {{-- @php
                $cate=$container->category
            @endphp --}}
            <td>{{ 'baba' }}</td>

            <td>
                <span class="badge bg-light-primary text-dark-primary">Active</span>
            </td>
            <td>Rp 30.000</td>
            <td>10 May 2023</td>
            <td>
                <div class="dropdown">
                    <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="feather-icon icon-more-vertical fs-5"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-trash me-3"></i>Delete</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square me-3 "></i>Edit</a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
    @endforeach
    {{ $containers->links() }}

    {{-- <ul class="pagination">
        @foreach ($containers->links() as $link)
        {{$link}}
            <li class="page-item {{ $link['active'] ? 'active' : '' }}">
                <a href="{{ $link['url'] }}" class="page-link">{{ $link['label'] }}</a>
            </li>
        @endforeach
    </ul> --}}
@endif

</body>
</html>

   