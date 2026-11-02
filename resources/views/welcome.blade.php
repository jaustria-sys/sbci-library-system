<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBCI Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700;800&display=swap" rel="stylesheet">
    <style>body{font-family:'Poppins',sans-serif}</style>
</head>
<body class="bg-[#F8F7F3]">
<nav class="flex justify-between items-center px-8 py-4 bg-white shadow-sm">
    <div class="flex items-center gap-2"><div class="w-9 h-9 bg-blue-800 rounded-lg flex items-center justify-center text-white font-bold">S</div><span class="font-bold text-blue-900">SBCI LIBRARY</span></div>
    <div class="flex gap-3"><a href="/login" class="px-4 py-2 font-bold text-blue-900">Log in</a><a href="/register" class="px-5 py-2 bg-blue-800 text-white rounded-full font-bold">Register</a></div>
</nav>
<div class="max-w-7xl mx-auto px-8 py-16 grid md:grid-cols-2 gap-10 items-center">
    <div>
        <p class="text-blue-700 font-bold text-xs tracking-widest mb-3">SUBIC BAY COLLEGES INC.</p>
        <h1 class="text-6xl font-extrabold leading-[0.9] text-gray-900">Knowledge<br>at Your<br><span class="text-blue-800">Fingertips.</span></h1>
        <p class="text-gray-500 mt-5 text-lg">Modern library system for SBCI - Manage books, borrow, and explore catalog online.</p>
        <a href="/login" class="inline-block mt-8 px-8 py-4 bg-blue-800 text-white rounded-full font-bold shadow-lg">Enter Library →</a>
    </div>
    <div class="relative">
        <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=800&q=80" class="rounded-[2rem] shadow-2xl w-full h-[520px] object-cover">
        <div class="absolute -bottom-5 -left-5 bg-white p-4 rounded-2xl shadow-xl flex items-center gap-3">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-xl">📚</div>
            <div><p class="font-bold text-sm">1000+ Books Available</p><p class="text-xs text-gray-500">Ready to borrow</p></div>
        </div>
    </div>
</div>
</body>
</html>