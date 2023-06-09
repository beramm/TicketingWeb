<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Vendors;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Concerts>
 */
class ConcertsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vendors_id' => Vendors::inRandomOrder()->first()->id,
            'categories_id' => Categories::inRandomOrder()->first()->id,
            'nama' => fake()->name(),
            'slug' => fake()->slug(),
            'pict' => "bruno3.jpg",
            'tanggal' => fake()->dateTimeThisYear('+3 months')->format('Y-m-d'),
            'waktu' => "20:00 - 22:00",
            'harga' => fake()->numberBetween(700000, 3500000),
            'tempat' => 'GBK Hall Jakarta',
            'terms' => "
            <ol>
<li>
Tiket hanya dapat dibeli melalui Official Partner loket.com.<br>
Ticket can only be purchased from the Official Partner loket.com.
</li>
<li>
Satu transaksi memiliki MAKSIMAL pembelian 5 Tiket, tidak ada batasan transaksi untuk satu ID yang sama.<br>
1 (one) transaction can purchase a MAXIMUM of 5 (five) TICKETS, 1 (one) ID can repurchase the tickets more than 1 (one) time (no transaction limit).
</li>
<li>
Panitia/Penyelenggara/Promotor tidak bertanggung jawab atas pembelian Tiket melalui calo/tempat/kanal/platform/ yang bukan mitra resmi penjualan Tiket Bruno Major Tour of Planet Earth 2023.<br>
The Committee/Organizer/Promotor is not responsible for ticket purchased through brokers/channels/platform who are not the official partner selling TICKETS for The Bruno Major Tour of Planet.
</li>
<li>
Tiket tidak yang sudah dibeli tidak dapat dibatalkan atau diuangkan kembali dengan alasan apapun.<br>
Purchased tickets cannot be canceled or refunded for any reasons.
</li>
<li>
Ada 6 (enam) kategori Tiket yaitu Festival A dan Festival B tanpa kursi, serta Tribune A Right, Tribune A Left, Tribune B Right, Tribune B Left bersifat free seating (tidak ada nomor kursi).<br>
There are 6 (six) Ticket categories for Festival A and Festival B without seats. For Tribune A Right, Tribune A Left, Tribune B Right, Tribune B Left are free seats (no seat numbers).
</li>
<li>
Tiket tempat duduk yang dapat diakses/penyandang disabilitas tidak tersedia.<br>
Accessible seating/disabled access tickets are not available.
</li>
<li>
Anak dibawah umur 14 tahun wajib didampingi oleh orang tua atau wali, serta anak dibawah umur 6 tahun tidak diperkenankan masuk.<br>
Children under 14 years old must be accompanied by a parent or guardian, and children under 6 years old are not allowed to enter.
</li>
<li>
Penukaran Tiket dan waktu open gate akan diinfokan kembali oleh penyelenggara sebelum event berlangsung. Mohon untuk mengikuti sosial media penyelenggara.<br>
Ticket exchange and gate open time will be informed again by the organizer before the event takes place. Please follow the organizer's social media.
</li>
<li>
Penukaran tiket yang diwakili oleh pihak lain wajib menyertakan surat kuasa yang telah ditandatangani di atas materai Rp 10.000,- dan membawa fotokopi/scan foto KTP sesuai dengan nama yang tertera pada saat pembelian tiket.<br>
Ticket redemption by other parties must provide a power of attorney letter signed and attached with IDR 10.000,- stamp along with its authorizerâ€™s ID.
</li>
<li>
Penonton bertanggung jawab penuh terhadap keamanan diri dan semua barang-barang pribadinya.<br>
Ticket holders are fully responsible for the safety of themselves and all their personal belongings.
</li>
<li>
Penonton dilarang merekam dengan kamera profesional untuk kepentingan komersial.<br>
Ticket holders are prohibited from recording with a professional camera for commercial purposes.
</li>
<li>
Penonton dilarang mengambil foto menggunakan flash.<br>
Ticket holders are prohibited from taking photos using flash.
</li>
<li>
Penonton dilarang membawa senjata api, senjata tajam, dan benda-benda yang membahayakan.<br>
Ticket holders are prohibited from bringing firearms, sharp weapons, and dangerous objects.
</li>
<li>
Penonton dilarang membawa makanan dan minuman dari luar.<br>
Ticket holders are prohibited from bringing food and beverages from outside.
<li>
Sesuai dengan regulasi yang tertera pada Surat Edaran (SE) Satuan Tugas Penanganan Covid-19 20/2022, seluruh penonton wajib sudah menerima Vaksinasi Lengkap.<br>
In accordance with the regulations stated in the Circular Letter of the Covid-19 Handling Task Force 20/2022, all ticket holders must have received Complete Vaccination.
</li>
<li>
Especially for viewers aged 18 years and over, they must have received a Booster Vaccine.<br>
Especially for viewers aged 18 years and over, they must have received a Booster Vaccine.
</li>
<li>
Penyelenggara memiliki hak untuk:<br>
Promoter has the right to:
</li>
</ol>

<ul>
<li>
Melarang masuk penonton jika TIKET telah dipergunakan oleh orang lain/tidak valid.<br>
Prohibit ticket holders from entering if the TICKET has been used by someone else/is not valid.
</li>
<li>
Memproses atau mengajukan hukum, baik perdata atau kriminal kepada penonton yang mendapatkan TIKET dengan illegal termasuk memalsukan dan menggandakan TIKET yang sah atau mendapatkan TIKET dengan cara yang tidak sesuai prosedur.<br>
Process and prosecute in accordance with the prevailing civil or criminal provisions of ticket holders who obtained TICKETS illegally, including falsifying and duplicating valid TICKETS or obtaining TICKETS in unauthorized manner.
</li>
<li>
Dalam keadaan Force Majeure seperti bencana alam, kerusuhan, perang, wabah, dan semua keadaan darurat yang diumumkan secara resmi oleh Pemerintah, terkait kenaikan wabah covid, panitia/penyelenggara/promotor berhak untuk membatalkan dan/atau merubah waktu acara dan tata letak tempat tanpa pemberitahuan sebelumnya (TIKET tidak dapat direfund, tetapi bisa digunakan untuk pertunjukkan Bruno Major Tour of Planet Earth di waktu dan tempat yang lain).<br>
In Force Majeure circumstances such as natural disasters, riots, wars, epidemics, and all emergencies officially announced by the Government, related to an increase in the covid outbreak, the committee/organizer/promoter has the right to cancel and/or change the event time and venue layout without notification beforehand (TICKETS are non-refundable, but can be used for the Bruno Major Tour of Planet Earth show at another time and place).
</li>
<li>
Panitia/Penyelenggara/Promotor tidak bertanggung jawab atas kompensasi dan/atau biaya pembatalan untuk biaya perjalanan dan/atau penginapan yang Anda keluarkan apabila pertunjukkan dibatalkan atau ditunda.<br>
The Committe/Organizer/Promoter is not responsible for compensation and/or cancellation fees for travel and/or lodging expenses ticket holders purchased if the show is canceled or postponed.
</li>
<li>
Panitia/Penyelenggara/Promotor berhak untuk merevisi waktu acara, tata letak tempat, dan kapasitas penonton tanpa pemberitahuan sebelumnya.<br>
The committee/organizer/promoter reserves the right to revise the event time, venue layout and audience capacity without prior notification.
</li>
<li>
Panitia/Penyelenggara/Promotor berhak menindak tegas dan mengeluarkan pengunjung apabila tidak mematuhi peraturan yang berlaku, Do & Don'ts, menimbulkan kerusuhan, atau melanggar ketertiban umum.<br>
The committee/organizer/promoter has the right to take firm action and get ticket holders out of the venue if they do not comply with applicable regulations, Do & Don'ts, cause riots, or violate public order.
</li>
</ul>
            ",
        ];
    }
}
