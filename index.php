<?php
include 'db.php';
include 'nav.php';
include 'footer.php';

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM buku WHERE 
            nama_buku LIKE '%$search%' OR 
            id_buku LIKE '%$search%' OR 
            penerbit LIKE '%$search%' OR 
            kategori LIKE '%$search%'";
} else {
    $query = "SELECT * FROM buku";
}
$result = mysqli_query($mysqli, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <title>Books</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body style="font-family: 'Poppins', sans-serif;" class="font-sans bg-gray-100 p-4">
    <div class="container mx-auto">
        <h1 class="text-6xl font-bold mt-10 mb-10 text-center text-red-900">Books - Home</h1>

    <!-- Display Books -->
    <table class="table-auto w-50% mx-auto mt-10">
    <thead>
        <tr>
            <th class="px-4 py-2 text-left text-xl">ID</th>
            <th class="px-4 py-2 text-left text-xl">Category</th>
            <th class="px-4 py-2 text-left text-xl">Price</th>
            <th class="px-4 py-2 text-left text-xl">Stock</th>
            <th class="px-4 py-2 text-left text-xl">Publisher</th>
            <th class="px-4 py-2 text-left text-xl">Book Name</th>
            
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td class='border px-4 py-2  text-left'>{$row['id_buku']}</td>";
            echo "<td class='border px-4 py-2 text-left'>{$row['kategori']}</td>";
            echo "<td class='border px-4 py-2  text-left'>{$row['harga']}</td>";
            echo "<td class='border px-4 py-2  text-left'>{$row['stok']}</td>";
            echo "<td class='border px-4 py-2 text-left'>{$row['penerbit']}</td>";
            echo "<td class='border px-4 py-2 text-left'>{$row['nama_buku']}</td>";
            echo "</tr>";
        }
        mysqli_close($mysqli);
?>
    </thead>
    
    </table>
</div>
</body>
</html>
