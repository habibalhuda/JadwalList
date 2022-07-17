<?php 
session_start();
function http_request($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $out = curl_exec($ch);

    curl_close($ch);

    return $out;
}


$dataJson = json_decode(http_request("https://q4optgct.directus.app/items/events"));

// var_dump($dataJson);

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


        @media (max-width: 767.98px) {
    .fc .fc-toolbar.fc-header-toolbar {
        width: 100%;
        display: block;
        text-align: center;
    }

    .fc-header-toolbar .fc-toolbar-chunk {
        display: block;
    }
}
html, body {
      margin: 0;
      padding: 0;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
    }

#calendar {
    max-width: auto;
    margin:40px  auto;
}



    .popper,
    .tooltip {
        position: absolute;
        z-index: 9999;
        background: #FFC107;
        color: black;
        width: 150px;
        border-radius: 3px;
        box-shadow: 0 0 2px rgba(0,0,0,0.5);
        padding: 10px;
        text-align: center;
    }
    .style5 .tooltip {
        background: #1E252B;
        color: #FFFFFF;
        max-width: 200px;
        width: auto;
        font-size: .8rem;
        padding: .5em 1em;
    }
    .popper .popper__arrow,
    .tooltip .tooltip-arrow {
        width: 0;
        height: 0;
        border-style: solid;
        position: absolute;
        margin: 5px;
    }

    .tooltip .tooltip-arrow,
    .popper .popper__arrow {
    border-color: #FFC107;
    }
    .style5 .tooltip .tooltip-arrow {
        border-color: #1E252B;
    }
    .popper[x-placement^="top"],
    .tooltip[x-placement^="top"] {
        margin-bottom: 5px;
    }
    .popper[x-placement^="top"] .popper__arrow,
    .tooltip[x-placement^="top"] .tooltip-arrow {
        border-width: 5px 5px 0 5px;
        border-left-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        bottom: -5px;
        left: calc(50% - 5px);
        margin-top: 0;
        margin-bottom: 0;
    }
    .popper[x-placement^="bottom"],
    .tooltip[x-placement^="bottom"] {
        margin-top: 5px;
    }
    .tooltip[x-placement^="bottom"] .tooltip-arrow,
    .popper[x-placement^="bottom"] .popper__arrow {
        border-width: 0 5px 5px 5px;
        border-left-color: transparent;
        border-right-color: transparent;
        border-top-color: transparent;
        top: -5px;
        left: calc(50% - 5px);
        margin-top: 0;
        margin-bottom: 0;
    }
    .tooltip[x-placement^="right"],
    .popper[x-placement^="right"] {
        margin-left: 5px;
    }
    .popper[x-placement^="right"] .popper__arrow,
    .tooltip[x-placement^="right"] .tooltip-arrow {
        border-width: 5px 5px 5px 0;
        border-left-color: transparent;
        border-top-color: transparent;
        border-bottom-color: transparent;
        left: -5px;
        top: calc(50% - 5px);
        margin-left: 0;
        margin-right: 0;
    }
    .popper[x-placement^="left"],
    .tooltip[x-placement^="left"] {
        margin-right: 5px;
    }
    .popper[x-placement^="left"] .popper__arrow,
    .tooltip[x-placement^="left"] .tooltip-arrow {
        border-width: 5px 0 5px 5px;
        border-top-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        right: -5px;
        top: calc(50% - 5px);
        margin-left: 0;
        margin-right: 0;
    }

    
    </style>
    <!--intro JS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/5.1.0/introjs.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/5.1.0/intro.min.js"></script> 
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS calendar-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.min.js"></script>
    <!-- Popper dan Tooltip -->
    <script src='https://unpkg.com/popper.js/dist/umd/popper.min.js'></script>
    <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        <!-- ICON DAN TEXT FORUM NILAI -->
                        <li>
                        <a href="https://assignment.lumintulogic.com/auth.php?token=<?= $_COOKIE['X-LUMINTU-REFRESHTOKEN']; ?>&expiry=<?= $_SESSION['expiry']; ?>&page=score" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                    <img class="w-5" src="./Img/icons/score_icon.svg" alt="Schedule Icon">
                                    <p class="font-semibold">Nilai</p>
                                </a>
                        </li>
                        <!-- ICON DAN TEXT PENUGASAN -->
                        <li>
                        <a href="https://assignment.lumintulogic.com/auth.php?token=<?= $_COOKIE['X-LUMINTU-REFRESHTOKEN']; ?>&expiry=<?= $_SESSION['expiry']; ?>&page=index" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                        <img class="w-5" src="./Img/icons/attendance_icon.svg" alt="Course Icon">
                                <p class="font-semibold">Penugasan</p>
                            </a>
                        </li>
                        <!-- ICON DAN TEXT ATTENDANCE -->
                        <li>
                            <a href="https://consultation.lumintulogic.com/auth.php?token=<?= $_COOKIE['X-LUMINTU-REFRESHTOKEN']; ?>&expiry=<?= $_SESSION['expiry']; ?>" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
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
                        <a href="http://schedule.lumintulogic.com/auth.php?token=<?php echo ($_COOKIE['X-LUMINTU-REFRESHTOKEN']); ?>&expiry=<?php echo $_SESSION["expiry"]; ?>" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 bg-cream hover:text-white">
                        <img class="w-5" src="./Img/icons/schedule_icon.svg" alt="Schedule Icon">
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
                        <a href="introjs.js" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                            <img class="w-5" src="./Img/icons/help_icon.svg" alt="Help Icon">
                            <p class="font-semibold">Bantuan</p>
                        </a>
                    </li>
                    <!-- ICON DAN TEXT LOG OUT -->
                    <li>
                    <a href="./logout.php" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white" onclick=" return confirm('Anda yakin ingin keluar?')">
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
                <!-- Top nav -->nilai
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
                        <a href="https://assignment.lumintulogic.com/auth.php?token=<?= $_COOKIE['X-LUMINTU-REFRESHTOKEN']; ?>&expiry=<?= $_SESSION['expiry']; ?>&page=score" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                    <img class="w-5" src="./Img/icons/score_icon.svg" alt="Schedule Icon">
                                    <p class="font-semibold">Nilai</p>
                                </a>
                        </li>
                            <!-- ICON DAN TEXT SCHEDULE -->
                            <li>
                            <a href="https://assignment.lumintulogic.com/auth.php?token=<?= $_COOKIE['X-LUMINTU-REFRESHTOKEN']; ?>&expiry=<?= $_SESSION['expiry']; ?>&page=index" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                    <img class="w-5" src="./Img/icons/schedule_icon.svg" alt="Schedule Icon">
                                    <p class="font-semibold">Penugasan</p>
                                </a>
                            </li>
                            <!-- ICON DAN TEXT ATTENDANCE -->
                            <li>
                                <a href="https://consultation.lumintulogic.com/auth.php?token=<?= $_COOKIE['X-LUMINTU-REFRESHTOKEN']; ?>&expiry=<?= $_SESSION['expiry']; ?>" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
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
                            <a href="http://schedule.lumintulogic.com/auth.php?token=<?php echo ($_COOKIE['X-LUMINTU-REFRESHTOKEN']); ?>&expiry=<?php echo $_SESSION["expiry"]; ?>" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
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
                            <a href="introjs.js" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white">
                                <img class="w-5" src="./Img/icons/help_icon.svg" alt="Help Icon">
                                <p class="font-semibold">Bantuan</p>
                            </a>
                        </li>
                        <!-- ICON DAN TEXT LOG OUT -->
                        <li>
                        <a href="./logout.php" class="flex items-center gap-x-4 h-[50px] rounded-xl px-4 hover:bg-cream text-dark-green hover:text-white" onclick=" return confirm('Anda yakin ingin keluar?')">
                            <img class="w-5" src="./Img/icons/logout_icon.svg" alt="Log out Icon">
                            <p class="font-semibold">Keluar</p>
                        </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

      <!-- Right side -->
        <div class="bg-cgray w-full h-screen px-10 py-6 flex flex-col gap-y-6 overflow-y-scroll">
      
        <!-- Header / Profile -->
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">Calendar</h1> 
            <div class="items-center gap-x-4 justify-end hidden sm:flex">
                <img class="w-10" src="./Img/icons/default_profile.svg" alt="Profile Image">
                <p class="text-dark-green font-semibold"><?= $_SESSION['user_data']->{'user'}->{'user_username'} ?></p>
            </div>
 
            <!-- Breadcrumb -->
            <div class="p-2 lg:p-4">
                <ul class="flex items-center gap-x-4 text-xs lg:text-base">
                    <!-- NAVIGATOR HALAMAN HOME -->

                    <li>
                        <a class="text-light-green hover:text-dark-green hover:font-semibold" href="">Home</a>
                    </li>

                    <li>
                        <span class="text-light-green">/</span>
                    </li>
                 

                    <li>
                        <a class="text-dark-green font-semibold" href="">Schedule</a>
                    </li>
                </ul>
            </div>
      <br>
      <br>
      <div class="container">
            <div id="calendar">

            </div>
      </div>

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

        
      //   calendar
      document.addEventListener('DOMContentLoaded', function() {
            const element = document.getElementById("kt_docs_fullcalendar_basic");
            let allEvent = 0;
            let calendarEl= document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,listMonth"
        
                    
                },
                eventTimeFormat: { // seperti '14:30:00'
                    hour: '2-digit',
                    minute: '2-digit',
                    meridiem: false,
                },
                height: 900,
                contentHeight: 850,
                aspectRatio: 3,  //ratio of the calendar


                view:{
                    dayGridMonth: { buttonText: "month" },
                    listMonth: { buttonText: "list" },
                
                },        
                events: 'events.php',
                navLinks: false,
                dayMaxEvents: true,
                selectable: true,
                editable:false,
                eventDisplay:'block',
                
    eventClick: function(info) {
    alert('Title: ' + info.event.title + '\nStart:' + info.event.start + '\nEnd:' + info.event.end + '\nDescription:' + info.event.extendedProps.description);
    
    info.el.style.borderColor = 'red';
  },

                eventContent: function (arg) {
                    var customHtml = '';
                    customHtml += `&nbsp <i style="overflow: hidden; word-wrap: break-word; color:${arg.event.extendedProps.color};" class= "${arg.event.extendedProps.icon}"></i> &nbsp ${arg.event.title}`;
                    return {
                        html: customHtml,
                    }
                },
            });
            calendar.render();

            $(window).resize(function() {
                if ($(window).width() < 768) {
                    calendar.changeView('listMonth');
                } else {
                    calendar.changeView('dayGridMonth');
                }
            });

            if ($(window).width() < 768) {
                calendar.changeView('listMonth');
            } else {
                calendar.changeView('dayGridMonth');
            }
        });
        introJs().setOptions({ 
        "dontShowAgain": true,
        steps: [{
            title: 'Selamat Datang ',
            intro: 'Ini merupakan tampilan jadwal Siswa.',
        },
        {
            element: document.querySelector('.fc-dayGridMonth-view'),
            intro: 'ini tampilan kalender untuk melihat event yang ada.',
        },
        {
            element: document.querySelector('.fc-prev-button'),
            intro: 'ini tombol untuk menampilkan bulan sebelumnya.',
        },
        {
            element: document.querySelector('.fc-next-button'),
            intro: 'ini tombol untuk menampilkan bulan selanjutnya.',
        },
        {
            element: document.querySelector('.fc-today-button'),
            intro: 'ini tombol untuk menampilkan bulan sekarang.',
        },
        {
            element: document.querySelector('.fc-dayGridMonth-button'),
            intro: 'ini merupakan tombol untuk menampilkan tampilan kalender bulan ini.',
        },
        {
            element: document.querySelector('.fc-listMonth-button'),
            intro: 'ini merupakan tombol untuk menampilkan tampilan kalender berdasarkan list.',
        }]
        
        }).start();
    
      </script>
<footer>
    <div class="container mx-auto px-6 py-8">
        <div class="flex flex-col items-left">
        <li style="color:blue"><span class="far"><i class="fa-regular fa-clipboard"></i></span> Class</li>
        <li style="color:red"><span class="far"><i class="fa-regular fa-clock"></i></span> Deadline</li>
        <li style="color:green"><span class="far"><i class="fa-reguler fa-user"></i></span> Consult</li> 
        </div>
    </div>
</footer>
</body>

</html>