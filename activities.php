<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Activités</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen">
    <?php 
    include('ConfigDB.php');
    if (isset($_POST['submit'])) {
        $nom_activite = $_POST['nom_activite'];
        $description = $_POST['description'];
        $type_activites = $_POST['type_activite'] ?? ''; // Use correct key
        $prix = $_POST['prix'];
        $date_disponible = $_POST['date_disponible'];
        $places_disponible = $_POST['places_disponible'] ?? 0; // Provide a default value
    
        $actv = "INSERT INTO activites (nom_activite, description, type_activites, prix, date_disponible, places_disponible) 
                 VALUES ('$nom_activite', '$description', '$type_activites', '$prix', '$date_disponible', '$places_disponible')";
        $activity = mysqli_query($conn, $actv);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
        
    ?>

  <!-- Sidebar -->
  <aside class="w-64 bg-[#183E0C] text-white">
    <div class="p-4 flex items-center">
      <span class="text-xl font-bold">🔥 Voyages</span>
    </div>
    <nav class="mt-4">
      <a href="dashbord.php" class="block py-2 px-4 hover:bg-green-700 rounded-lg mt-2">Client</a>
      <a href="reservation.php" class="block py-2 px-4 hover:bg-green-700 rounded-lg mt-2">Reservation</a>
      <a href="#" class="block py-2 px-4 hover:bg-green-700 rounded-lg mt-2">Activities</a>
    </nav>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 flex flex-col">
    <!-- Header -->
    <header class="bg-white px-6 py-4 shadow-md">
      <div class="flex justify-center space-x-4">
        <button id="openModal" class="bg-[#183E0C] text-white rounded h-[30px] w-[90px]">
          Click form
        </button>
      </div>
    </header>

    <!-- Modal -->
    <div id="popupActivityyy" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center hidden">
      <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-lg relative">
        <h2 class="text-2xl font-semibold text-center text-[#183E0C] mb-6">Ajouter une Activité</h2>
        <form method="POST" class="space-y-6">
          <div>
            <label for="nom_activite" class="block text-lg font-medium text-gray-700">Nom de l'activité</label>
            <input type="text" id="nom_activite" name="nom_activite" required 
              class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
          </div>

          <div>
            <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" required 
              class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600"></textarea>
          </div>

          <div>
            <label for="type_activite" class="block text-lg font-medium text-gray-700">Type d'activité</label>
            <input type="text" id="type_activite" name="type_activite" 
              class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
          </div>

          <div>
            <label for="prix" class="block text-lg font-medium text-gray-700">Prix </label>
            <input type="number" id="prix" name="prix" step="0.01" required 
              class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
          </div>

          <div>
            <label for="date_disponible" class="block text-lg font-medium text-gray-700">Date Disponible</label>
            <input type="date" id="date_disponible" name="date_disponible" required 
              class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
          </div>

          <div>
            <label for="places_disponible" class="block text-lg font-medium text-gray-700">Places Disponibles</label>
            <input type="number" id="places_disponible" name="places_disponible" min="1" required 
              class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
          </div>

          <div class="flex justify-center">
            <button name="submit" type="submit" class="px-6 py-3 bg-[#183E0C] text-white font-semibold rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-600">
              Soumettre
            </button>
          </div>
        </form>

        <!-- Close Modal Button -->
        <button id="closeModal" class="absolute top-0 right-0 m-4 text-gray-500 hover:text-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
    </div>

    <!-- Main Section -->
    <main class="p-6">
                <h1 class="text-2xl font-bold mb-6 text-[#183E0C]"> Dashboard</h1>

               

                <!-- User Table -->
                <div class="bg-white shadow-md rounded-lg">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">Name of activity</th>
                                <th class="px-4 py-2 text-left">Description</th>
                                <th class="px-4 py-2 text-left">Type of Activity</th>
                                <th class="px-4 py-2 text-left">Price</th>
                                <th class="px-4 py-2 text-left">Date Disponible</th>
                                <th class="px-4 py-2 text-left">Places Disponible</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Repeat rows as needed -->
                            <?php 
                            $tabActv="SELECT * from activites";
                            $allactv=mysqli_query($conn,$tabActv);
                            foreach($allactv as $row){
                                $nom_activite = htmlspecialchars($row['nom_activite']);
                                $description =htmlspecialchars($row['description']);
                                $type_activites =htmlspecialchars($row['type_activites']);
                                $prix = htmlspecialchars($row['prix']);
                                $date_disponible =htmlspecialchars($row['date_disponible']);
                                $places_disponible = htmlspecialchars($row['places_disponible']);
                                echo "<tr class='border-t'>
                                <td class='px-4 py-2 flex items-center'>
                                   
                                    <div>
                                        <p>$nom_activite</p>
                                    </div>
                                </td>
                                <td class='px-4 py-2'>$description</td>
                                <td class='px-4 py-2 text-indigo-500'> $type_activites</td>
                                <td class='px-4 py-2 text-green-500 '>$prix</td>
                                <td class='px-4 py-2 text-indigo-500'> $date_disponible</td>
                                <td class='px-4 py-2 text-indigo-500'>  $places_disponible</td>
                                
                            </tr>";
                            }
                            ?>
                            <!-- Repeat as needed -->
                        </tbody>
                    </table>
                </div>
            </main>
  </div>

  <script>
    // Open the modal
    document.getElementById('openModal').addEventListener('click', function() {
      document.getElementById('popupActivityyy').classList.remove('hidden');
    });

    // Close the modal
    document.getElementById('closeModal').addEventListener('click', function() {
      document.getElementById('popupActivityyy').classList.add('hidden');
    });

    // Close modal when clicking outside the modal
    window.addEventListener('click', function(event) {
      if (event.target === document.getElementById('popupActivityyy')) {
        document.getElementById('popupActivityyy').classList.add('hidden');
      }
    });
  </script>

</body>
</html>
