<?php
session_start();
// echo $_SESSION['user_data'];
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
                        <!-- <li>
                            <a href="" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                <img class="w-5" src="../../Img/icons/score_icon.svg" alt="Score Icon">
                                <p class="font-semibold">Score</p>
                            </a>
                        </li> -->
                        <!-- ICON DAN TEXT CONSULT -->
                        <li>
                        <a href="#" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 bg-cream hover:text-white">
                                <img class="w-5" src="./Img/icons/attendance_icon.svg" alt="Course Icon">
                                <p class="text-white font-semibold">Jadwal</p>
                            </a>
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
                        <a href="introjs.php" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
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
                            <a href="introjs.php" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
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
        <table class="w-full text-sm text-left text-black dark:text-white" id="tabel-data">
            <thead class="bg-gray-50 text-black ">
            <tr>
                                    <th class="p-6 text-sm text-gray-500">Event_name</th>
                                    <th class="p-6 text-sm text-gray-500">Event_type_name</th>
                                    <th class="p-6 text-sm text-gray-500">Event_start</th>
                                    <th class="p-6 text-sm text-gray-500">Event_end</th>
                                    
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
                    <tr class="border-2 dark:bg-white dark:border-white odd:bg-white even:bg-gray-50 odd:dark:bg-white even:dark:bg-white">
                        <td scope="row" class="px-6 py-4 font-medium text-black dark:text-white">
                        <?php echo $row ['event_name']?></td>  
                        <td class="px-6 py-4"><?php echo $row['event_type_id']['event_type_name']?></td>
                        <td class="px-6 py-4"><?php echo $row['event_start_time']?></td>
                        <td class="px-6 py-4"><?php echo $row['event_end_time']?></td>
                    

                   
                



<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });

</script>

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

</script>
      </body>
</head>