<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PenyakitSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_penyakit' => 'Skizofrenia',
                'informasi'    => 'Skizofrenia adalah gangguan mental yang cukup serius, di mana penderitanya mengalami kesulitan dalam membedakan khayalan dan realita. Kondisi ini umumnya ditandai dengan perilaku abnormal, seperti delusi dan halusinasi, sehingga tak jarang penderitanya dianggap “gila”.
                <br><br>
                Skizofrenia adalah masalah kesehatan jangka panjang yang memerlukan perawatan berkelanjutan. Artinya, penderita skizofrenia perlu menjalani perawatan seumur hidup untuk mengontrol gejala, mencegah komplikasi, dan membantu mereka dalam melakukan aktivitas sehari-hari.',
                'solusi'    => 'terdapat solusi pengobatan yang bisa dilakukan untuk mengendalikan dan mengurangi gejala sehingga penderita bisa beradaptasi dengan lingkungan sekitar layaknya orang normal, yaitu dengan obat-obatan, psikoterapi, serta terapi seperti elektrokonvulsi (pemberian gelombang elektromagnetik ke otak).
                <br><br>
                Apabila Anda mengenal kerabat yang mengalami gejala menyerupai skizofrenia, segera konsultasikan kondisi tersebut dengan Psikiatri di Siloam Hospitals terdekat untuk mendapatkan perawatan secara tepat. ',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'nama_penyakit' => 'Post Traumatic Stress Disorder (PTSD)',
                'informasi' => 'Post Traumatic Stress Disorder atau yang biasa dikenal dengan sebutan PTSD adalah kondisi masalah mental yang terjadi karena seseorang mengalami kejadian traumatis. Kejadian traumatis yang umumnya menyebabkan PTSD adalah kecelakaan, pelecehan seksual, mengalami kekerasan fisik, dan lain sebagainya. 
                <br><br>
                Gangguan PTSD adalah kondisi yang cenderung membuat penderitanya merasa cemas dan takut saat teringat peristiwa traumatis tersebut.',
                'solusi' => '<b>Pengobatan PTSD</b>
                <br><br>
                <b>Psikoterapi untuk PTSD</b>
                <br>
                Ada beberapa jenis psikoterapi yang dipilih oleh dokter untuk menangani PTSD, antara lain:
                <br>
                1. Terapi paparan (exposure therapy): dilakukan dengan mendekati pasien terhadap situasi atau hal yang ditakutkan. <br>
                2. Terapi kognitif atau cognitive behavioral therapy (CBT): terapi bicara untuk membantu penderita PTSD mengenali pola pikir dirinya sendiri yang dapat memengaruhi emosinya.
                <br><br>
                <b>Obat-Obatan untuk PTSD</b>
                <br>
                Obat-obatan yang biasa diresepkan oleh dokter untuk penderita PTSD di antaranya yaitu:
                <br>
                1. Obat anti cemas. Obat ini digunakan untuk meredakan kecemasan pasien PTSD yang berlebih karena traumanya. Obat anti cemas ini biasanya diresepkan oleh dokter dalam waktu singkat saja. <br>
                2. Prazosin. Prazosin digunakan untuk mengurangi mimpi buruk yang dialami oleh penderita PTSD. <br>
                3. Antidepresan. Antidepresan berfungsi untuk membantu meringankan depresi, sulit berkonsentrasi, dan hal sejenis yang berkaitan dengan gejala PTSD.',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'nama_penyakit' => 'Depresi',
                'informasi' => 'Depresi atau gangguan depresi mayor adalah gangguan kesehatan mental yang memengaruhi perasaan, cara berpikir dan cara bertindak seseorang.Gejala depresi pada seseorang yang paling umum adalah merasa sedih dan kehilangan minat untuk melakukan aktivitas yang biasa mereka lakukan. 
                <br><br>
                Kondisi ini kemudian dapat menyebabkan berbagai masalah emosional dan fisik. Efek depresi dapat berlangsung lama atau bahkan berulang dan mampu memengaruhi kemampuan seseorang menjalani aktivitas sehari-hari. Tidak hanya itu, gangguan kesehatan ini juga dapat memburuk dan bertahan lebih lama bila tak mendapatkan penanganan. ',
                'solusi' => 'Depresi bukanlah tantangan yang mudah, seringkali terasa seperti berada di dalam gelap yang tak terduga. Namun, setiap langkah yang diambil menuju pemulihan adalah langkah ke arah cahaya. Ada beberapa solusi yang dapat membantu memandu seseorang melalui lorong-lorong yang gelap ini. Pertama, konseling dan terapi memberikan tempat aman untuk mengeksplorasi dan mengurai beban yang dipikul, sambil membangun keterampilan yang diperlukan untuk mengatasi tantangan mental. 
                <br><br>
                Selanjutnya, obat-obatan dapat memberikan dukungan tambahan, membantu mengatur keseimbangan kimia otak yang mungkin terganggu. Namun, penanganan depresi juga melibatkan perubahan gaya hidup; pola makan seimbang, rutinitas olahraga yang teratur, dan waktu tidur yang cukup dapat berkontribusi pada kesehatan mental secara keseluruhan. Selain itu, dukungan sosial dari keluarga dan teman-teman serta menghindari penyalahgunaan zat-zat berbahaya juga menjadi poin penting dalam proses pemulihan.
                <br><br>
                Pemahaman bahwa perjalanan ini bukanlah sesuatu yang harus dijalani sendirian, dan kesabaran untuk menerima bahwa pemulihan memerlukan waktu, adalah langkah penting dalam menangani depresi. Dengan bantuan yang tepat dan langkah-langkah yang diambil, ada cahaya di ujung terowongan, di mana kehidupan yang penuh harapan dan sukacita menanti.',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'nama_penyakit' => 'Bipolar',
                'informasi' => 'Gangguan bipolar adalah masalah kesehatan mental yang menyebabkan perubahan suasana hati, energi, tingkat aktivitas, konsentrasi, dan kemampuan untuk melakukan kegiatan sehari-hari. Pengidap yang sebelumnya merasa sangat gembira bisa tiba-tiba berubah menjadi sangat sedih dan putus asa. 
                <br><br>
                Perubahan suasana hati secara drastis ini dapat memengaruhi kebiasaan tidur, tingkat energi, aktivitas, perilaku, dan kemampuan berpikir pengidapnya. Perlu kamu ketahui bahwa penyakit bipolar adalah kondisi seumur hidup. Artinya, masalah kesehatan mental ini tidak bisa sembuh seutuhnya.Meski begitu, terapi dan pengobatan bisa membantu kamu mengelola gejala yang terjadi',
                'solusi' => 'Gangguan bipolar adalah kondisi yang kompleks dan sering kali memerlukan pendekatan yang holistik dalam penanganannya. Salah satu solusi utama adalah terapi obat yang dipantau secara ketat oleh dokter spesialis, seperti psikiater. 
                <br><br>
                Obat-obatan seperti stabilisator suasana hati atau obat antipsikotik dapat membantu mengatur perubahan suasana hati yang ekstrim yang sering terjadi pada gangguan bipolar. Selain itu, terapi psikososial juga sangat penting. Terapi kognitif perilaku (CBT) atau terapi interpersonal dapat membantu individu memahami pola pikir dan perilaku mereka yang mungkin memperburuk kondisi bipolar, serta memberikan strategi untuk mengelolanya dengan lebih baik. 
                <br><br>
                Mendukung gaya hidup sehat juga penting, termasuk pola makan seimbang, olahraga teratur, dan cukup tidur. Manajemen stres dan menjaga rutinitas yang konsisten juga dapat membantu mengurangi risiko episode bipolar. Dukungan sosial dari keluarga, teman, dan kelompok dukungan juga dapat memberikan bantuan yang sangat berarti dalam menghadapi tantangan yang terkait dengan gangguan bipolar. 
                <br><br>
                Dengan kombinasi perawatan yang tepat dan dukungan yang kuat, individu dengan gangguan bipolar dapat mengelola gejala mereka dengan lebih efektif dan hidup dengan kualitas hidup yang lebih baik.',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'nama_penyakit' => 'Paranoid',
                'informasi' => 'Paranoid adalah gangguan kepribadian yang dapat memengaruhi pola pikir dan perilaku seseorang. Kondisi ini dapat membuat seseorang merasa kesulitan untuk memahami dan memercayai situasi tertentu maupun orang lain.
                <br><br>
                Bahkan, orang dengan gangguan kepribadian paranoid cenderung enggan untuk terbuka dengan teman atau kerabat, terus menyimpan dendam, serta menganggap bahwa semua individu berpotensi mengancam kehidupan dan keselamatan dirinya. Hal ini akhirnya membuat penderita gangguan paranoid kesulitan untuk menjalani kehidupan sosial.',
                'solusi' => 'Penyakit paranoid merupakan kondisi mental yang ditandai oleh pola pikir yang terdistorsi dan kepercayaan yang tidak beralasan bahwa orang lain atau lingkungan sekitarnya ingin menyakiti atau merugikan mereka. Untuk menangani penyakit paranoid, terapi obat dan terapi psikososial sering kali diperlukan. 
                <br><br>
                Terapi obat dapat melibatkan penggunaan antipsikotik untuk membantu mengurangi gejala psikotik seperti halusinasi atau waham yang umum terjadi pada penyakit paranoid. Namun, terapi obat harus diawasi dengan ketat oleh dokter untuk memantau efek samping dan keefektifan pengobatan. 
                <br><br>
                Selain itu, terapi psikososial seperti terapi kognitif perilaku (CBT) atau terapi dukungan sosial dapat membantu individu memahami dan mengelola kepercayaan paranoid mereka dengan lebih baik, serta mengembangkan strategi untuk berinteraksi secara lebih sehat dengan lingkungan sekitarnya. Dukungan dari keluarga dan teman-teman juga sangat penting dalam proses penyembuhan, memberikan dukungan emosional dan praktis yang dibutuhkan untuk menghadapi tantangan yang terkait dengan penyakit paranoid. ',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (nama_penyakit, informasi, solusi) VALUES(:nama_penyakit:, :informasi:, :solusi:)', $data);

        // Using Query Builder
        $this->db->table('tbl_penyakit')->insertBatch($data);
    }
}
