
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
    element: document.querySelector('.fc-timeGridWeek-button'),
    intro: 'ini merupakan tombol untuk menampilkan tampilan perminggu pada bulan ini.',
  },
  {
    element: document.querySelector('.fc-timeGridDay-button'),
    intro: 'ini merupakan tombol untuk menampilkan tampilan perhari pada bulan ini.',
  },
  {
    element: document.querySelector('.fc-listMonth-button'),
    intro: 'ini merupakan tombol untuk menampilkan tampilan kalender berdasarkan list.',
  }]
  
}).start();
