<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/faq.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">

    <script src="js/jquery-3.3.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <title>Dompet-Qu - FAQ</title>
    <style>
    body {
      font-family: "roboto", sans-serif;
      height: 100%;
    }
    </style>
</head>
<body background="img\team.jpg">
	<nav>
		<ul>
        <a href="index" style="text-decoration: none; color: white;"><li>HOME</li></a>
		</ul>
	</nav>
	<div class="content">
		<h2 class="title">FaQ</h2>

		<div class="faq" id="satu">
			<h3>Apa itu Dompet-Qu ?</h3>
			<i class="fas fa-caret-right" style="float: right; font-size: 30px; margin-top:-25px;"></i>
		</div>
		<div class="faq" id="panel1">Dompet - Qu adalah aplikasi web pencatatan keuangan harian yang mempunyai fitur-fitur menarik untuk memonitoring keuangan harian anda. Direkomendasikan bagi para remaja yang kesulitan dalam melakukan pengelolaan keuangannya.</div>

		<div class="faq" id="dua">
			<h3>Apa saja fitur Dompet-Qu ?</h3>
			<i class="fas fa-caret-right" style="float: right; font-size: 30px; margin-top:-25px;"></i>
		</div>
		<div class="faq" id="panel2">Dompet - Qu memberikan berbagai yang mempermudah anda untuk mengatur keuangan harian anda seperti transaksi harian, rekening pribadi, dan monitoring keuangan berbentuk laporan berjangka waktu harian/mingguan/bulanan/tahunan.</div>

		<div class="faq" id="tiga">
			<h3>Bagaimana cara penggunaan Dompet-Qu ?</h3>
            <i class="fas fa-caret-right" style="float: right; font-size: 30px; margin-top:-25px;"></i>
		</div>
		<div class="faq" id="panel3">Pertama anda harus mendaftarkan diri terlebih dahulu. Setelah mendaftarkan diri, kita wajib login untuk mengakses aplikasi Dompet-Qu dan anda dapat mengelelo keuangan anda secara gratis dan tentunya mudah.</div>
	</div>
	
	 <!-- change icon -->
                <script>
                    $("#satu").click(function () {
                        $(this).find('i').toggleClass('fa-caret-down fa-caret-right');
                        if ($("#satu").not(this).find("i").hasClass("fa-caret-right")) {
                            $("#satu").not(this).find("i").toggleClass('fa-caret-down fa-caret-right');
                        }
                    });

                    $("#dua").click(function () {
                        $(this).find('i').toggleClass('fa-caret-down fa-caret-right');
                        if ($("#dua").not(this).find("i").hasClass("fa-caret-right")) {
                            $("#dua").not(this).find("i").toggleClass('fa-caret-down fa-caret-right');
                        }
                    });

                    $("#tiga").click(function () {
                        $(this).find('i').toggleClass('fa-caret-down fa-caret-right');
                        if ($("#tiga").not(this).find("i").hasClass("fa-caret-right")) {
                            $("#tiga").not(this).find("i").toggleClass('fa-caret-down fa-caret-right');
                        }
                    });
                </script>
         <!-- change icon -->
         <script>
         	$("#satu").click(function(){
  				$("#panel1").slideToggle("medium");
				});
         	$("#dua").click(function(){
  				$("#panel2").slideToggle("medium");
				});
         	$("#tiga").click(function(){
  				$("#panel3").slideToggle("medium");
				});
         </script>  

</body>
</html> 