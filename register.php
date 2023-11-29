
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <style>
        .testimony::-webkit-scrollbar {
            display: none;
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
</head>
<body style="font-family: 'Poppins', sans-serif;">
    <div class="lg:flex">
        <div class="lg:w-full xl:max-w-screen-sm">
            <div class="py-8 lg:py-12 bg-gray-100 lg:bg-white flex flex-col lg:flex-row lg:justify-between lg:px-12">
                <div class="cursor-pointer flex items-center justify-center lg:justify-start lg:ml-20 mr-[-15px] lg:mt-10">
                    <div class="flex items-center justify-between">
                        <h1 class="font-bold text-4xl lg:text-6xl text-gray-900 -mb-10 lg:ml-10">REGISTER</h1>           
                    </div>
                </div>
            </div>
            
            <div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl">
                <div class="mt-12">
                    <form>
                        <div>
                            <div class="text-sm  text-gray-700 tracking-wide">Email Address</div>
                            <input class="w-full mt-2 text-lg py-4 border border-gray-300 focus:outline-none focus:border-gray-500 rounded-lg" type="">
                        </div>
                        <div class="mt-8">
                            <div class="flex justify-between items-center">
                                <div class="text-sm  text-gray-700 tracking-wide">
                                    Password
                                </div>
                            </div>
                            <input class="w-full mt-2 text-lg py-4 border border-gray-300 focus:outline-none focus:border-gray-500 rounded-lg" type="">
                        </div>
                        <div class="mt-8">
                            <div class="flex justify-between items-center">
                                <div class="text-sm  text-gray-700 tracking-wide">
                                    Confirm Password
                                </div>
                            </div>
                            <input class="w-full mt-2 text-lg py-4 border border-gray-300 focus:outline-none focus:border-gray-500 rounded-lg" type="">
                        </div>
                        <div class="mt-10">
                            <a href="admin.php" class="bg-gray-400 text-gray-100 p-4 w-full rounded-lg tracking-wide
                            font-semibold font-display block focus:outline-none focus:shadow-outline hover:bg-gray-500
                            shadow-lg text-center text-lg">
                            Sign Up
                            </a>
                        </div>
                    </form>
                    <div class="mt-12 text-sm font-display text-gray-500 text-center mb-20">
                        Already have an account? <a class="cursor-pointer text-gray-600 hover:text-gray-800" onclick="redirectToLogin()">Login here</a>
                    </div>
                </div>
            </div>
            <div class="text-sm font-display text-gray-500 text-center mt-20">© 2023 Ndev. All rights reserved</div>
        </div>
        <div class="hidden lg:flex items-center justify-center bg-gray-400 flex-1 h-screen">
        </div>
    </div>

    <script>
    function redirectToLogin() {
        // Redirect to login.php
        window.location.href = "login.php";
    }
</script>
</body>
</html>