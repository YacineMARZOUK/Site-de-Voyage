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
     ?>
  <?php
  if(isset($_POST['kkk'])){
    $seleClient = $_POST['seleClient'];
    $seleActivity = $_POST['seleActivity'];
    $date_reservation = $_POST['date_reservation'];
    $statut_reservation = $_POST['statut_reservation'];
    $nombre_personnes = $_POST['nombre_personnes'];
    $reserv="INSERT INTO reservation (id_client ,id_activite, date_reservation,nombre_personnes,status_reservation )
     VALUES('$seleClient','$seleActivity','$date_reservation','$nombre_personnes','$statut_reservation'); "; 
    $result=mysqli_query($conn,$reserv);
}
  ?> 

   
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#183E0C] text-white">
            <div class="p-4 flex items-center">
                <span class="text-xl font-bold">🔥 Voyages</span>
            </div>
            <nav class="mt-4">
                <a href="dashbord.php" class="block py-2 px-4 hover:bg-green-700 rounded-lg mt-2">Client</a>
                <a href="#" class="block py-2 px-4 hover:bg-green-700 rounded-lg mt-2">Reservation</a>
                <a href="activities.php" class="block py-2 px-4 hover:bg-green-700 rounded-lg mt-2">Activities</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white px-6 py-4 shadow-md">
              <div class="flex justify-center space-x-4">
                <button id="openModal" class="bg-[#183E0C] text-white rounded h-[40px] w-[150px]">
                  Click Reservation
                </button>
               </div>
            </header>
            <div id="popupReservation" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center hidden">
  <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-lg relative">
     
    <?php
      $tabCLT = "SELECT nom_client,id_client from clients ";
      $allclt = mysqli_query($conn,$tabCLT);
      ?>
    <h2 class="text-2xl font-semibold text-center text-[#183E0C] mb-6">Créer une Réservation</h2>
    <form method="POST" class="space-y-6">
      <div>
        <label for="sele" class="block text-lg font-medium text-gray-700">clients</label>
        <select name="seleClient" id="">
          <option value="" id="sele">chose </option>
          <?php 
                   $tabCLT = "SELECT nom_client,id_client from clients ";
                   $allclt = mysqli_query($conn,$tabCLT); 
                            foreach($allclt as $row){
                                $nom = htmlspecialchars($row['nom_client']);
                                $id_client = htmlspecialchars($row['id_client']);
                               

                                echo "
                                     
                                        <option value='$id_client'>$nom</option>
                                    
                                      </div>";

                            }
                           
                            ?>
                            </select>
     
      </div>

      <div>
        <label for="id_activite" class="block text-lg font-medium text-gray-700">Activité</label>
        
         <?php
         include("ConfigDB.php");
         $tabActv="SELECT 	id_activites,nom_activite from activites";
         $allactv=mysqli_query($conn,$tabActv);

         ?>
         <select name="seleActivity" id="">
           <?php 
                           
                            foreach($allactv as $row){
                                $nom_activite = htmlspecialchars($row['nom_activite']);
                                $id_activites =htmlspecialchars($row['id_activites']);
                                
                                echo "
                                     
                                        <option value='$id_activites'>$nom_activite</option>
                                    
                                      </div>";
                            }
                            ?>
          </select>
          
      </div>

      <div>
        <label for="date_reservation" class="block text-lg font-medium text-gray-700">Date de Réservation</label>
        <input type="date" id="date_reservation" name="date_reservation" required 
          class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
      </div>

      <div>
        <label for="nombre_personnes" class="block text-lg font-medium text-gray-700">Nombre de Personnes</label>
        <input type="number" id="nombre_personnes" name="nombre_personnes" min="1" required 
          class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
      </div>

      <div>
        <label for="statut_reservation" class="block text-lg font-medium text-gray-700">Statut de Réservation</label>
        <select id="statut_reservation" name="statut_reservation" 
          class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
          <option value="Confirmée" selected>Confirmée</option>
          <option value="Annulée">Annulée</option>
          <option value="attente">attente</option>
        </select>
      </div>

      <div class="flex justify-center">
        <button name="kkk" type="submit" class="px-6 py-3 bg-[#183E0C] text-white font-semibold rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-600">
          Soumettre
        </button>
      </div>
    </form>

    <!-- Close Modal Button -->
    <button id="closeModalReservation" class="absolute top-0 right-0 m-4 text-gray-500 hover:text-gray-700">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
      </svg>
    </button>
  </div>
</div>


            <!-- Dashboard Content -->
            <main class="p-6">
                <h1 class="text-2xl font-bold mb-6 text-[#183E0C]"> Dashboard</h1>
                <?php 
    $tabRes = "SELECT id_reservation, nom_client, nom_activite, date_reservation, nombre_personnes, status_reservation 
               FROM reservation
               INNER JOIN clients ON reservation.id_client = clients.id_client
               INNER JOIN activites ON reservation.id_activite = activites.id_activites";

    $result = mysqli_query($conn, $tabRes);
?>
                <!-- User Table -->
                <div class="bg-white shadow-md rounded-lg">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">id of Reservation</th>
                                <th class="px-4 py-2 text-left">id of Client</th>
                                <th class="px-4 py-2 text-left">id of ACTIVITES</th>
                                <th class="px-4 py-2 text-left">Date of registration</th>
                                <th class="px-4 py-2 text-left">Nomber of person</th>
                                <th class="px-4 py-2">status de Reservation</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
   
    while ($row = mysqli_fetch_assoc($result)) {
        $nom = htmlspecialchars($row['nom_client']);
        $email = htmlspecialchars($row['nom_activite']);
        $telephone = htmlspecialchars($row['date_reservation']);
        $date_inscription = htmlspecialchars($row['nombre_personnes']);
        $date_resserv = htmlspecialchars($row['status_reservation']);
        
        echo "<tr class='border-t'>
            <td class='px-4 py-2 flex items-center'>
                <div>
                    <p>$nom</p>
                </div>
            </td>
            <td class='px-4 py-2'>$email</td>
            <td class='px-4 py-2 text-green-500'>$telephone</td>
            <td class='px-4 py-2 text-indigo-500'>$date_inscription</td>
            <td class='px-4 py-2 text-indigo-500'>$date_resserv</td>
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
    <script>
    // Open the modal
    document.getElementById('openModal').addEventListener('click', function() {
      document.getElementById('popupReservation').classList.remove('hidden');
    });

    // Close the modal
    document.getElementById('closeModalReservation').addEventListener('click', function() {
      document.getElementById('popupReservation').classList.add('hidden');
    });

    // Close modal when clicking outside the modal
    window.addEventListener('click', function(event) {
      if (event.target === document.getElementById('popupReservation')) {
        document.getElementById('popupReservation').classList.add('hidden');
      }
    });
  </script>
    
</body>
</html>
