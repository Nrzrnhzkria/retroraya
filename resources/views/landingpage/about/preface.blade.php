@extends('layouts.app')

@section('title')
    About Us
@endsection

@section('content')

<div class="container py-4">
    <div class="row px-2">
        <div class="card px-4 py-4" style="background-image: url('{{ asset('assets/img/about/orgbg.png') }}'); background-repeat: no-repeat; background-position: bottom;">
            <div class="row pb-4">
                <div class="col-md-12 text-center">        
                    <img class="img-fluid" src="{{ asset('assets/img/about/ds_abuhasan.png') }}" alt="" style="width: 20rem">
                </div>
            </div>

            <div class="text-center fw-bold px-2 py-2" style="background-color: orange">OPENING REMARKS BY YBHG DATO' SERI ABU HASAN BIN MOHD NOR</div>

            <div class="row fw-bold p-4">
                <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;Alhamdulillah, All praises are to Allah, the Merciful, the All Beneficient, by
                    Grace and Blessings who has favoured us and of His believing servants and still giving me an  opportunity and strength to lead the DEWAN PERNIAGAAN USAHAWAN KECIL MALAYSIA (DPUKM), and for those desiring entrepreneurs a long way in winning over their trust and building a strong connection between each other through DPUKM especially in community and Malaysia. 
                </p> 
                <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;Despite, Congratulation and deepest gratitude to Members of Highest Council for the commitment and contribution in realizing the vision and mission DPUKM in inventing a best platform as an opportunities for ambitious start-up, prosperous entrepreneur and venture professionals in Malaysia. Whilst juggling with career and personal life, as entrepreneurs focus on relational value such as building network and expanding circle of acquaintances should be nurture and keep in view/adopted. To ensure equitable economic development to the entrepreneurs and produce balance business and industry ecosystem to strengthen and enhance cooperation of entrepreneurs, numerous activities and  workforce are arranged by me and Members of Highest Council.  
                </p> 
                <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;As human being, our life is mapped out on the plans and decisions of Allah SWT and  as human being we can comprehend it only as far as Allah permits to do so . Despite, we should not discourage and strive to achieve what we aspire to, while recognizing that Allah has the perfect plan.
                </p>
            </div>

            <div class="row fw-bold p-4">
                <p style="text-align: justify;"><em>
                    &nbsp;&nbsp;&nbsp;&nbsp;Syukur alhamdulillah saya panjatkan ke hadrat llahi dengan limpah dan kurniaNya masih lagi
diberikan kesempatan dan kekuatan untuk memimpin Dewan Perniagaan Usahawan Kecil Malaysia (DPUKM), semoga dikuatkan semangat untuk terus mengeratkan silaturrahim di antara usahawan-usahawan di dalam DPUKM khususnya dan seluruh Malaysia amnya.</em></p>

                <p style="text-align: justify;"><em> &nbsp;&nbsp;&nbsp;&nbsp;Syabas dan terima kasih diucapkan kepada semua Ahli Majlis Tertinggi DPUKM kerana bersama-sama saya dalam merealisasikan visi dan misi DPUKM supaya menjadi platform terbaik bagi semua usahawan di Malaysia sama ada yang baru memulakan perniagaan mahupun yang sudah berjaya dalam perniagaan masing-masing. Di dalam kita semua mengharungi kehidupan yang semakin sibuk dengan tugas-tugas harian, ktia juga terikat dengan tuntutan untuk memperbaiki dan merapatkan silaturrahim di antara semua usahawan. Saya dan Ahli Majlis Tertinggi telah mengatur beberapa aktiviti dan gerak kerja demi membuka ruang dan peluang kepada usahawan-usahawan supaya lebih berjaya dan berdaya saing di dalam dunia perniagaan yang semakin mencabar dewasa ini. 
                </em></p>

                <p style="text-align: justify;"><em>&nbsp;&nbsp;&nbsp;&nbsp;Sesungguhnya manusia hanya boleh merancang, namun Allah jua yang menentukan segalanya. Oleh itu, kita sewajarnya terus berusaha dan tidak merasa jemu untuk mencapai apa yang kita cita-citakan, 
                Sekian, wassalam.</em></p>
            </div>

            <div class="row fw-bold p-4">
                <p>YBHG DATO' SERI ABU HASAN BIN MOHD NOR</p>
                <img class="img-fluid" src="{{ asset('assets/img/about/signature.png') }}" alt="" style="width: 10rem">
                <p>President</p>
            </div>
        </div>
    </div>
</div>

@endsection