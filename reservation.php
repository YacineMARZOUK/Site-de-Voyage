<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title> Voyages</title>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#183E0C] text-white">
            <div class="p-4 flex items-center">
                <span class="text-xl font-bold">🔥 Voyages</span>
            </div>
            <nav class="mt-4">
                <a href="#" class="block py-2 px-4 hover:bg-green-700 rounded-lg mt-2">Client</a>
                <a href="#" class="block py-2 px-4 hover:bg-green-700 rounded-lg mt-2">Reservation</a>
                <a href="#" class="block py-2 px-4 hover:bg-green-700 rounded-lg mt-2">Activities</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="flex items-center justify-between bg-white px-6 py-4 shadow-md">
                <input 
                    type="text" 
                    placeholder="Search" 
                    class="w-full max-w-xs px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <div class="flex items-center space-x-4">
                    <button class="w-8 h-8 rounded-full bg-gray-200"></button>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="p-6">
                <h1 class="text-2xl font-bold mb-6 text-[#183E0C]"> Dashboard</h1>

               

                <!-- User Table -->
                <div class="bg-white shadow-md rounded-lg">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">id of Reservation</th>
                                <th class="px-4 py-2 text-left">id</th>
                                <th class="px-4 py-2 text-left">id of ACTIVITES</th>
                                <th class="px-4 py-2 text-left">Date of registration</th>
                                <th class="px-4 py-2">status de Reservation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Repeat rows as needed -->
                            <tr class="border-t ">
                                <td class="px-4 py-2">Software Engineer</td>
                                <td class="px-4 py-2">Software Engineer</td>
                                <td class="px-4 py-2 text-green-500">0617151277</td>
                                <td class="px-4 py-2 text-indigo-500 ">29-08-2023</td>
                                <td class="px-4 py-2 text-indigo-500  flex justify-center ">confirmer</td>
                            </tr>
                            <!-- Repeat as needed -->
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
