<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>Event Management Sytem</title>
    </head>
    <body >
        <main>
            <a href="/" class="inline-block text-black ml-4 mb-4 mt-20"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                    <div class="flex flex-col items-center justify-center text-center" >
                        <img src="{{ asset('storage/' . $posts->picture) }}" style="" class="h-40 w-40" />

                            <h3 class="text-2xl mb-2 mt-3">{{ $posts->name }}</h3>
                                <div class="text-xl font-bold mb-4">
                                    {{ \Carbon\Carbon::parse($posts->date)->diffForHumans() }}
                                </div>
                                <div class="text-lg my-1"> <i class="fa-solid fa-location-dot"></i> 
                                     {{ $posts->venue }}
                                </div>
                                <div>
                                    <h3 class="text-3xl font-bold mb-4">
                                        Description
                                    </h3>
                                <div class="text-lg space-y-6">
                                     <p>
                                        {{ $posts->description }}
                                     </p>
                                        <a href="/login"
                                         class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">
                                         <i class="fa-solid fa-envelope"></i> Log in </a>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
