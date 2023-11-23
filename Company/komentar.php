<?php
	
	include 'config.php';

	if (isset($_POST['post_comment'])) {
    $name = $_POST['name'];
    $message = $_POST['message'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];


    // Menyimpan gambar berdasarkan pilihan gender
    $imagePath = ($gender === 'Pria') ? 'image/cowo-removebg-preview.png' : 'image/cewe-removebg-preview.png';

    $sql = "INSERT INTO demo (name, message, gender, image_path, email)
    VALUES ('$name', '$message', '$gender', '$imagePath', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
  ?>
<!--   
        if (isset($_POST['post_comment'])) {

    $name = $_POST['name'];
    $message = $_POST['message'];

    $sql = "INSERT INTO demo (name, message)
    VALUES ('$name', '$message')";

    if ($conn->query($sql) === TRUE) {
    echo "";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    } -->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="coment.css">  -->
<style>
    /* Tambahkan gaya untuk latar belakang */
body {
    background-color: white; /* Ganti dengan warna latar belakang yang Anda inginkan */
}

/* Atur desain card */
.card {
    margin-top: 1px;
}

/* Atur desain komentar */
.blok {
    border: 1px solid #dee2e6;
    border-radius: 10px;
}

/* Atur desain tombol */
.btn-primary,
.btn-secondary {
    margin-top: 10px;
}

</style>
    <title>Document</title>
</head>
<body>
<script>
    // This JavaScript is for handling the click event manually and highlighting the active link.
    document.addEventListener("DOMContentLoaded", function () {
      const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
      navLinks.forEach(function (link) {
        link.addEventListener("click", function () {
          navLinks.forEach(function (link) {
            link.classList.remove("active");
          });
          this.classList.add("active");
        });
      });
    });
  </script>

     <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary ">
        <div class="container">
        <a class="navbar-brand" href="#">

<img src="image/Screenshot_2023-11-17_201931-removebg-preview.png" alt="" width="45" height="45" class="d-inline-block align-text-center">

VGosy

</a>

          <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header bg-dark">
              <h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel">MENU</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
           
            <div class="offcanvas-body bg-primary">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.html#Hom">BERANDA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html#Ten">TENTANG KAMI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html#Jasa">JASA DAN BARANG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html#Lok">LOKASI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html#Cont">KONTAK</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="komentar.php">KOMENTAR</a>
                        </li>
                        <li class="nav-item">
                            <!-- <a class="nav-link" href="admin.php">ADMIN LOGIN</a> -->
                        </li>
                    </ul>

                  </div>

            </div>
          </div>
        </div>
      </nav>
<div style="height: 20vh; display: flex; flex-direction: column; align-items: center; justify-content: center;"
   ></div>
      <div class="container" style="height: 100vh; ">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <!-- <h5 class="card-title">Form Komentar</h5> -->
                    <form action="" method="post" class="form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama " required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                      

                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" class="form-select" id="gender" required>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>

                        <div class="mb-3">
              <label for="message" class="form-label">Pesan</label>
                      <textarea name="message" class="form-control"  id="message"rows="2" placeholder="Pesan" required></textarea>
            </div>
                        <button type="submit" class="btn btn-primary" name="post_comment">Post Komentar</button>
                        <!-- <a class="btn btn-secondary" href="#isi">Lihat Komentar</a> -->
                        <button id="showCommentsButton" class="btn btn-secondary" type="button">Lihat Komentar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

      <!-- <div class="wrapper">
		<form action="" method="post" class="form">
			<input type="text" class="name" name="name" placeholder="Name">
			<br>
			<textarea name="message" cols="30" rows="10" class="message" placeholder="Message"></textarea>
			<br>
			<button type="submit" class="btn" name="post_comment">Post komentar</button>
			<a class="btn" style="text-decoration:none" href="#isi"> Lihat Komentar	
			</a>	
		</form> -->
	</div>

	<!-- <div class="content">
  <div class="row">
        <div class="col-md-12">
            <h1 class="isi text-center" id="isi"> KOMENTAR</h1>
        </div>
    </div> -->
		<?php

			$sql = "SELECT * FROM demo";
			$result = $conn->query($sql);
    //   date_default_timezone_set('Asia/Jakarta');

    //   $sql = "SELECT * FROM demo";
    //   $result = $conn->query($sql);
    //   $waktu_sekarang = time();
       ?>

<div class="container" id="commentsContainer" style="display: none;">
    <div class="row">
        <div class="col-md-12">
            <h1 class="isi text-center" id="isi">KOMENTAR</h1>
        </div>
    </div>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="row">';
            echo '  <div class="col-md-8 offset-md-2">';
            echo '    <div class="blok card mb-3">';
            echo '      <div class="card-body">';
            echo '        <div class="row">';
            echo '          <div class="col-md-2">';
            echo '            <!-- Tampilkan gambar gender berdasarkan pilihan -->';
            if ($row['gender'] === 'Pria') {
                echo '<img src="' . $row['image_path'] . '" alt="Pria" width="100" height="100" class="img-fluid  rounded-circle">';
            } else {
                echo '<img src="' . $row['image_path'] . '" alt="Wanita" width="100" height="200" class="img-fluid  rounded-circle">';
            }
            echo '          </div>';
            echo '          <div class="col-md-10">';
            echo '            <h5 class="card-title">' . $row['name'] . '</h5>';
            echo '          </div>';
            echo '            <p class="card-text mt-3" id="message">' . $row['message'] . '</p>';
            echo '        </div>';
            echo '      </div>';
            echo '      <div class="card-footer text-muted">';
            echo '        ' . $row['waktu'];
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        }
    }
    ?>
</div>

    <script>
        document.getElementById("showCommentsButton").addEventListener("click", function() {
            const commentsContainer = document.getElementById("commentsContainer");
            commentsContainer.style.display = "block";

           
            commentsContainer.scrollIntoView({ behavior: "smooth" });
        });

        // Daftar kata-kata yang akan diganti
        
        var sensor = ["ancuk","ancok","ajig","anjay","anjg","anjing","anying","anjir","asu","asyu","babangus","babi","bacol","bacot","bagong","bajingan","balegug","banci","bangke","bangsat","bedebah","bedegong","bego","belegug","beloon","bencong","bloon","blo'on","bodoh","boloho","buduk","budug","celeng","cibai","cibay","cocot","cocote","cok","cokil","colai","colay","coli","colmek","conge","congean","congek","congor","cuk","cukima","cukimai","cukimay","dancok","entot","entotan","ewe","ewean","gelo","genjik","germo","gigolo","goblo","goblog","goblok","hencet","henceut","heunceut","homo","idiot","itil","jancuk","jancok","jablay","jalang","jembut","jiancok","jilmek","jurig","kacung","kampang","kampret","kampungan","kehed","kenthu","kentot","kentu","keparat","kimak","kintil","kirik","kunyuk","kurap","konti","kontol","kopet","koplok","lacur","lebok","lonte","maho","meki","memek","monyet","ndas","ndasmu","ngehe","ngentot","nggateli","nyepong","ngewe","ngocok","pante","pantek","patek","pathek","peju","pejuh","pecun","pecundang","pelacur","pelakor","peler","pepek","puki","pukima","pukimae","pukimak","pukimay","sampah","sepong","sial","sialan","silit","sinting","sontoloyo","tai","taik","tempek","tempik","tete","tetek","tiembokne","titit","toket","tolol","ublag","udik","wingkeng"];
        
        // var sensor = ["3gp","3some","4some","*damn","*dyke","*fuck*","*shit*","@$$","adult","ahole","akka","amcik","anal","anal-play","analingus","analplay","androsodomy","andskota","anilingus","anjing","anjrit","anjrot","anus","arschloch","arse","arse*","arsehole","ash0le","ash0les","asholes","ass","ass","ass monkey","ass-playauto-eroticism","asses","assface","assh0le","assh0lez","asshole","asshole","assholes","assholz","asslick","assplay","assrammer","asswipe","asu","ashu","washu","wasu","wasuh","autofellatio","autopederasty","ayir","azzhole","badass","b00b","b00b*","b00bs","b1tch","b17ch","b!+ch","b!tch","babami","babes","bego","babi","bagudung","bajingan","ball-gag","ballgag","banci","bangla","bangsat","bareback","barebacking","bassterds","bastard","bastards","bastardz","basterds","basterdz","bacot","bloon","bdsm","beastilaity","bejad","bejat","bencong","bestiality","bi7ch","bi+ch","biatch","bikini","birahi","bitch","bitch","bitch*","bitches","blow job","blow-job","blowjob","blowjob","blowjobs","bodat","boffing","bogel","boiolas","bokep","bollock","bollock*","bondage","boner","boob","boobies","boobs","borjong","breas","breasts","brengsek","buceta","bugger","buggery","bugil","bukake","bukakke","bull-dyke","bull-dykes","bulldyke","bulldykes","bungul","burit","butt","butt-pirate","butt-plug","butt-plugs","butthole","buttplug","buttplugs","butts","buttwipe","c0ck","c0cks","c0k","cabron","cameltoe","cameltoes","carpet muncher","cawk","cawks","cazzo","cerita dewasa","cerita hot","cerita panas","cerita seru","chick","chicks","chink","choda","chraa","chudai","chuj","cipa","cipki","clit","clit","clitoris","clits","cnts","cntz","cock","cock*","cock-head","cock-sucker","cockhead","cocks","cocksucker","coli","cok","coprophagy","coprophilia","cornhole","cornholes","corpophilia","corpophilic","crack","crackz","crap","cream-pie","creampie","creamypie","cum","cumming","cumpic","cumshot","cumshots","cunilingus","cunnilingus","cunt","cunt*","cunts","cuntz","cukimay","cukimai","d4mn","damn","dancuk","daniel brou","david neil wallace","daygo","deepthroat","defecated","defecating","defecation","dego","desnuda","dick","dick","dick*","dicks","dike","dike*","dild0","dild0s","dildo","dildoes","dildos","dilld0","dilld0s","dirsa","dnwallace","doggystyle","dominatricks","dominatrics","dominatrix","douche","douches","douching","dupa","dyke","dykes","dziwka","ejackulate","ejakulate","ekrem","ekrem*","ekto","ekto","enculer","enema","enemas","erection","erections","erotic","erotica","f u c k","f u c k e r","facesit","facesitting","facial","facials","faen","fag","fag1t","fag*","faget","fagg0t","fagg1t","faggit","faggot","fagit","fags","fagz","faig","faigs","fanculo","fanny","fart","farted","farting","fatass","fcuk","feces","feg","felch","felcher","felcher","felching","fellatio","fetish","fetishes","ficken","fisting","fitt*","flikker","flikker","flipping the bird","footjob","foreskin","fotze","fotze","foursome","fu(*","fuck","fuck","fucker","fuckin","fucking","fucking","fucks","fudge packer","fuk","fuk*","fukah","fuken","fuker","fukin","fukk","fukkah","fukken","fukker","fukkin","futkretzn","fux0r","g00k","g-spot","gag","gang-bang","gangbang","gay","gayboy","gaygirl","gays","gayz","gembel","genital","genitalia","genitals","gila","gigolo","goblok","girl","glory-hole","glory-holes","gloryhole","gloryholes","god-damned","gook","groupsex","gspot","guiena","h0ar","h0r","h0re","h00r","h4x0r","hand-job","handjob","hardcore","hate","heang","hell","hells","helvete","hencet","henceut","hentai","hitler","hoar","hoer","hoer*","homosexual","honkey","hoor","hoore","hore","horny","hot girl","hot video","hubungan intim","huevon","huevon","hui","idiot","incest","injun","intercourse","interracial","itil","jablay","jablai","jackass","jackoff","jancuk","jancok","j4ncok","jap","japs","jebanje","jembut","jerk-off","jisim","jism","jiss","jizm","jizz","joanne yiokaris","kacuk","kampang","kampret","kanciang","kanjut","kancut","kanker*","kankerkinky","kawk","kelamin","kelentit","keparat","kike","kimak","klimak","klimax","klitoris","klootzak","knob","knobs","knobz","knulle","kolop","kontol","kontol","kraut","kripalu","kuk","kuksuger","kunt","kunts","kuntz","kunyuk","kurac","kurac","kurwa","kusi","kusi*","kyrpa","kyrpa*","l3i+ch","l3itch","labia","labial","lancap","lau xanh","lesbi","lesbian","lesbians","lesbo","lezzian","lipshits","lipshitz","lolita","lolitas","lonte","lucah","maho","matamu","malam pengantin","malam pertama","mamhoon","maria ozawa","masochism","masochist","masochistic","masokist","massterbait","masstrbait","masstrbate","masterbaiter","masterbat3","masterbat*","masterbate","masterbates","masturbat","masturbat*","masturbate","masturbation","memek","memek","merd*","mesum","mibun","mofo","monkleigh","motha fucker","motha fuker","motha fukkah","motha fukker","mother fucker","mother fukah","mother fuker","mother fukkah","mother fukker","mother-fucker","motherfisher","motherfucker","mouliewop","muff","muie","mujeres","mulkku","muschi","mutha fucker","mutha fukah","mutha fuker","mutha fukkah","mutha fukker","n1gr","naked","nastt","nazi","nazis","necrophilia","nenen","nepesaurio","ngecrot","ngegay","ngentot","ngentot","ngewe","ngocok","ngulum","nigga","nigger","nigger*","nigger;","niggers","nigur;","niiger;","niigr;","nipple","nipples","no cd","nocd","nude","nudes","nudity","nutsack","nympho","nymphomania","nymphomaniac","orafis","orgasim;","orgasm","orgasms","orgasum","orgies","orgy","oriface","orifice","orifiss","orospu","p0rn","packi","packie","packy","paki","pakie","paky","pantat","pantek","paska","paska*","pecker","pecun","pederast","pederasty","pedophilia","pedophiliac","pee","peeenus","peeenusss","peeing","peenus","peinus","pemerkosaan","pen1s","penas","penetration","penetrations","penis","penis","penis-breath","pentil","penus","penuus","pepek","perek","perse","pervert","perverted","perverts","pg ishazamuddin","phuc","phuck","phuck","phuk","phuker","phukker","picka","pierdol","pierdol*","pilat","pillu","pillu*","pimmel","pimpis","piss","piss*","pizda","polac","polack","polak","poonani","poontsee","poop","porn","pr0n","pr1c","pr1ck","pr1k","precum","preteen","prick","pricks","prostitute","prostituted","prostitutes","prostituting","puki","pukimak","pula","pule","pusse","pussee","pussies","pussy","pussy","pussylips","pussys","puta","puto","puuke","puuker","qahbeh","queef","queef*","queer","queers","queerz","qweef","qweers","qweerz","qweir","racist","rape","raped","rapes","rapist","rautenberg","recktum","rectum","retard","rimjob","s.o.b.","sabul","sadism","sadist","sarap","scank","scat","schaffer","scheiss","scheiss*","schlampe","schlong","schmuck","school","screw","screwing","scrotum","sekolah menengah shan tao","seks","semen","sempak","senggama","sepong","setan","setubuh","sex","sexy","sh1t","sh1ter","sh1ts","sh1tter","sh1tz","sh!+","sh!t","sh!t","sh!t*","sharmuta","sharmute","shemale","shi+","shipal","shit","shits","shitter","shitty","shity","shitz","shiz","shyt","shyte","shytty","shyty","silit","sinting","sixty-nine","sixtynine","skanck","skank","skankee","skankey","skanks","skanky","skribz","skurwysyn","slag","slut","sluts","slutty","slutty","slutz","smut","sodomi","sodomize","sodomy","softcore","son-of-a-bitch","spank","spanked","spanking","sperm","sphencter","spic","spierdalaj","splooge","squirt","squirted","squirting","strap-on","strapon","submissive","suck","suck-off","sucked","sucking","sucks","suicide","suka","taek","tai","tanpa busana","taptei","teets","teez","teho","telanjang","testical","testicle","testicle*","testicles","tetek","tetek","threesome","tit","titit","tits","titt","titt*","titties","titty","tittys","togel","toket","tolol","topless","totong","tranny","transsexual","transvestite","tukar istri","tukar pasangan","turd","tusbol","twat","twats","twaty","twink","upskirt","urinated","urinating","urination","va1jina","vag1na","vagiina","vagina","vagina","vaginas","vaj1na","vajina","vibrator","vittu","vullva","vulva","w0p","w00se","wank","wank*","wanking","warez","watersports","wetback*","wh0re","wh00r","whoar","whore","whores","wichser","wop*","wtf","x-girl","x-rated","xes","xrated","xxx","yed","zabourah","bangke"];
        // Fungsi untuk mengganti kata-kata dalam elemen HTML
        function replaceTextInElements(elements) {
            elements.forEach(function(element) {
                // Mengambil teks dari elemen
                var originalText = element.textContent;

                // Mengganti kata-kata menggunakan ekspresi reguler dan fungsi penggantian kustom
                var newText = originalText.replace(new RegExp(sensor.join('|'), 'gi'), function(match) {
                // Menghasilkan jumlah asterisk yang sesuai dengan panjang kata yang disensor
                return '*'.repeat(match.length);
                });

                // Menetapkan teks yang telah diganti kembali ke elemen
                element.textContent = newText;
            });
        }

        // Mengambil semua elemen <p> dengan id="message"
        var messageElements = document.querySelectorAll('p#message');

        // Mengganti kata-kata dalam elemen-elemen yang dipilih
        replaceTextInElements(messageElements);

    </script>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
		integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
		crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
		integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
		crossorigin="anonymous">
	</script>
</body>
</html>