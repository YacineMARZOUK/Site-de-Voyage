<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire Activité</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .custom-green {
      background-color: #183E0C;
    }
    .custom-green-dark {
      background-color: #0F2A06;
    }
    .custom-green-light {
      background-color: #3B6E2A;
    }
  </style>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
  <!-- Modal Structure -->
  <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-center text-custom-green mb-6">Ajouter une Activité</h2>
    <form action="/submit" method="POST" class="space-y-6">
      
      <div>
        <label for="nom_activite" class="block text-lg font-medium text-gray-700">Nom de l'activité</label>
        <input type="text" id="nom_activite" name="nom_activite" required 
          class="mt-2 p-3 w-full border border-custom-green-light rounded-md focus:outline-none focus:ring-2 focus:ring-custom-green">
      </div>

      <div>
        <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
        <textarea id="description" name="description" 
          class="mt-2 p-3 w-full border border-custom-green-light rounded-md focus:outline-none focus:ring-2 focus:ring-custom-green"></textarea>
      </div>

      <div>
        <label for="type_activite" class="block text-lg font-medium text-gray-700">Type d'activité</label>
        <input type="text" id="type_activite" name="type_activite" 
          class="mt-2 p-3 w-full border border-custom-green-light rounded-md focus:outline-none focus:ring-2 focus:ring-custom-green">
      </div>

      <div>
        <label for="prix" class="block text-lg font-medium text-gray-700">Prix</label>
        <input type="number" id="prix" name="prix" required step="0.01" min="0"
          class="mt-2 p-3 w-full border border-custom-green-light rounded-md focus:outline-none focus:ring-2 focus:ring-custom-green">
      </div>

      <div>
        <label for="date_disponible" class="block text-lg font-medium text-gray-700">Date de disponibilité</label>
        <input type="date" id="date_disponible" name="date_disponible" required 
          class="mt-2 p-3 w-full border border-custom-green-light rounded-md focus:outline-none focus:ring-2 focus:ring-custom-green">
      </div>

      <div>
        <label for="places_disponibles" class="block text-lg font-medium text-gray-700">Places disponibles</label>
        <input type="number" id="places_disponibles" name="places_disponibles" required min="1"
          class="mt-2 p-3 w-full border border-custom-green-light rounded-md focus:outline-none focus:ring-2 focus:ring-custom-green">
      </div>

      <div class="flex justify-center">
        <button type="submit" class="px-6 py-3 bg-custom-green text-white font-semibold rounded-md shadow-md hover:bg-custom-green-dark focus:outline-none focus:ring-2 focus:ring-custom-green">
          Soumettre
        </button>
      </div>
    </form>
  </div>
</body>
</html>
