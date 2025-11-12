 
 
 <!DOCTYPE html>
 <html lang="id">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Portal Berita Sederhana</title>
     @vite('resources/css/app.css')
 </head>

 <body class="bg-gray-100 text-gray-800">
     <nav class="bg-white shadow-md p-4 mb-6">
         <div class="container mx-auto">
             <a href="{{ route('news.index') }}" class="text-2xl font-bold text-blue-600">
                Portal Berita
             </a>
         </div>
     </nav>
     <main class="container mx-auto px-4">
         @yield('container')
     </main>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 </body>

 </html>