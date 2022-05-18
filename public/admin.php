<?php

//koneksi ke database
//$koneksi = mysqli_connect ("localhost", "root", "", "schedule");



//if(isset($_POST['submit'])) {
   // $cari=$_POST['cari'];
   // $result = mysqli_query ($koneksi, "SELECT * FROM events INNER JOIN event_type on events.event_type_id = event_type.event_type_id  WHERE event_name
   // LIKE '$cari%'");
//}else {
//$result = mysqli_query ($koneksi, "SELECT * FROM events INNER JOIN event_type on events.event_type_id = event_type.event_type_id");
//}




function get_directus($url) {
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json'
    ]);
    $res=json_decode(curl_exec($ch),true);

    curl_close($ch);

    return $res;
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        montserrat: ["Montserrat"],
                    },
                    colors: {
                        "dark-green": "#1E3F41",
                        "light-green": "#659093",

                        "cream": "#DDB07F",
                        "cgray": "#F5F5F5",
                    }
                }
            }
        }
    </script>
    <style>
        .in-active{
            width: 80px !important;
            padding: 20px 15px !important;
            transition: .5s ease-in-out;
        }
        .in-active ul li p{
            display: none !important;
        }

        .in-active ul li a{
            padding: 15px !important;
        }

        .in-active h2,
        .in-active h4,
        .in-active .logo-incareer{
            display: none !important;
        }
        .hidden{
            display: none !important;
        }
        .sidebar{
            transition: .5s ease-in-out;
        }
    </style>

</head>
<body>
    <div class="flex items-center">
        <!-- Left side (Sidebar) -->
        <div class="bg-white w-[350px] h-screen px-8 py-6 flex flex-col justify-between sidebar in-active">
            <!-- Top nav -->
            <div class="flex flex-col gap-y-6">
                <!-- Header -->
                <div class="flex items-center space-x-4 px-2">
                   <img src="Img/icons/toggle_icons.svg" alt="toggle_dashboard" class="w-8 cursor-pointer" id="btnToggle">
                     <img class="w-[150px] logo-incareer" src="./Img/logo/logo_primary.svg" alt="Logo In Career">
                </div>

                <hr class="border-[1px] border-opacity-50 border-[#93BFC1]">

                <!-- List Menus -->
                <div>
                    <ul class="flex flex-col gap-y-1">
                        <li>
                            <a href="" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                <img class="w-5" src="./Img/icons/home_icon.svg" alt="Dashboard Icon">
                                <p class="font-semibold">Dashboard</p>
                            </a>
                        </li>
                        <li>
                            <a href="" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                <img class="w-5 bg-gray-800" src="./Img/icons/course_icon.svg" alt="Course Icon">
                                <p class="font-semibold">Courses</p>
                            </a>
                        </li>
                        <li>
                            <a href="" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                <img class="w-5" src="./Img/icons/schedule_icon.svg" alt="Schedule Icon">
                                <p class="font-semibold">Schedule</p>
                            </a>
                        </li>
                        <li>
                            <a href="" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                <img class="w-5" src="./Img/icons/attendance_icon.svg" alt="Attendance Icon">
                                <p class="font-semibold">Attendance</p>
                            </a>
                        </li>
                        <li>
                            <a href="" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                <img class="w-5" src="./Img/icons/score_icon.svg" alt="Score Icon">
                                <p class="font-semibold">Score</p>
                            </a>
                        </li>
                        <li>
                            <a href="" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                <img class="w-5" src="./Img/icons/consult_icon.svg" alt="Consult Icon">
                                <p class="font-semibold">Consult</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom nav -->
            <div>
                <ul class="flex flex-col ">
                    <li>
                        <a href="#" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                            <img class="w-5" src="./Img/icons/help_icon.svg" alt="Help Icon">
                            <p class="font-semibold">Help</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                            <img class="w-5" src="./Img/icons/logout_icon.svg" alt="Log out Icon">
                            <p class="font-semibold">Log out</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <?php $get_api = get_directus("https://q4optgct.directus.app/items/events?fields=*.*");?>
        <?php if(isset($_POST['submit'])){
            $search = $_POST['cari'];
          
            if($search != ''){
                $get_api = get_directus("https://q4optgct.directus.app/items/events?fields=*.*&filter[event_name][_contains]=$search");
            }else{
                $get_api = get_directus("https://q4optgct.directus.app/items/events?fields=*.*");
            }
        }?>

            <!-- Header / Profile -->
            <div class="bg-cgray w-full h-screen px-10 py-6 flex flex-col gap-y-6 overflow-y-scroll">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Data Jadwal Mentor</h1>

    <form class="flex items-center" method="POST" action="admin.php">
        <label for="simple-search" class="sr-only">Search</label>
            <div class="relative ">
                <div class="flex absolute inset-y-0 left-0 items-center pl-2 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-white focus:border-white block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Search" required name="cari">
            </div>
            <button type="submit" name="submit" class="p-2.5 ml-2 text-sm font-medium text-gray-400 bg-white rounded-lg border border-gray-400 focus:ring-4 focus:outline-none "><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
        </form>

    <br>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-black dark:text-black">
            <thead class="text-xs border-2 text-black uppercase bg-cream dark:bg-black dark:text-black">
                <tr>
                    <th scope="col" class="px-6 py-3">Event_id</th>
                    <th scope="col" class="px-6 py-3">Event_name</th>
                    <th scope="col" class="px-6 py-3">Event_type_name</th>
                    <th scope="col" class="px-6 py-3">Event_start</th>
                    <th scope="col" class="px-6 py-3">Event_end</th>
                    <th scope="col" class="px-6 py-3">Description</th>
                    <th scope="col" class="px-6 py-3">Batch_id</th>
                    <th scope="col" class="px-6 py-3">Modul_id</th>

                    </th>
                </tr>
            </thead>
            <body>

            <?php
            
            foreach($get_api as $value): ?>

                <?php foreach ($value as $row) : ?>
                    <!-- <?php print_r($row); ?>  -->
                    <tr class="border-2 dark:bg-black dark:border-black odd:bg-white even:bg-gray-50 odd:dark:bg-black even:dark:bg-black">
                        <td scope="row" class="px-6 py-4 font-medium text-black dark:text-black whitespace-nowrap"><?php echo $row['event_id'] ?></td>
                        <td class="px-6 py-4"><?php echo $row['event_name']?></td>
                        <td class="px-6 py-4"><?php echo $row['event_type_id']['event_type_name']?></td>
                        <td class="px-6 py-4"><?php echo $row['event_start_time']?></td>
                        <td class="px-6 py-4"><?php echo $row['event_end_time']?></td>
                        <td class="px-6 py-4"><?php echo $row['event_description']?></td>
                        <td class="px-6 py-4"><?php echo $row['batch_id']?></td>
                        <td class="px-6 py-4"><?php echo $row['modul_id']?></td>
                    </tr>             
                <?php endforeach; ?>
            <?php endforeach; ?>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script>
        let btnToggle = document.getElementById('btnToggle');
        let sidebar = document.querySelector('.sidebar');
        btnToggle.onclick = function(){
            sidebar.classList.toggle('in-active');
        }
    </script>
      </body>
</head>