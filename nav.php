<?php
?>
<div class="bg-white p-5 flex justify-between items-center shadow-lg">
<nav class="space-x-4 ml-2">
    <a class="text-lg text-red-800 hover:text-red-900 hover:underline hover:shadow-lg" href="index.php">HOME</a>
    <a class="text-lg text-red-800 hover:text-red-900 hover:underline hover:shadow-lg" href="login.php">ADMIN</a>
    <a class="text-lg text-red-800 hover:text-red-900 hover:underline hover:shadow-lg" href="pengadaan.php">PENGADAAN</a>
</nav>


    <form action="index.php" method="GET" class="mb-4 flex max-w-md mr-2 mt-3">
        <input type="text" name="search" placeholder="Search by book name" class="p-2 border rounded-full w-full mr-2 shadow-inner shadow-md px-10">
        <button type="submit" class="bg-blue-500 text-white p-2 rounded-full px-4">Search</button>
    </form>
</div>
