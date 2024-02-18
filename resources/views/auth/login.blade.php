<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .leftSection {
            background-image: linear-gradient(#5E50A190, #5E50A1), url("/image/login-bg.jpg");
            background-size: cover;
            background-position: 100% 0;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <div class="flex min-h-screen">
        <div class="w-1/2 leftSection h-screen sticky top-0 flex justify-center items-center relative">
            <h1 class="text-[44px] leading-[70px] text-white w-[456px]">Temukan developer berbakat & terbaik di berbagai
                bidang keahlian
            </h1>

            <img src="{{ url('/image/logo.svg') }}" class="absolute top-[20px] left-[20px] h-[30px]" alt="">
        </div>
        <div class="w-1/2 px-[70px] py-[20px] bg-[#F6F7F8] flex justify-center flex-col">
            <h1 class="text-[32px] font-bold mb-[16px]">Halo, Pewpeople</h1>
            <p class="text-[#46505C] text-[18px] mb-[50px]">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In
                euismod
                ipsum et dui
                rhoncus auctor.</p>

            <form action="{{ route('actionLogin') }}" method="POST" class="flex flex-col">
                @csrf

                <label for="email">Email</label>
                <input type="email" id="email" name="email"
                    class="rounded-md border h-[50px] px-[10px] @error('email')border-red-500 mb-[0px]@enderror @if ($errors->isEmpty()) mb-[30px] @endif
                    "
                    placeholder="Masukan alamat email" value="{{ old('email') }}" />
                @error('email')
                    <p class="text-red-500 mb-[30px]"> {{ $message }}</p>
                @enderror

                <label for="password">Kata sandi</label>
                <input type="password" id="password" name="password"
                    class="rounded-md border h-[50px] px-[10px] @error('email') border-red-500 @enderror"
                    placeholder="Masukan kata sandi" />
                @error('password')
                    <p class="text-red-500"> {{ $message }}</p>
                @enderror

                <button type="submit"
                    class="h-[50px] bg-[#FBB017] mt-[50px] text-white text-2xl font-bold rounded-md">Masuk</button>
            </form>

            <p class="text-center mt-[28px] text-[#1F2A36]">
                Anda belum punya akun? <a href="" class="text-[#FBB017] font-bold">Daftar disini</a>
            </p>
        </div>
    </div>
</body>

</html>
