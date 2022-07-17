<?php
session_start();
// var_dump($_SESSION);
// var_dump($_COOKIE);
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
    <title>Schedule</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Jqueey -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--intro JS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/5.1.0/introjs.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/5.1.0/intro.min.js"></script>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


    <!-- CSS -->
    <!-- <link rel="stylesheet" href="./CSS/UploafField.css"> -->


    <!-- Tailwindcss -->
    <script src="https://cdn.tailwindcss.com?plugins=line-clamp"></script>
    <!-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css" /> -->
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

    <!-- CUSTOM STYLE CSS -->

    <style>
        .in-active {
            width: 80px !important;
            padding: 20px 15px !important;
            transition: .5s ease-in-out;
        }

        .in-active ul li p {
            display: none !important;
        }

        .in-active ul li a {
            padding: 15px !important;
        }

        .in-active h2,
        .in-active h4,
        .in-active .logo-incareer {
            display: none !important;
        }

        /* .hidden {
            display: none !important;
        } */

        .sidebar {
            transition: .5s ease-in-out;
        }
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>

</head>

<body>
    <div class="responsive-top p-5 sm:hidden">
        <div class="flex justify-center bg-gray-300 p-2 rounded-lg">
            lms schedule
        </div>
        <div class="container flex flex-column justify-between mt-4 mb-4">
            <img class="w-[150px] logo-lumintulogic" src="./Img/logo/logo_lumintu.png" alt="Logo Lumintu Logic">
            <img src="./Img/icons/toggle_icons.svg" alt="toggle_dashboard" class="w-8 cursor-pointer" id="btnToggle2">
        </div>
    </div>

    <div class="flex items-center">        
        <!-- Left side (Sidebar) -->
        <div class="bg-white w-[350px] h-screen px-8 py-6 sm:flex flex-col justify-between sidebar in-active hidden">
            <!-- Top nav -->
            <div class="flex flex-col gap-y-6">
                <!-- Header -->
                <div class="flex items-center space-x-4 px-2">
                    <img src="./Img/icons/toggle_icons.svg" alt="toggle_dashboard" class="w-8 cursor-pointer" id="btnToggle">
                    <img class="w-[150px] logo-lumintulogic" src="./Img/logo/logo_lumintu.png" alt="Logo Lumintu Logic">
                </div>

                <hr class="border-[1px] border-opacity-50 border-[#93BFC1]"/>

                <!-- List Menus -->
                <div>
                    <ul class="flex flex-col gap-y-1">
                        <!-- ICON DAN TEXT DASHBOARD -->    

                        <li>
                            <a href="" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                <img class="w-5" src="./Img/icons/home_icon.svg" alt="Dashboard Icon">
                                <p class="font-semibold">Beranda</p>
                            </a>
                        </li>
                        <!-- ICON DAN TEXT FORUM COURSES -->
                        <li>
                        <a href="" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                <img class="w-5" src="./Img/icons/schedule_icon.svg" alt="Schedule Icon">
                                <p class="font-semibold">Materi</p>
                            </a>
                        </li>
                        <!-- ICON DAN TEXT SCHEDULE -->
                        <li>
                        <a href="" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                <img class="w-5 bg-gray-800" src="./Img/icons/course_icon.svg" alt="Course Icon">
                                <p class="font-semibold">Penugasan</p>
                            </a>
                        </li>
                        <!-- ICON DAN TEXT ATTENDANCE -->
                        <li>
                            <a href="" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                <img class="w-5" src="./Img/icons/consult_icon.svg" alt="Consult Icon">
                                <p class="font-semibold">Konsultasi</p>
                            </a>
                        </li>
                        <!-- ICON DAN TEXT SCORE -->
                        
                        <!-- ICON DAN TEXT CONSULT -->
                        <li>
                        <a href="#" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 bg-cream hover:text-white">
                                <img class="w-5" src="./Img/icons/attendance_icon.svg" alt="Course Icon">
                                <p class="text-white font-semibold">Jadwal</p>
                            </a>
                          
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom nav -->
            <div>
                <ul class="flex flex-col ">
                    <!-- ICON DAN TEXT HELP -->
                    <li>
                        <a href="#" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                            <img class="w-5" src="./Img/icons/help_icon.svg" alt="Help Icon">
                            <p class="font-semibold">Bantuan</p>
                        </a>
                    </li>
                    <!-- ICON DAN TEXT LOG OUT -->
                    <li>
                        <a href="assignment.php?act=logout" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                            <img class="w-5" src="./Img/icons/logout_icon.svg" alt="Log out Icon">
                            <p class="font-semibold">Keluar</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Mobile navbar -->
        <div id="left-nav" class="bg-opacity-50 bg-gray-500 absolute inset-x-0 hidden z-10 transition-all ease-in-out duration-500 sm:hidden">

            <div class="bg-white w-[250px] h-screen px-8 py-6 ">
                <!-- Top nav -->
                <div class="flex flex-col gap-y-6">

                    <!-- List Menus -->
                    <div>
                        <ul class="flex flex-col gap-y-1">
                            <li>
                                <a href="" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                    <img class="w-5" src="./Img/icons/home_icon.svg" alt="Dashboard Icon">
                                    <p class="font-semibold">Beranda</p>
                                </a>
                            </li>
                            <!-- ICON DAN TEXT FORUM COURSES -->
                            <li>
                                <a href="#" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 bg-cream">
                                    <img class="w-5" src="./Img/icons/course_icon.svg" alt="Course Icon">
                                    <p class="text-white font-semibold">Materi</p>
                                </a>
                            </li>
                            <!-- ICON DAN TEXT SCHEDULE -->
                            <li>
                                <a href="" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                    <img class="w-5" src="./Img/icons/schedule_icon.svg" alt="Schedule Icon">
                                    <p class="font-semibold">Penugasan</p>
                                </a>
                            </li>
                            <!-- ICON DAN TEXT ATTENDANCE -->
                            <li>
                                <a href="" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                    <img class="w-5" src="./Img/icons/attendance_icon.svg" alt="Attendance Icon">
                                    <p class="font-semibold">Konsultasi</p>
                                </a>
                            </li>
                            <!-- ICON DAN TEXT SCORE -->
                            <!-- <li>
                                <a href="" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                    <img class="w-5" src="../../Img/icons/score_icon.svg" alt="Score Icon">
                                    <p class="font-semibold">Score</p>
                                </a>
                            </li> -->
                            <!-- ICON DAN TEXT CONSULT -->
                            <li>
                                <a href="" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                    <img class="w-5" src="./Img/icons/consult_icon.svg" alt="Consult Icon">
                                    <p class="font-semibold">Jadwal</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Bottom nav -->
                <div>
                    <ul class="flex flex-col ">
                        <!-- ICON DAN TEXT HELP -->
                        <li>
                            <a href="#" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                <img class="w-5" src="./Img/icons/help_icon.svg" alt="Help Icon">
                                <p class="font-semibold">Bantuan</p>
                            </a>
                        </li>
                        <!-- ICON DAN TEXT LOG OUT -->
                        <li>
                            <a href="assignment.php?act=logout" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                <img class="w-5" src="./Img/icons/logout_icon.svg" alt="Log out Icon">
                                <p class="font-semibold">Keluar</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!--search-->
        <?php $get_api = get_directus("https://q4optgct.directus.app/items/events?fields=*.*");?>
        <?php if(isset($_POST['submit'])){
            $search = $_POST['cari'];

            if($search != ''){
                $get_api = get_directus("https://q4optgct.directus.app/items/events?fields=*.*&filter[event_name][_contains]=$search");
            }else{
                $get_api = get_directus("https://q4optgct.directus.app/items/events?fields=*.*");
            }
        }?>

        <!-- datatables -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


<!-- Header / Profile -->
<div class=" w-full h-screen px-10 py-6 flex flex-col gap-y-6 overflow-y-scroll">
    <main class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Data Jadwal Mentor</h1>
        <br>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-black dark:text-black" id="tabel-data">
                    <thead class="bg-gray-50 text-black ">
                    <tr>
                        <th class="p-6 text-sm text-gray-500">Event_name</th>
                        <th class="p-6 text-sm text-gray-500">Event_type_name</th>
                        <th class="p-6 text-sm text-gray-500">Event_start</th>
                        <th class="p-6 text-sm text-gray-500">Event_end</th>
                        <th class="p-6 text-sm text-gray-500">Description</th>
                        <th class="p-6 text-sm text-gray-500">Batch_id</th>
                        <th class="p-6 text-sm text-gray-500">Modul_id</th>
                        <th class="px-6  text-xs text-gray-500"></th>
                        <th class="px-6 py-3 text-xs text-gray-500"></th>
                    </tr>
            </thead>
            <body>

            <?php
            function sortDescByDate($a,$b){
                $t1 = strtotime($a['event_start_time']);
                $t2 = strtotime($b['event_start_time']);
            
                if ($t1 == $t2) {
                    return 0;
                }
                return ($t1 < $t2) ? -1 : 1;
            }

            foreach($get_api as $value):
                usort($value, 'sortDescByDate');
            ?>

                <?php foreach ($value as $row) : ?>
                    <!-- <?php print_r($row); ?>  -->
                    <tr class="border-2 dark:bg-white">
                        <td scope="row" class="px-6 py-4 font-medium text-black dark:text-black">
                        <?php echo $row ['event_name']?></td>
                        <td class="px-6 py-4"><?php echo $row['event_type_id']['event_type_name']?></td>
                        <td class="px-6 py-4"><?php echo $row['event_start_time']?></td>
                        <td class="px-6 py-4"><?php echo $row['event_end_time']?></td>
                        <td class="px-6 py-4"><?php echo $row['event_description']?></td>
                        <td class="px-6 py-4"><?php echo $row['batch_id']?></td>
                        <td class="px-6 py-4"><?php echo $row['modul_id']?></td>
                        <td><div class="container-lg flex flex-column justify-center items-center">
                        <button class="block text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4
                        focus:outline-none font-medium rounded-lg text-sm px-3 py-1.5 text-center" 
                        type="button" 
                        data-modal-toggle="data-modal-placement" id="btnEdit" 
                        data-eventId = "<?php echo $row['event_id']?>"
                        data-eventName="<?php echo $row ['event_name']?>" 
                        data-eventTypeName = "<?php echo $row['event_type_id']['event_type_name']?>" 
                        data-eventStartTime = "<?php echo $row['event_start_time']?>"
                        data-eventEndTime = "<?php echo $row['event_end_time']?>"
                        data-description = "<?php echo $row['event_description']?>"
                        data-batchId = "<?php echo $row['batch_id']?>"
                        data-modulId = "<?php echo $row['modul_id']?>"
                        >
                        Edit</button></td>

                        <!-- Main modal -->
                        <div id="data-modal-placement" tabindex="-1" aria-hidden="true" class="hidden
                        overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0
                        h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                            <div id="modul_id" style="display:none;">2</div>
                            <div id="batch_id" style="display:none;">4</div>

                        <!-- Modal Edit -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent
                            hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex
                            items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="data-modal-placement">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414
                                    1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                </button>
                        <div class="py-6 px-6 lg:px-8 mt-8 grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Jadwal Admin</h3>
                                <form class="space-y-6" method="POST"
                                method="post" action="edit.php" >
                        <div>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900
                          dark:text-gray-300">Event Name</label><input  type="text"
                            name="event_name" id="event_name" class="bg-gray-50 border
                          border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                          focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600
                          dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                        </div>
                        <div>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900
                          dark:text-gray-300">Event Type Name</label><input  type="text" name="event_type_name"
                            id="event_type_name" class="bg-gray-50 border border-gray-300 text-gray-900
                            text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full
                            p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400dark:text-white" >
                        </div>
                        <div>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900
                          dark:text-gray-300">Event Start</label><input  type="text"
                            name="event_start_time" id="event_start_time" class="bg-gray-50 border
                          border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                          focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600
                          dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                        </div>
                        <div>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900
                          dark:text-gray-300">Event end </label><input  type="text"
                            name="event_end_time" id="event_end_time" class="bg-gray-50 border
                          border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                          focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600
                          dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                        </div>
                        <div>
                            <label for="text">
                                <span class="block mb-2 text-sm font-medium text-gray-900
                              dark:text-gray-300">Description</span>
                                <input  name="event_description" id="event_description" class="form-textarea mt-1 block h-24 bg-gray-50 border
                              border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                              focus:border-blue-500 w-full p-2.5 dark:bg-gray-600
                              dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" row="3" >
                            </label>
                        </div>
                     <div class="flex justify-between"></div>
                        <input type="hidden" name="event_id" id="event_id" >
                            <input type="submit" class="w-full text-white bg-cream
                            hover:bg-cream focus:ring-4 focus:outline-none focus:cream
                            font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-cream
                          hover:bg-amber-800 dark:focus:cream" value="kirim"/>
                    </form>
                </div>
            </div>
        </div>
    </div>

<td>
    <form method="POST" action="delete.php">

                    <input type="hidden" name="event_id" id="event_id" value="<?= $row["event_id"]?>">

        <button class="block text-white bg-red-500 hover:bg-red-700 focus:ring-4x`
        focus:outline-none font-medium rounded-lg text-sm px-3 py-1.5 text-center"
        type="submit">
        Delete </button>
    </form>
<!-- </td>
    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent
            hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex
            items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">

        </button>
        <div class="p-6 text-center">
            <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                    Are you sure you want to delete this product?</h3>
                <button data-modal-toggle="popup-modal" type="button" class="text-white
                bg-cream hover:bg-amber-800 focus:ring-4 focus:outline-none
                font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5
                text-center mr-2">Yes</button>

                <button data-modal-toggle="popup-modal" type="button" class="text-gray-500
                bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200
                rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900
                focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500
                dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                cancel</button>
            </div>
        </div>
    </div> -->
            <?php endforeach; ?>
                <?php endforeach; ?>

    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script>
          let btnToggle = document.getElementById('btnToggle');
        let btnToggle2 = document.getElementById('btnToggle2');
        let sidebar = document.querySelector('.sidebar');
        let leftNav = document.getElementById("left-nav");
        btnToggle.onclick = function() {
            sidebar.classList.toggle('in-active');
        }

        btnToggle2.onclick = function() {
            leftNav.classList.toggle('hidden');
        }


         $(document).ready(function() {
                                     $(document).on('click', '#btnEdit', function() {
                                        console.log('edit');
                                        let event_name = $(this).data('eventname');
                                         $('#event_name').val(event_name);

                                        let event_type_name = $(this).data('eventtypename');
                                         $('#event_type_name').val(event_type_name);

                                        let event_start_time = $(this).data('eventstarttime');
                                        $('#event_start_time').val(event_start_time);

                                         let event_end_time = $(this).data('eventendtime');
                                     $('#event_end_time').val(event_end_time);

                                        let event_description = $(this).data('description');
                                        $('#event_description').val(event_description);

                                         let batch_id = $(this).data('batchid');
                                        $('#batch_id').val(batch_id);

                                        let modul_id = $(this).data('modulid');
                                         $('#modul_id').val(modul_id);

                                        let event_id = $(this).data('eventid');
                                        $('#event_id').val(event_id);
                                     })
                         })
    </script>
<script>
        introJs().setOptions({
  steps: [{
    title: 'Selamat Datang ',
    intro: 'Ini merupakan tampilan Jadwal Mentor.',
  },
  {
    element: document.querySelector('table'),
    intro: 'ini Jadwal list Mentor .',
  }]
}).start();

//function openModal(event_type_id) {
    //$.ajax({
        //url: "https://q4optgct.directus.app/items/events/" +event_type_id,
       // method: "get",
       // success: function(data) {
          //  console.log(data);

         //   let event = data.data;
         //   let eventName = event.event_name;
          //  let eventTypeName = event.created_by;
          //  let eventStartTime = event.event_start_time;
          //  let eventEndTime = event.event_end_time;
          //  let eventDescription = event.event_description;

          //  console.log(eventName);

         //   $('#event_name').val(eventName);
        //    $('#event_type_name').val(eventTypeName);
        //    $('#event_start_time').val(eventStartTime);
         //   $('#event_end_time').val(eventEndTime);
        //    $('#event_description').val(eventDescription);
      //  }
  //  })
//}

//function updateModal(event_id) {

// let modulId = $("#modul-ID").val();
//let eventName = $("#event_name").val();
//let eventTypeName = $("#event_type_name").val();
//let eventStartTime = $("#event_start_time").val();
//let eventEndTime = $("#event_end_time").val();
//let eventDescription = $("#event_description").val();
// let modulParent = $("#parentid").val();


// alert(event_type_id);

//let arr = {
  //  "event_id": event_id,
  //  "event_name": EventName,
  //  "created_by": eventTypeName,
  //  "event_start_time": eventStartTime,
  //  "event_end_time": eventEndTime,
  //  "event_description": eventDescription,
    // "parent_id": modulParent,

//};


//$.ajax({
  //  url: "https://q4optgct.directus.app/items/events/",
  //  type: "PATCH",
  //  data: arr,
 //   success: function(res) {
 //       console.log(res);

 //   }
//});


//}

function deleteData(event_id) {
    let conf = confirm("yakin hapus?");
    if(conf) {
        $.ajax({
        url: "",
        method: "post",
        data: {
            event_id : event_id
        },
        success: function() {
            alert("success");
        }
    })
    }
    
}
</script>
<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });

</script>
      </body>
</head>