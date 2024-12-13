<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire Client</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .custom-green {
      background-color: #183E0C;
    }
  </style>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
  <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-center text-custom-green mb-6">Ajouter un Client</h2>
    <form action="/submit" method="POST" class="space-y-6">
      
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
        <button type="submit" class="px-6 py-3 bg-custom-green text-white font-semibold rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-custom-green">
          Soumettre
        </button>
      </div>
    </form>
  </div>
</body>
</html>
