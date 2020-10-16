<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
//FEATURED HOVER
$(document).ready(function(){
      $(".linkfeat").hover(
        function () {
            $(".textfeat").show(500);
        },
        function () {
            $(".textfeat").hide(500);
        }
    );
});

</script>

<style>
/*HYPER LINK*/
a:hover{
	
}
a, a:focus , a:hover{ 
  text-decoration: none;
  color: inherit;
}
 a:hover, .btn{
	outline:none!important;
}


/*CATEGORIES BADGE*/
.badge {
	font-weight: lighter;
	font-size: 13px;
	color: white;
	background-color: #000;
}

.linkfeat{
	background: rgba(76,76,76,0);
	background: -moz-linear-gradient(top, rgba(76,76,76,0) 0%, rgba(48,48,48,0) 49%, rgba(19,19,19,1) 100%);
	background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(76,76,76,0)), color-stop(49%, rgba(48,48,48,0)), color-stop(100%, rgba(19,19,19,1)));
	background: -webkit-linear-gradient(top, rgba(76,76,76,0) 0%, rgba(48,48,48,0) 49%, rgba(19,19,19,1) 100%);
	background: -o-linear-gradient(top, rgba(76,76,76,0) 0%, rgba(48,48,48,0) 49%, rgba(19,19,19,1) 100%);
	background: -ms-linear-gradient(top, rgba(76,76,76,0) 0%, rgba(48,48,48,0) 49%, rgba(19,19,19,1) 100%);
	background: linear-gradient(to bottom, rgba(76,76,76,0) 0%, rgba(48,48,48,0) 49%, rgba(19,19,19,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313', GradientType=0 );
}

.mg-2, .mg-4{
	margin-left:-20px;
}

.card {
    background-color: #ddd; 
    background-clip: border-box; 
    border: 0px solid rgba(0,0,0,.125);
    border-radius: 0rem;
}

.card-img{
    /* max-height:350px; */
    border:0;
    border-radius:0;
    border:0px #fff solid;
}


</style>

<div class="bg-white py-2" style="margin-top:70px;">
<div class="container">
<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-6  featcard mt-0 pr-1">
	   <div id="featured" class="carousel slide carousel-fade" data-ride="carousel">
 		 <div class="carousel-inner">
<div class="carousel-item active">			  <div class="card bg-dark text-white">
		        <img class="card-img img-fluid" src="http://pastorchrisonline.org/homeAdmin/uploads/salpc-2018-new.jpg" alt="">
		        <div class="card-img-overlay d-flex linkfeat">
		          <a href="#" class="align-self-end">
		        	
		            <h4 class="card-title">Review GSP: Amerika Ingin Perdagangan Saling Menguntungkan</h4>
		            <p class="textfeat" style="display: none;">makro.id – Duta Besar Amerika Serikat untuk Indonesia Joseph R. Donovan menegaskan, langkah pemerintah Amerika Serikat meninjau ulang pemberian Generalized System od Preferenes (GSP) akan menguntungkan kedua belah pihak.

Menurut Donovan,</p>
		          </a>
		        </div>
		      </div>
	  		</div>
	  	<div class="carousel-item">			  <div class="card bg-dark text-white">
		        <img class="card-img img-fluid" src="http://pastorchrisonline.org/homeAdmin/uploads/pastor-benny2-new.jpg" alt="">
		        <div class="card-img-overlay d-flex linkfeat">
		          <a href="#" class="align-self-end">
		        
		            <h4 class="card-title">DPR Setujui Penambahan Anggaran BP Batam Rp565 Miliar</h4>
		            <p class="textfeat" style="display: none;">makro.id - Dewan Perwakilan Rakyat (DPR) menyetujui penambahan anggaran Badan Pengusahaan (BP) Batam Rp565 miliar. Dengan penambahan anggaran di tahun 2019 tersebut diharapkan dapat mendorong percepatan pembangunan Kota Batam.

Anggota Komisi</p>
		          </a>
		        </div>
		      </div>
	  		</div>
	  	<div class="carousel-item">			  <div class="card bg-dark text-white">
		        <img class="card-img img-fluid" src="http://pastorchrisonline.org/homeAdmin/uploads/586X490rhapathon1a.jpg" alt="">
		        <div class="card-img-overlay d-flex linkfeat">
		          <a href="#" class="align-self-end">
		        
		            <h4 class="card-title">BTN Targetkan Seribu Nasabah Valas di Batam</h4>
		            <p class="textfeat" style="display: none;">makro.id - Bank Tabungan Negara (Persero) resmi merilis tabungan valuta asing (valas) di Batam. Sebagai daerah yang berbatasan langsung dengan Singapura dan sebagai pintu gerbang wisatawan mancanegara (wisman), transaksi valas</p>
		          </a>
		        </div>
		      </div>
	  		</div>
	  	<div class="carousel-item">			  <div class="card bg-dark text-white">
		        <img class="card-img img-fluid" src="http://pastorchrisonline.org/homeAdmin/uploads/586X490rhapathon2a.jpg" alt="">
		        <div class="card-img-overlay d-flex linkfeat">
		          <a href="#" class="align-self-end">
		            <h4 class="card-title">Ministers Discuss Impact of Rhapsody of Realities...</h4>
		            <p class="textfeat" style="display: none;">Role of Messenger Angel in church growth and evangelism around the world discussed during Rhapathon.</p>
		          </a>
		        </div>
		      </div>
	  		</div>
	  	
	  		  	</div>
	  </div>
	</div>
	<div class="col-sm-12 col-md-12 col-lg-6 py-0 px-1 d-none d-lg-block">
		<div class="row">
			<div class="col-6 pb-1 pr-2 mg-1">
				<div class="card bg-dark text-white">
		        <img class="card-img img-fluid" src="http://pastorchrisonline.org/homeAdmin/uploads/586X490rhapathon2a.jpg" alt="">
		        <div class="card-img-overlay d-flex linkfeat">
		          <a href="#" class="align-self-end">
		        	
		            <h6 class="card-title ">BI Atur Standarisasi QR Code</h6>
		          </a>
		        </div>
		      	</div>
			</div>
						<div class="col-6 pr-2 pb-1 mg-2">
				<div class="card bg-dark text-white">
		        <img class="card-img img-fluid" src="http://pastorchrisonline.org/homeAdmin/uploads/salpc-2018-new.jpg" alt="">
		        <div class="card-img-overlay d-flex linkfeat">
		          <a href="#" class="align-self-end">
		        	
		            <h6 class="card-title">PTSP BP Batam Masuk 10 Terbaik di Indonesia</h6>
		          </a>
		        </div>
		      	</div>
			</div>
						<div class="col-6 pr-2 pb-1 mg-3">
				<div class="card bg-dark text-white">
		        <img class="card-img img-fluid" src="http://pastorchrisonline.org/homeAdmin/uploads/586X490rhapathon1a.jpg" alt="">
		        <div class="card-img-overlay d-flex linkfeat">
		          <a href="#" class="align-self-end">
		        	
		            <h6 class="card-title">Review GSP: Amerika Ingin Perdagangan Saling Menguntungkan</h6>
		          </a>
		        </div>
		      	</div>
			</div>
						<div class="col-6 pr-2 pb-1 mg-4">
				<div class="card bg-dark text-white">
		        <img class="card-img img-fluid" src="http://pastorchrisonline.org/homeAdmin/uploads/pastor-benny2-new.jpg" alt="">
		        <div class="card-img-overlay d-flex linkfeat">
		          <a href="#" class="align-self-end">
		            <h6 class="card-title">Ministers Discuss Impact of Rhapsody of Realities...</h6>
		          </a>
		        </div>
		      	</div>
			</div>
					</div>
	</div>
</div>
</div>
</div>