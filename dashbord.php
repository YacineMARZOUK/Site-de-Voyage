<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title> Voyages</title>
</head>
<body class="bg-gray-100 font-sans">
<?php 
include('ConfigDB.php');
if(isset($_POST['submit'])){
    $name = $_POST['nom_client'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $date_inscription = $_POST['date_inscription'];
    $clt="INSERT INTO clients (nom_client ,email, telephone	,date_inscription ) VALUES('$name','$email','$telephone','$date_inscription'); "; 
    $result=mysqli_query($conn,$clt);
}
    $tabCLT = "SELECT * from clients ";
    $allclt = mysqli_query($conn,$tabCLT);

?>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#183E0C] text-white">
            <div class="p-4 flex items-center">
                <span class="text-xl font-bold">🔥 Voyages</span>
            </div>
            <nav class="mt-4">
                <a href="#" class="block py-2 px-4 hover:bg-green-700 rounded-lg mt-2">Client</a>
                <a href="reservation.php" class="block py-2 px-4 hover:bg-green-700 rounded-lg mt-2">Reservation</a>
                <a href="activities.php" class="block py-2 px-4 hover:bg-green-700 rounded-lg mt-2">Activities</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class=" bg-white px-6 py-4 shadow-md">
                
                <div class="flex justify-center space-x-4">
                    <button id="openModal" class=" bg-[#183E0C] text-white rounded h-[30px] w-[90px]" >Click form</button>
                </div>
                <div id="modal" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center hidden">
  <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-center text-custom-green mb-6">Ajouter un Client</h2>
    <form  method="POST" class="space-y-6">
      
      <div>
        <label for="nom_client" class="block text-lg font-medium text-gray-700">Nom du client</label>
        <input type="text" id="nom_client" name="nom_client" required 
          class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-custom-green">
      </div>

      <div>
        <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" required 
          class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-custom-green">
      </div>

      <div>
        <label for="telephone" class="block text-lg font-medium text-gray-700">Numéro de téléphone</label>
        <input type="text" id="telephone" name="telephone" 
          class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-custom-green">
      </div>

      <div>
        <label for="date_inscription" class="block text-lg font-medium text-gray-700">Date d'inscription</label>
        <input type="date" id="date_inscription" name="date_inscription" 
          class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-custom-green">
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

<script>
  // Open the modal when the button is clicked
  document.getElementById('openModal').addEventListener('click', function() {
    document.getElementById('modal').classList.remove('hidden');
  });

  // Close the modal when the close button is clicked
  document.getElementById('closeModal').addEventListener('click', function() {
    document.getElementById('modal').classList.add('hidden');
  });

  // Close the modal when clicked outside of the modal content
  window.addEventListener('click', function(event) {
    if (event.target === document.getElementById('modal')) {
      document.getElementById('modal').classList.add('hidden');
    }
  });
</script>
            </header>

            <!-- Dashboard Content -->
            <main class="p-6">
                <h1 class="text-2xl font-bold mb-6 text-[#183E0C]"> Dashboard</h1>

               

                <!-- User Table -->
                <div class="bg-white shadow-md rounded-lg">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">Name</th>
                                <th class="px-4 py-2 text-left">Email</th>
                                <th class="px-4 py-2 text-left">Telephone</th>
                                <th class="px-4 py-2 text-left">Date of registration</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Repeat rows as needed -->
                            <?php 
                            foreach($allclt as $row){
                                $nom = htmlspecialchars($row['nom_client']);
                                $email = htmlspecialchars($row['email']);
                                $telephone = htmlspecialchars($row['telephone']);
                                $date_inscription = htmlspecialchars($row['date_inscription']);

                                echo "<tr class='border-t'>
                                <td class='px-4 py-2 flex items-center'>
                                   
                                    <div>
                                        <p>$nom </p>
                                    </div>
                                </td>
                                <td class='px-4 py-2'>$email</td>
                                <td class='px-4 py-2 text-green-500'> $telephone</td>
                                <td class='px-4 py-2 text-indigo-500 '>$date_inscription</td>
                                
                            </tr>";

                            }
                           
                            ?>
                            <!-- Repeat as needed -->
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
