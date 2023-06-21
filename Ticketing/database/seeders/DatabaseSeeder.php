<?php

namespace Database\Seeders;

use App\Models\Bought;
use App\Models\Categories;
use App\Models\Concerts;
use App\Models\Vendors;
use App\Models\Tickets;
use App\Models\User;
use App\Models\Visitors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->times(10)->create();
        Vendors::factory()->times(10)->create();
        Categories::factory()->times(7)->create();
        Concerts::factory()->times(20)->create();
        Tickets::factory()->times(100)->create();
        Visitors::factory()->times(50)->create();
        Bought::factory()->times(100)->create();
        
        
/*         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'password' => '12345',
         ]);

         Vendors::create([
            'idVendor' => '1',
            'nama' => 'Heathcote PLC'
         ]);

         Concerts::create([
            'idKonser' => '1',
            'idVendor' => '1',
            'nama' => 'Franz Stark',
            'slug' => 'aut-voluptas-suscipit-eius-labore-aliquid-voluptas-itaque-magni',
            'pict' => 'bruno3.jpg',
            'tanggal' => '2023-07-16 13:41:08',
            'waktu' => '20:00 - 22:00',
            'harga' => '12345678',
            'terms' => '\n            <ol>\n<li>\nTiket hanya dapat dibeli melalui Official Partner loket.com.<br>\nTicket can only be purchased from the Official Partner loket.com.\n</li>\n<li>\nSatu transaksi memiliki MAKSIMAL pembelian 5 Tiket, tidak ada batasan transaksi untuk satu ID yang sama.<br>\n1 (one) transaction can purchase a MAXIMUM of 5 (five) TICKETS, 1 (one) ID can repurchase the tickets more than 1 (one) time (no transaction limit).\n</li>\n<li>\nPanitia/Penyelenggara/Promotor tidak bertanggung jawab atas pembelian Tiket melalui calo/tempat/kanal/platform/ yang bukan mitra resmi penjualan Tiket Bruno Major Tour of Planet Earth 2023.<br>\nThe Committee/Organizer/Promotor is not responsible for ticket purchased through brokers/channels/platform who are not the official partner selling TICKETS for The Bruno Major Tour of Planet.\n</li>\n<li>\nTiket tidak yang sudah dibeli tidak dapat dibatalkan atau diuangkan kembali dengan alasan apapun.<br>\nPurchased tickets cannot be canceled or refunded for any reasons.\n</li>\n<li>\nAda 6 (enam) kategori Tiket yaitu Festival A dan Festival B tanpa kursi, serta Tribune A Right, Tribune A Left, Tribune B Right, Tribune B Left bersifat free seating (tidak ada nomor kursi).<br>\nThere are 6 (six) Ticket categories for Festival A and Festival B without seats. For Tribune A Right, Tribune A Left, Tribune B Right, Tribune B Left are free seats (no seat numbers).\n</li>\n<li>\nTiket tempat duduk yang dapat diakses/penyandang disabilitas tidak tersedia.<br>\nAccessible seating/disabled access tickets are not available.\n</li>\n<li>\nAnak dibawah umur 14 tahun wajib didampingi oleh orang tua atau wali, serta anak dibawah umur 6 tahun tidak diperkenankan masuk.<br>\nChildren under 14 years old must be accompanied by a parent or guardian, and children under 6 years old are not allowed to enter.\n</li>\n<li>\nPenukaran Tiket dan waktu open gate akan diinfokan kembali oleh penyelenggara sebelum event berlangsung. Mohon untuk mengikuti sosial media penyelenggara.<br>\nTicket exchange and gate open time will be informed again by the organizer before the event takes place. Please follow the organizer\'s social media.\n</li>\n<li>\nPenukaran tiket yang diwakili oleh pihak lain wajib menyertakan surat kuasa yang telah ditandatangani di atas materai Rp 10.000,- dan membawa fotokopi/scan foto KTP sesuai dengan nama yang tertera pada saat pembelian tiket.<br>\nTicket redemption by other parties must provide a power of attorney letter signed and attached with IDR 10.000,- stamp along with its authorizerâ€™s ID.\n</li>\n<li>\nPenonton bertanggung jawab penuh terhadap keamanan diri dan semua barang-barang pribadinya.<br>\nTicket holders are fully responsible for the safety of themselves and all their personal belongings.\n</li>\n<li>\nPenonton dilarang merekam dengan kamera profesional untuk kepentingan komersial.<br>\nTicket holders are prohibited from recording with a professional camera for commercial purposes.\n</li>\n<li>\nPenonton dilarang mengambil foto menggunakan flash.<br>\nTicket holders are prohibited from taking photos using flash.\n</li>\n<li>\nPenonton dilarang membawa senjata api, senjata tajam, dan benda-benda yang membahayakan.<br>\nTicket holders are prohibited from bringing firearms, sharp weapons, and dangerous objects.\n</li>\n<li>\nPenonton dilarang membawa makanan dan minuman dari luar.<br>\nTicket holders are prohibited from bringing food and beverages from outside.\n<li>\nSesuai dengan regulasi yang tertera pada Surat Edaran (SE) Satuan Tugas Penanganan Covid-19 20/2022, seluruh penonton wajib sudah menerima Vaksinasi Lengkap.<br>\nIn accordance with the regulations stated in the Circular Letter of the Covid-19 Handling Task Force 20/2022, all ticket holders must have received Complete Vaccination.\n</li>\n<li>\nEspecially for viewers aged 18 years and over, they must have received a Booster Vaccine.<br>\nEspecially for viewers aged 18 years and over, they must have received a Booster Vaccine.\n</li>\n<li>\nPenyelenggara memiliki hak untuk:<br>\nPromoter has the right to:\n</li>\n</ol>\n\n<ul>\n<li>\nMelarang masuk penonton jika TIKET telah dipergunakan oleh orang lain/tidak valid.<br>\nProhibit ticket holders from entering if the TICKET has been used by someone else/is not valid.\n</li>\n<li>\nMemproses atau mengajukan hukum, baik perdata atau kriminal kepada penonton yang mendapatkan TIKET dengan illegal termasuk memalsukan dan menggandakan TIKET yang sah atau mendapatkan TIKET dengan cara yang tidak sesuai prosedur.<br>\nProcess and prosecute in accordance with the prevailing civil or criminal provisions of ticket holders who obtained TICKETS illegally, including falsifying and duplicating valid TICKETS or obtaining TICKETS in unauthorized manner.\n</li>\n<li>\nDalam keadaan Force Majeure seperti bencana alam, kerusuhan, perang, wabah, dan semua keadaan darurat yang diumumkan secara resmi oleh Pemerintah, terkait kenaikan wabah covid, panitia/penyelenggara/promotor berhak untuk membatalkan dan/atau merubah waktu acara dan tata letak tempat tanpa pemberitahuan sebelumnya (TIKET tidak dapat direfund, tetapi bisa digunakan untuk pertunjukkan Bruno Major Tour of Planet Earth di waktu dan tempat yang lain).<br>\nIn Force Majeure circumstances such as natural disasters, riots, wars, epidemics, and all emergencies officially announced by the Government, related to an increase in the covid outbreak, the committee/organizer/promoter has the right to cancel and/or change the event time and venue layout without notification beforehand (TICKETS are non-refundable, but can be used for the Bruno Major Tour of Planet Earth show at another time and place).\n</li>\n<li>\nPanitia/Penyelenggara/Promotor tidak bertanggung jawab atas kompensasi dan/atau biaya pembatalan untuk biaya perjalanan dan/atau penginapan yang Anda keluarkan apabila pertunjukkan dibatalkan atau ditunda.<br>\nThe Committe/Organizer/Promoter is not responsible for compensation and/or cancellation fees for travel and/or lodging expenses ticket holders purchased if the show is canceled or postponed.\n</li>\n<li>\nPanitia/Penyelenggara/Promotor berhak untuk merevisi waktu acara, tata letak tempat, dan kapasitas penonton tanpa pemberitahuan sebelumnya.<br>\nThe committee/organizer/promoter reserves the right to revise the event time, venue layout and audience capacity without prior notification.\n</li>\n<li>\nPanitia/Penyelenggara/Promotor berhak menindak tegas dan mengeluarkan pengunjung apabila tidak mematuhi peraturan yang berlaku, Do & Don\'ts, menimbulkan kerusuhan, atau melanggar ketertiban umum.<br>\nThe committee/organizer/promoter has the right to take firm action and get ticket holders out of the venue if they do not comply with applicable regulations, Do & Don\'ts, cause riots, or violate public order.\n</li>\n</ul>\n',
            'tempat' => 'GBK Hall Jakarta'
         ]);

         Tickets::create([
            'idTiket' => '1',
            'idKonser' => '1',
            'status' => '1',
            'venue' => 'cat1'
         ]);*/
    }
}
