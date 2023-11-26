        <?php
        include 'db.php';
        include 'nav.php';
        include 'footer.php';

        // Function to sanitize input data
        function sanitize($data)
        {
            global $mysqli;
            return mysqli_real_escape_string($mysqli, htmlspecialchars(trim($data)));
        }

        // UPDATE: Edit an existing book
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
            $id = sanitize($_POST['edit']);
            $kategori = sanitize($_POST['kategori']);
            $harga = (int)sanitize($_POST['harga']);
            $stok = (int)sanitize($_POST['stok']);
            $penerbit = sanitize($_POST['penerbit']);
            $nama_buku = sanitize($_POST['nama_buku']);

            $updateQuery = "UPDATE buku SET kategori='$kategori', harga=$harga, stok=$stok, penerbit='$penerbit', nama_buku='$nama_buku' WHERE id_buku='$id'";
            mysqli_query($mysqli, $updateQuery);
        }

        // Add Book: Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_buku'])) {
            // Retrieve data from the form
            $id = sanitize($_POST['id_buku']);
            $kategori = sanitize($_POST['kategori']);
            $harga = (int)sanitize($_POST['harga']);
            $stok = (int)sanitize($_POST['stok']);
            $penerbit = sanitize($_POST['penerbit']);
            $nama_buku = sanitize($_POST['nama_buku']);

            // Construct the query to insert a new book
            $insertQuery = "INSERT INTO buku (id_buku, kategori, harga, stok, penerbit, nama_buku) VALUES ('$id', '$kategori', $harga, $stok, '$penerbit', '$nama_buku')";

            // Execute the query to add the new book to the database
            mysqli_query($mysqli, $insertQuery);
        }

        // Retrieve all books
        $result = mysqli_query($mysqli, "SELECT * FROM buku");
        mysqli_close($mysqli);
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
            <title>Admin-Bookstore</title>
            <script src="https://cdn.tailwindcss.com"></script>
        </head>

        <body style="font-family: 'Poppins', sans-serif;" class="font-sans bg-gray-100 p-4">
            <div class="container mx-auto">
                <h1 class="text-6xl font-bold mt-10 mb-10 text-center text-red-900">Admin - Books</h1>

                <!-- Display Books -->
                <table class="table-auto w-75% mx-auto mt-10">
                    <!-- Your table header goes here -->
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-xl">ID</th>
                            <th class="px-4 py-2 text-left text-xl">Category</th>
                            <th class="px-4 py-2 text-left text-xl">Price</th>
                            <th class="px-4 py-2 text-left text-xl">Stock</th>
                            <th class="px-4 py-2 text-left text-xl">Publisher</th>
                            <th class="px-4 py-2 text-left text-xl">Book Name</th>
                            <th class="px-4 py-2 text-left text-xl">Actions</th>
                        </tr>

                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='border px-4 py-2 text-left'>{$row['id_buku']}</td>";
                            echo "<td class='border px-4 py-2 text-left'>{$row['kategori']}</td>";
                            echo "<td class='border px-4 py-2 text-left'>{$row['harga']}</td>";
                            echo "<td class='border px-4 py-2 text-left'>{$row['stok']}</td>";
                            echo "<td class='border px-4 py-2 text-left'>{$row['penerbit']}</td>";
                            echo "<td class='border px-4 py-2 text-left'>{$row['nama_buku']}</td>";
                            echo "<td class='border px-4 py-2'>";
                            echo "<button onclick='editBook(\"{$row['id_buku']}\", \"{$row['kategori']}\", {$row['harga']}, {$row['stok']}, \"{$row['penerbit']}\", \"{$row['nama_buku']}\")' class='bg-yellow-500 text-white px-4 py-2 rounded-lg mr-2'>Edit</button>";
                            echo "<button onclick='deleteBook(\"{$row['id_buku']}\")' class='bg-red-500 text-white px-4 py-2 rounded-lg'>Delete</button>";
                            echo "</td>";
                        }
                        ?>
                    </thead>
                </table>

                <div class="ml-60 mt-2">
            <button onclick="openAddModal()"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Add
                Book</button>
        </div>

                <!-- Add Book Modal -->
                <div id="addModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                            aria-hidden="true">&#8203;</span>
                        <div
                            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-gray-200 px-4 py-3 sm:px-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Add Book</h3>
                            </div>
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <form id="addForm" method="post">
                                    <!-- Example: -->
                                    <div class="mb-4">
                                        <label for="addIdBuku"
                                            class="block text-sm font-medium text-gray-700">ID</label>
                                        <input type="text" name="id_buku" id="addID"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="addPenerbit"
                                            class="block text-sm font-medium text-gray-700">Publisher</label>
                                        <input type="text" name="penerbit" id="addPenerbit"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="addNamaBuku" class="block text-sm font-medium text-gray-700">Book
                                            Name</label>
                                        <input type="text" name="nama_buku" id="addNamaBuku"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="addKategori"
                                            class="block text-sm font-medium text-gray-700">Category</label>
                                        <input type="text" name="kategori" id="addKategori"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="addHarga"
                                            class="block text-sm font-medium text-gray-700">Price</label>
                                        <input type="number" name="harga" id="addHarga"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="addStok"
                                            class="block text-sm font-medium text-gray-700">Stock</label>
                                        <input type="number" name="stok" id="addStok"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                    </div>
                                    <!-- Add more input fields as needed -->
                                    <div class="flex items-center justify-end mt-4">
                                        <button type="button" onclick="closeAddModal()"
                                            class="bg-white text-gray-700 px-4 py-2 border border-gray-300 rounded-md shadow-sm">Cancel</button>
                                        <button type="submit"
                                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Add
                                            Book</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Book Modal -->
            <div id="editModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <div class="bg-gray-200 px-4 py-3 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Book</h3>
                        </div>
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <!-- Your form for editing a book goes here -->
                            <form id="editForm" method="post">
                                <!-- Example: -->
                                <input type="hidden" name="edit" id="editId">
                                <div class="mb-4">
                                    <label for="editPenerbit"
                                        class="block text-sm font-medium text-gray-700">Publisher</label>
                                    <input type="text" name="penerbit" id="editPenerbit"
                                        class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                </div>
                                <div class="mb-4">
                                    <label for="editNamaBuku" class="block text-sm font-medium text-gray-700">Book
                                        Name</label>
                                    <input type="text" name="nama_buku" id="editNamaBuku"
                                        class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                </div>
                                <div class="mb-4">
                                    <label for="editKategori"
                                        class="block text-sm font-medium text-gray-700">Category</label>
                                    <input type="text" name="kategori" id="editKategori"
                                        class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                </div>
                                <div class="mb-4">
                                    <label for="editHarga" class="block text-sm font-medium text-gray-700">Price</label>
                                    <input type="number" name="harga" id="editHarga"
                                        class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                </div>
                                <div class="mb-4">
                                    <label for="editStok" class="block text-sm font-medium text-gray-700">Stock</label>
                                    <input type="number" name="stok" id="editStok"
                                        class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                </div>
                                <!-- Add more input fields as needed -->
                                <div class="flex items-center justify-end mt-4">
                                    <button type="button" onclick="closeEditModal()"
                                        class="bg-white text-gray-700 px-4 py-2 border border-gray-300 rounded-md shadow-sm">Cancel</button>
                                    <button type="submit"
                                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save
                                        Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function editBook(id, kategori, harga, stok, penerbit, nama_buku) {
                    // Populate the modal form with the selected book's data
                    document.getElementById('editId').value = id;
                    document.getElementById('editKategori').value = kategori;
                    document.getElementById('editHarga').value = harga;
                    document.getElementById('editStok').value = stok;
                    document.getElementById('editPenerbit').value = penerbit; // Ensure correct IDs are used
                    document.getElementById('editNamaBuku').value = nama_buku;

                    // Show the modal
                    document.getElementById('editModal').classList.remove('hidden');
                }

                function closeEditModal() {
                    // Close the modal
                    document.getElementById('editModal').classList.add('hidden');
                }

                function openAddModal() {
                    // Clear the add book form
                    document.getElementById('addForm').reset();

                    // Show the add book modal
                    document.getElementById('addModal').classList.remove('hidden');
                }

                function closeAddModal() {
                    // Close the add book modal
                    document.getElementById('addModal').classList.add('hidden');
                }

                function deleteBook(id) {
                    var confirmDelete = confirm("Are you sure you want to delete this book?");
                    if (confirmDelete) {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
                            if (this.readyState == 4) {
                                if (this.status == 200) {
                                    // Reload the page or update the book list after successful deletion
                                    location.reload();
                                } else {
                                    alert("Error deleting the book. Please try again.");
                                }
                            }
                        };
                        xmlhttp.open("GET", "delete_book.php?id=" + id, true);
                        xmlhttp.send();
                    }
                }
            </script>
        </body>

        </html>