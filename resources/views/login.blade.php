<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="referrer" content="always">

        <title>Login Page</title>

        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="flex justify-center items-center h-screen bg-gray-200 px-6">
            <div class="p-6 max-w-sm w-full bg-white shadow-md rounded-md">
                <div class="flex justify-center items-center">
                    <span class="text-gray-700 font-semibold text-2xl">Dashboard</span>
                </div>

                <form class="mt-4" action="/" method="GET">
                    <label class="block">
                        <span class="text-gray-700 text-sm">Email</span>
                        <input type="email" class="form-input mt-1 block w-full rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-indigo-600 shadow-sm transition duration-200 ease-in-out focus:outline-none focus:shadow-outline px-4 py-2">
                    </label>

                    <label class="block mt-3">
                        <span class="text-gray-700 text-sm">Password</span>
                        <input type="password" class="form-input mt-1 block w-full rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-indigo-600 shadow-sm transition duration-200 ease-in-out focus:outline-none focus:shadow-outline px-4 py-2">
                    </label>

                    <div class="flex justify-between items-center mt-4">
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox text-indigo-600">
                                <span class="mx-2 text-gray-600 text-sm">Remember me</span>
                            </label>
                        </div>

                        <div>
                            <a class="block text-sm fontme text-indigo-700 hover:underline" href="#">Forgot your password?</a>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button class="py-2 px-4 text-center bg-indigo-600 rounded-md w-full text-white text-sm hover:bg-indigo-500">
                            Sign in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
