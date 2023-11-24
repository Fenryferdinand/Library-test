<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class initialseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            ['author_name' => 'Andrea Hirata', 'author_nationality' => 'Indonesia','author_desc' => 'Andrea Hirata Seman Said Harun atau lebih dikenal sebagai Andrea Hirata adalah novelis Indonesia yang berasal dari Pulau Belitung, provinsi Bangka Belitung. Novel pertamanya adalah Laskar Pelangi yang menghasilkan tiga sekuel.'],
            ['author_name' => 'Eka Kurniawan', 'author_nationality' => 'Indonesia','author_desc'=>'Eka Kurniawan adalah seorang penulis asal Indonesia. Ia menamatkan pendidikan tinggi dari Fakultas Filsafat Universitas Gadjah Mada, Yogyakarta. Eka Kurniawan terpilih sebagai salah satu "Global Thinkers of 2015" dari jurnal Foreign Policy. '],
            ['author_name' => 'Raditya Dika', 'author_nationality' => 'Indonesia','author_desc'=>'Dika Angkasaputra Moerwani Nasution, S.I.P., atau yang lebih dikenal sebagai Raditya Dika adalah seorang komedian, penulis, sutradara, produser, penulis skenario, pebisnis, YouTuber, dan aktor Indonesia.'],
            ['author_name' => 'Dewi Lestari', 'author_nationality' => 'Indonesia','author_desc'=>'Dewi Lestari Simangunsong atau yang akrab dipanggil Dee adalah seorang penulis dan penyanyi-penulis lagu asal Indonesia. Dee pertama kali dikenal masyarakat sebagai anggota trio vokal Rida Sita Dewi. Ia merupakan alumnus SMA Negeri 2 Bandung dan alumnus jurusan Ilmu Hubungan Internasional, Universitas Parahyangan.'],
            ['author_name' => 'Ahmad Fuadi', 'author_nationality' => 'Indonesia','author_desc'=>'hmad Fuadi, S.IP, M.A adalah novelis, pekerja sosial, dan mantan wartawan dari Indonesia. Novel pertamanya adalah novel Negeri 5 Menara yang merupakan buku pertama dari trilogi novelnya. Karya fiksinya dinilai dapat menumbuhkan semangat untuk berprestasi.'],
            ['author_name' => 'Bastian Tito', 'author_nationality' => 'Indonesia','author_desc'=>'Bastian Tito adalah seorang seniman dan penulis novel berkebangsaan Indonesia. Namanya dikenal secara luas melalui karya-karyanya berupa novel. Salah satu novel karangannya, Wiro Sableng, diangkat ke layar kaca, yang dibintangi oleh Herning Sukendro. Bastian merupakan ayah dari aktor Vino G Bastian.']
        ];
        foreach ($authors as $author) {
            Author::create($author);
        }
        $books = [
           ['book_name'=>'Laskar Pelangi','author_id'=>1,'book_publisher'=>'Bentang Pustaka','publish_year'=>'2005','book_synopsis'=>'Ceritanya terjadi di desa Gantung, Belitung Timur. Dimulai ketika sekolah Muhammadiyah terancam akan dibubarkan oleh Depdikbud Sumsel jikalau tidak mencapai siswa baru sejumlah 10 anak. Ketika itu baru 9 anak yang menghadiri upacara pembukaan, akan tetapi tepat ketika Pak Harfan, sang kepala sekolah, hendak berpidato menutup sekolah, Harun dan ibunya datang untuk mendaftarkan diri di sekolah kecil itu.'],
           ['book_name'=>'Sang Pemimpi','author_id'=>1,'book_publisher'=>'Bentang Pustaka','publish_year'=>'2006','book_synopsis'=>'Andrea mengenali Arai yang hidup yatim piatu dan harus hidup sebatang kara ("Simpai Keramat"). Karena, ayahnya satu-satunya anggota keluarganya, meninggal dunia. Sedangkan, Andrea dan Arai mengenali Jimbron di Masjid Al-Hikmah. Jimbron diasuh oleh Pendeta Geovanny, keluarga dekat Jimbron yang berbeda agama, karena Jimbron juga anak yatim piatu, sama seperti Arai. Gaya berbicara Jimbron agak sedikit gagap, dan Jimbron terobsesi pada kuda, karena gemar menonton serial televisi "The Lone Ranger". Dari serial televisi tersebut, Jimbron mengagung-agungkan kuda sebagai hewan yang memenangkan perang Badar.'],
           ['book_name'=>'Edensor','author_id'=>1,'book_publisher'=>'Bentang Pustaka','publish_year'=>'2007','book_synopsis'=>'Berbeda dengan latar cerita dari Laskar Pelangi dan Sang Pemimpi, Edensor mengambil latar di luar negeri saat tokoh-tokoh utamanya, Ikal dan Arai mendapat beasiswa dari Uni Eropa untuk kuliah S2 di Prancis. Dalam Edensor, Andrea tetap dengan ciri khasnya, menulis kisah ironi menjadi parodi dan menertawakan kesedihan dengan balutan pandangan intelegensia tentang culture shock ketika kedua tokoh utama tersebut yang berasal dari pedalaman Melayu di Pulau Belitong tiba-tiba berada di Paris. '],
           ['book_name'=>'Cantik itu Luka','author_id'=>2,'book_publisher'=>'Penerbit Jendela','publish_year'=>'2002','book_synopsis'=>'Di akhir masa kolonial, seorang perempuan dipaksa menjadi pelacur. Kehidupan itu terus dijalaninya hingga ia memiliki tiga anak gadis yang kesemuanya cantik. Ketika mengandung anaknya yang keempat, ia berharap anak itu akan lahir buruk rupa. Itulah yang terjadi, meskipun secara ironik ia memberinya nama si Cantik.'],
           ['book_name'=>'Kambing Jantan: Sebuah Catatan Harian Pelajar Bodoh','author_id'=>3,'book_publisher'=>'GagasMedia','publish_year'=>'2006','book_synopsis'=>'Buku ini berkonsep buku harian dan berisi 235 halaman, yang ditulis berdasarkan kejadian asli sang penulis saat ia kuliah di Adelaide, Australia. Buku ini pun sempat difilmkan pada tahun 2009 dengan bertitelkan Kambing Jantan: The Movie yang dibintangi Raditya sendiri, dan juga Herfiza Novianti.'],
           ['book_name'=>'Cinta Brontosaurus','author_id'=>3,'book_publisher'=>'GagasMedia','publish_year'=>'2006','book_synopsis'=>'Cinta Brontosaurus adalah buku karya Raditya Dika kedua yang diterbitkan pada tahun 2006. Berbeda dengan buku pertamanya, di buku kedua ini lebih berkonsep cerita sebagai sebuah cerita-cerita pendek, tidak sebagai sebuah buku harian. Buku ini berisi 152 halaman, yang dituliskan masih berdasarkan kejadian asli dari sang penulis.'],
           ['book_name'=>'Supernova 1: Kesatria, Putri, & Bintang Jatuh','author_id'=>4,'book_publisher'=>'Truedee Books','publish_year'=>'2001','book_synopsis'=>'Pada tahun 1991, Reuben, seorang Indo-Yahudi dan mahasiswa Johns Hopkins School of Medicine, bertemu dengan Dimas, seorang mahasiswa George Washington University yang berasal dari keluarga Indonesia yang berada, di Washington, D.C.. Mereka berdua menjadi semakin dekat, terlebih setelah Reuben mencoba alkohol pertamanya dan mulai melakukan refleksi tentang sifat dan watak alam semesta. Sepuluh tahun kemudian, Reuben dan Dimas telah menjadi pasangan gay dan menetap di sebelah selatan Jakarta. Melalui pengetahuan Reuben tentang watak alam semesta dan keahlian Dimas sebagai seorang penulis dan pujangga, mereka mulai menulis sebuah cerita cinta antara Kesatria, Putri, dan Bintang Jatuh.'],
           ['book_name'=>'Supernova 2: Akar','author_id'=>4,'book_publisher'=>'Truedee Books','publish_year'=>'2002','book_synopsis'=>'Pada tahun 2003, Gio, seorang naturalis Tionghoa-Indonesia-Portugis, mengunjungi Bolivia untuk bertemu dengan Chaska, ibu dari teman Quechua-nya, Paulo, yang sudah ia anggap sebagai ibunya sendiri. Tiba-tiba, Gio mendapatkan telepon dari Paulo mengenai kabar menghilangnya Diva Anastasia di pedalaman Amazon. Cerita kemudian berdalih ke tahun sebelumnya, 2002. Bodhi adalah seorang pemuda pengikut subkultur punk yang bekerja sebagai bawahan Bong, pemimpin dari hidup punk. Sebagai instruktur pelonco-pelonco punk, Bodhi ditugaskan untuk membekali mereka dengan cerita hidupnya sendiri.'],
           ['book_name'=>'Supernova 3: Petir','author_id'=>4,'book_publisher'=>'AKOER – Andal Krida Nusantara','publish_year'=>'2004','book_synopsis'=>'Bermula dari potongan cerita yang terdapat di kisah novel Supernova, Putri, dan Bintang Jatuh. Pasangan gay Dimas dan Reuben merayakan hari jadi mereka yang ke-12 pada tahun 2003 dengan berbagai keretakan dan ketegangan, dimulai ketika Reuben melupakan tanggal hari jadi mereka, hingga Dimas yang memutuskan untuk tidak memberikan kado kepada Reuben. Saat termenung bersama laptop-nya di sebuah kafe di Jakarta, Dimas menerima sebuah surel dari Gio Alvarado dengan judul "Diva Anastasia", seseorang yang pernah menjadi tokoh yang ia dan Reuben garap dua tahun yang lalu. Gio memberitahukan hilangnya Diva di Hutan Amazon dan mengharapkan bantuan dari orang-orang yang kontaknya Diva catat. Dimas memutuskan untuk memberitahukan perihal ini kepada Reuben.'],
           ['book_name'=>'Supernova 4: Partikel','author_id'=>4,'book_publisher'=>'Bentang Pustaka','publish_year'=>'2002','book_synopsis'=>'Pada tahun 2003 di Bolivia, Zarah Amala diundang teman-temannya, Paul Daly dan Zachary "Zach" Nolan untuk berpartisipasi dalam "Brad to Borneo", sebuah program konservasi orangutan di Kalimantan yang dibintangi oleh Brad Pitt, namun Zarah menolak mentah-mentah karena keengganannya untuk kembali ke Indonesia, meskipun hal tersebut mungkin akan membantunya mencari jawaban atas pertanyaannya.'],
           ['book_name'=>'Supernova 5: Gelombang','author_id'=>4,'book_publisher'=>'Bentang Pustaka','publish_year'=>'2014','book_synopsis'=>'Sebuah upacara gondang mengubah segalanya bagi Alfa. Makhluk misterius yang disebut Si Jaga Portibi tiba-tiba muncul menghantuinya. Orang-orang sakti berebut menginginkan Alfa menjadi murid mereka. Dan, yang paling mengerikan dari itu semua adalah setiap tidurnya menjadi pertaruhan nyawa. Sesuatu menunggu Alfa di alam mimpi.'],
           ['book_name'=>'Supernova 6: Inteligensi Embun Pagi','author_id'=>4,'book_publisher'=>'Bentang Pustaka','publish_year'=>'2016','book_synopsis'=>'Dalam buku ini diceritakan bahwa para pemeran utama dalam buku sebelumnya; Bodhi, Zarah, Alfa, dan Elektra merupakan kaum Peretas/Herbinger yang bertugas menghalangi kaum Sarvara (antagonis) melaksanakan misi mereka. Kaum Peretas yang berada di berbagai tempat dipertemukan dengan bantuan dari para Infiltran dan Umbra yang bertugas mempersiapkan dan menghubungkan mereka satu sama lain.'],
           ['book_name'=>'Negeri 5 Menara','author_id'=>5,'book_publisher'=>'Gramedia','publish_year'=>'2009','book_synopsis'=>'Alif adalah seorang remaja yang hidup di daerah Danau Maninjau dan baru lulus dari Madrasah Tsanawiyah bersama teman sekaligus saingannya Randai. Mereka sama-sama ingin bersaing masuk Institut Teknologi Bandung setelah lulus Sekolah Menengah Atas, tetapi orang tua Alif ingin dia meneruskan pendidikan ke sekolah Islam lagi. Alif awalnya tidak mau sampai dia mendapat pesan dari kerabatnya yang lulusan Pondok Madani, sebuah sekolah Islam di Ponorogo yang lulusannya fasih berbahasa asing dan punya karier di luar negeri. Alif pun tertarik dan menjadi santri di sana.'],
           ['book_name'=>'Rantau 1 Muara','author_id'=>5,'book_publisher'=>'Gramedia','publish_year'=>'2013','book_synopsis'=>'Saat lulus kuliah S1, Alif sudah memiliki penghasilan dengan mengirimkan tulisan-tulisannya ke koran-koran. Namun, krisis moneter pada tahun 1997 membuat tulisan Alif berhenti diterima dan Alif pun harus mencari pekerjaan baru. Setelah mencari-cari, Alif mendapatkan pekerjaan sebagai wartawan untuk majalah Derap yang terkenal idealis dan Alif mendapat tugas-tugas meliput terkait kejatuhan Soeharto pada tahun 1998. Di Derap, Alif jatuh cinta kepada seorang wartawan baru bernama Dinara. Karena masih bercita-cita pergi ke Amerika, Alif belajar untuk mendapat beasiswa S2 dengan bantuan Dinara. Alif pun berhasil menjadi mahasiswa George Washington University dan diizinkan pergi sebagai koresponen Derap di Amerika Serikat.']
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}