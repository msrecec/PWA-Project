-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2021 at 01:30 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(16, 'user_account', 'user_account', 'user_account', '$2y$10$WreHdXywWq2Hl/mJqast0eeje3aso.V0j5dpMO8nbYQFksAd9SEw2', 0),
(17, 'admin_account', 'admin_account', 'admin_account', '$2y$10$VXU2UgG9axS/0Ln9XRtYX.sgHD5byPnfggI304sWGH30Ft9GdvuXS', 1),
(20, 'Mislav', 'Srečec', 'mislav', '$2y$10$CggaCd1w4wN93G.36s713OcL9BUKtahy5dgP/DvEYb6E77ywR6FFK', 0),
(21, 'test123', 'test123', 'test123', '$2y$10$3hpl7bAQojZ1gitgWsZZPuqYURAuXoJritFVLk5Bfghefc3qRMPUq', 0),
(22, 'test789', 'test789', 'test789', '$2y$10$e2U5WgS19KurREREI/0gOuEaJTpkHC3YWrrxmCRPkJxkv8vFZb1ZG', 0),
(23, 'test111', 'test111', 'test111', '$2y$10$JkElUOgwjdEddLVswW5bP.Onj2hrGW27Gw1oTYUhGdCD77wuZny56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

DROP TABLE IF EXISTS `vijesti`;
CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(43, '2021/06/11 22:41:01', 'Dodijeljeni su Pulitzeri', 'Reuters i The Atlantic podijeli su nagradu <br />\r\n', 'The Minneapolis Star Tribune dobitnik je Pulitzerove nagrade za prijelomnu vijest i praćenje ubojstva Georgea Floyda, a Reuters i The Atlantic podijeli su nagradu za tzv. eksplanatorno izvještavanje, objavio je u petak odbor koji dodjeljuje to priznanje.<br />\r\n<br />\r\nPulitzerove nagrade su najprestižnija priznanja koja se američkom novinarstvu dodjeljuju od 1917. Ustanovio ih je svojom oporukom novinski izdavač Joseph Pulitzer.<br />\r\n<br />\r\n\"Novinske kuće bile su suočene sa složenošću uzastopnog praćenja globalne pandemije, rasnog osvješćivanja i žestoko osporavanih predsjedničkih izbora\", kazala je Mindy Marquesa, dopredsjednica Odbora Pulitzerove nagrade.<br />\r\n<br />\r\nNovinari Reutersa Andrew Chung, Lawrence Hurley, Andrea Januta, Jaimi Dowdell i Jackie Botts nagrađeni su za multimedijski projekt \"Shielded\" , u kojem razotkrivaju kako se policija štiti od sudskog progona u slučajevima pretjerane upotrebe sile.<br />\r\n<br />\r\nNovinar Ed Yong iz The Atlantica dobio je nagradu za izvještavanje o pandemij covida-19.<br />\r\n<br />\r\nOdbor je također dodijelio \"posebnu pohvalu\" tinejdžerici Darnelli Frazier koja je mobitelom snimila ubojstvo Floyda. Njezin čin, objasnio je Odbor, pokazuje \"ključnu ulogu građana u novinarskoj potrazi za istinom i pravdom\".<br />\r\n<br />\r\nPulitzerova nagrada dobitnicima donosi po 15.000 dolara.', '/projekt/uploads/images/43.jpg', 'SVIJET', 0),
(44, '2021/06/11 22:28:25', 'Prvi dan summita čelnika G7', 'Prvi sastanak licem u lice nakon dvije godine ', 'Lideri G7 okupili su se na trodnevnom summitu u petak 11. lipnja u Crobis Bayu u Cornwallu, popularnom turističkom odredi&scaron;tu uz more na jugozapadu Engleske. Prvi je to sastanak uživo od početka pandemije vodećih ekonomija svijeta - Japana, Ujedinjenog Kraljevstva, Kanade, Italije, Njemačke i Francuske. Glavna tema sastanka bit će oporavak svijeta od pandemije i borba protiv klimatskih promjena.<br />\r\n<br />\r\nAmerički predsjednik Joe Biden, kojemu je ovo prvo putovanje u Europu od početka mandata, izjavio je prvog dana summita kako se nada da će &#039;&#039;učvrstiti američku predanost multilateralizmu te zajednički raditi sa saveznicima i partnerima kako bi se izgradila pravednija i uključiva globalna ekonomija&#039;&#039;. Summit je Bidneova prilika za obnovu diplomacije SAD-a nakon ere Trumpova izolacionizma.<br />\r\n<br />\r\nDokaz tome je i &#039;&#039;Atlantska povelja&#039;&#039; koju su Biden i britanski premijer Boris Johnson usvojili u četvrtak po uzoru na pakt koji su potpisali njihovi prethodnici iz Drugog svjetskog rata. Biden je rekao novinarima u Cornwallu da će se revitalizirana povelja baviti &#039;&#039;ključnim izazovima ovog stoljeća: kibernetičkom sigurno&scaron;ću, novim tehnologijama, globalnim zdravljem i klimatskim promjenama&#039;&#039;.<br />\r\n<br />\r\nJohnson je rekao u intervjuu za BBC da bi savez između Ujedinjenog Kraljevstva i SAD-a trebao biti prepoznat kao &#039;&#039;neuni&scaron;tiv odnos&#039;&#039;. Ipak, &scaron;to se tiče pitanja o rje&scaron;avanju napetosti oko provođenja protokola u Sjevernoj Irskoj, inzistirao je na tome da ga američki predsjednik nije ukorio.<br />\r\n<br />\r\nOčekivalo se da će napetosti između lidera na summitu izazvati Sjevernoirski protokol - dio sporazuma o Brexitu koji sprečava provjere duž irske granice. Aranžmani o provjerama dogovoreni su sporazumom o povlačenju 2019. godine, ali Velika Britanija otada je tražila veću fleksibilnost. Biden je ranije upozorio da novi aranžmani ne bi trebali ugroziti mirovni sporazum o Velikom petku. <br />\r\n<br />\r\nO&scaron;tri tonovi iz Europe<br />\r\nPredsjednica komisije Ursula von der Leyen u četvrtak je rekla da je protokol &#039;&#039;jedino rje&scaron;enje&#039;&#039; te ga treba provesti u potpunosti. Francuski predsjednik Emmanuel Macron u četvrtak navečer je upozorio premijera da će staviti veto na svaki poku&scaron;aj ponovnih pregovora o sporazumu o Brexitu oko Sjeverne Irske.<br />\r\n<br />\r\nNa njegovu izjavu žestoko je reagirao britanski ministar vanjskih poslova Dominic Raab koji je izjavio &#039;&#039;da bilo kakve promjene moraju doći sa strane EK&#039;&#039; te da neće &#039;&#039;cjenkati integritet Ujedinjenog Kraljevstva&#039;&#039;. <br />\r\n<br />\r\nU međuvremenu se i Johnson sastao s kanadskim premijerom Justinom Trudeauom te su istaknuli da je sklapanje trgovinskog sporazuma hitno.<br />\r\n<br />\r\nKlimatski aktivisti<br />\r\nKako pobuna u Downing Streetu raste zbog britanskog smanjenog proračuna za inozemnu pomoć sa 0,7 posto na 0,5 posto BDP-a, Johnson je uoči summita G7 najavio da će Britanija donirati vi&scaron;e od 100 milijuna doza cjepiva u siroma&scaron;nije zemlje do kraja ove godine. <br />\r\n<br />\r\nBiden je također obećao 500 milijuna doza cjepiva Pfizer. Očekuje se da će Johnson pozvati i ostale svjetske čelnike da doniraju milijarde doza cjepiva.<br />\r\n<br />\r\n- Nadam se da će se moji kolege izjasniti na sličan način kako bismo zajedno cijepili svijet do kraja sljedeće godine i bolje se za&scaron;titili od koronavirusa - rekao je Johnson.<br />\r\n<br />\r\nNa summitu se očekuje da će čelnici odobriti minimalnu globalnu stopu poreza na dobit nakon &scaron;to su se ministri financija na sastancima pro&scaron;li vikend dogovorili o stopi od 15%. Navečer će se lideri odazvati prijemu kraljice Elizabete II.<br />\r\n<br />\r\nSummit nije pro&scaron;ao mirno jer se u St. Ivesu okupila grupa klimatskih prosvjednka koji smatraju da lideri država iz skupine G7 ne poduzimaju dovoljno klimatskih akcija. ', '/projekt/uploads/images/44.jpg', 'SVIJET', 0),
(45, '2021/06/11 22:31:15', 'BiH strancima olakšala ulazak ', 'Sada će se u BiH moći ulaziti', 'Vijeće ministara Bosne i Hercegovine u petak je olak&scaron;alo ulazak stranaca u zemlju, nakon vi&scaron;e prosvjeda turističkih radnika koji to smatraju ključnim za spas sezone.<br />\r\n<br />\r\nOd listopada pro&scaron;le godine, u BiH su zbog sprječavanja &scaron;irenja koronavirusa mogli ući stranci s negativnim PCR testom. Negativan test bio je obvezan i za državljane BiH te susjednih zemalja Hrvatske, Srbije i Crne Gore.<br />\r\n<br />\r\nOsim PCR-a, sada će se u zemlju moći ulaziti i s negativnim antigenskim testom, potvrdom o cijepljenju ili potvrdom da su preboljeli covid-19. <br />\r\n<br />\r\nBo&scaron;njački ministri Bisera Turković i Sifet Podžić dvaput su u posljednja dva tjedna spriječili olak&scaron;avanje ulaska stranaca uvjetujući to ukidanjem viza za državljane Saudijske Arabije, čemu se protive hrvatski ministri.<br />\r\n<br />\r\nU Sarajevu je ovoga tjedna organizirano vi&scaron;e prosvjeda turističkih radnika koji su tražili da se olak&scaron;aju turistička putovanja.<br />\r\n<br />\r\nNa sjednici u petak svi članovi Vijeća ministara ipak su glasali za ublažavanje ulaska u zemlju, da bi potom nastavili prepucavanja o vizama za Saudijce.<br />\r\n<br />\r\nMinistrica civilnih poslova BiH Ankica Gudeljević (HDZ BiH) ocijenila je dana&scaron;nju odluku &quot;pobjedom razuma&quot;. &quot;Rekla bih da je konačno pobijedio razum. Nama je turizam jako važan&quot;, rekla je Gudeljević.<br />\r\n<br />\r\nPojasnila je da HDZ-ovi ministri nisu podržali ukidanje viza za državljane Saudijske Arabije jer slijede preporuke Europske unije o bezviznom režimu.<br />\r\n<br />\r\n&Scaron;efica bosanskohercegovačke diplomacije Bisera Turković optužila je ministre iz HDZ-a BiH da su zbog toga državi uskratili 200 milijuna dolara.<br />\r\n<br />\r\n&quot;Činjenicu da će ekonomija BiH zbog toga izgubiti milijune maraka prihoda te&scaron;ko će ublažiti i dana&scaron;nje usvajanje odluke kojom se omogućava ulazak stranaca na bazi cijepljenja i brzih antigenskih testova&quot;, smatra Turković.', '/projekt/uploads/images/45.jpg', 'SVIJET', 0),
(46, '2021/06/12 00:38:00', 'Cirkus zvan G7', 'Susreti zemalja G7 ', 'Nakon parade svjetskih čelnika pred novinarima i šetnje po plaži američkog predsjednika Joe Bidena ni manje ni više nego ruku pod ruku s francuskim predsjednikom Emmanuelom Macronom, britanski premijer Boris Johnson okarakterizirao je u četvrtak samit G7 kao \"golemi medijski cirkus\".<br />\r\n<br />\r\nSusreti na vrhu zemalja G7 su opće poznati po dosadnim naslikavanjima na kojima se predsjednici država i vlada iz petnih žila trude izgledati prirodno u bizarnom kontekstu - poput susreta s drugim svjetskim čelnikom na maloj, zabačenoj engleskoj plaži.<br />\r\n<br />\r\nPod sivim engleskim nebom, raskuštrani premijer Johnson i njegova nova supruga Carrie pozdravljali su čelnike G7 i njihove partnere na posebnom izgrađenom drvenom mostiću uz Atlantik.<br />\r\n<br />\r\nNakon što su se okupili za zajedničku fotografiju, uz pridržavanje mjera fizičke distance, njemačka kancelarka Angela Merkel požurila je Johnsona naprijed i rekla mu: \"Ti vodiš\".<br />\r\n<br />\r\nMacron je zastao na začelju i razmijenio nekoliko riječi s talijanskim premijerom Mariom Draghijem, nakon čega je prišao Biden i obgrlio francuskog predsjednika koji mu je uzvratio zagrljaj.<br />\r\n<br />\r\nHodali su smješkajući se, ruku pod ruku i razgovarali o državničkim poslovima.<br />\r\n<br />\r\nElizejska palača je priopćila da su Macron i Biden razgovarali o tome \"kako demokraciju učiniti učinkovitijom za srednju klasu te da se s Kinom ne bi trebalo sukobljavati, ali treba braniti svoje vrijednosti i interese\".<br />\r\n<br />\r\nOtvarajući samit, Johnson je rekao da bi to trebalo biti izrazito važno nakon ove \"zlosretne pandemije\", zapitavši se ne bi li čelnici možda mogli stvari raditi na \"rodno neutralniji, više ženstveniji način\".<br />\r\n<br />\r\nNaredivši medijima da napuste sastanak nakon njegovih uvodnih riječi, Johnson je rekao: \"Ovo bi trebalo biti čavrljanje pored kamina između velikih demokracija svijeta, a pretvorilo se u golemi medijski cirkus u kojem se moramo međusobno pozdravljati po nekoliko puta\".<br />\r\n<br />\r\nToliko je sve bilo nezgrapno i nelagodno zbog izrežiranih susreta da se američka prva dama Jill Biden pomalo narugala, kazavši: \"Osjećam se kao na vjenčanju\", a Johnson, kojemu je ovo treći brak, uzvratio je da se osjeća kao da \"hoda do oltara\".<br />\r\n<br />\r\nBiden je novinarima kazao da idu malo plivati, glumeći strogoću: \"Svi u vodu!\".<br />\r\n<br />\r\nNa pitanje što će reći ruskom predsjedniku Vladimiru Putinu kada se sljedeći tjedan sastanu u Ženevi, odgovorio je: \"Reći ću vam nakon što njemu kažem\".', '/projekt/uploads/images/46.jpg', 'SVIJET', 0),
(47, '2021/06/11 22:42:53', 'Banka podigla procjenu rasta', 'Talijansko gospodarstvo porast će ove godine ', 'Talijansko gospodarstvo porast će ove godine blizu pet posto, procijenila je u petak sredi&scaron;nja banka, podigav&scaron;i procjenu zahvaljujući pobolj&scaron;anju epidemiolo&scaron;ke situacije i boljim rezultatima u prvom tromjesečju.<br />\r\n<br />\r\nBanka je bila prognozirala da će gospodarstvo ove godine porasti 4,4 posto dok statistički ured početkom mjeseca nije revidirao podatke za prvo tromjesečje, koji su pokazali rast aktivnosti na tromjesečnoj razini za 0,1 posto, Prva je procjena pokazivala pad za 0,4 posto.<br />\r\n<br />\r\nU 2022. godini rast će po bančinim novim procjenama usporiti na 4,5 posto.<br />\r\n<br />\r\nProcjena sredi&scaron;nje banke za ovu godinu ne&scaron;to je bolja od one vlade u Rimu, koja je u travnju prognozirala rast aktivnosti za 4,5 posto. Vladina procjena za 2022. ne&scaron;to je pak vi&scaron;a od one sredi&scaron;nje banke i predviđa rast aktivnosti za 4,8 posto.<br />\r\n<br />\r\nGlavni će pokretači rasta u obje godine po sredi&scaron;njoj banci biti ulaganja, koja će &quot;značajno porasti&quot; zahvaljujući prigu&scaron;enoj neizvjesnosti povezanoj s pandemijom covida 19, niskim kamatnim stopama i projektima financiranima novcem iz europskog fonda za oporavak.<br />\r\n<br />\r\nGospodarstvo će se vratiti na pretpandmijsku razinu negdje iduće godine, zaključila je sredi&scaron;nja banka.<br />\r\n<br />\r\nU 2020. godini aktivnosti su pale 8,9 posto, najsnažnije od kraja Drugog svjetskog rata.<br />\r\n<br />\r\nSredi&scaron;nja banka procjenjuje i da će inflacija mjerena harmoniziranim indeksom potro&scaron;ačkih cijena (HICP) ove godine u prosjeku iznositi 1,3, posto, te blago oslabiti u 2022., na 1,2 posto.<br />\r\n<br />\r\nU 2020. cijene su gotovo stagnirale.<br />\r\n<br />\r\nStopa nezaposlenosti trebala bi ove godine u prosjeku iznositi 10,2 posto, te kliznuti na 9,9 posto u 2022., procjenjuje sredi&scaron;nja banka.', '/projekt/uploads/images/47.jpg', 'EKONOMIJA', 0),
(48, '2021/06/11 22:43:57', 'Gospodarstvo izlazi iz krize', 'Njemačko gospodarstvo raste', 'Njemačko gospodarstvo dosegnut će pretpandemijsku razinu već u trećem tromjesečju, a inflacija će ojačati u drugoj polovini godine, ali nema razloga za zabrinutost, poručila je u petak sredi&scaron;nja banka.<br />\r\n<br />\r\nGospodarstvo će ove godine porasti 3,7 posto, a u 2022. rast bi trebao ubrzati na 5,2 posto, procjenjuje Bundesbank, temeljeći procjene na pretpostavci o skorom i trajnom obuzdavanju pandemije covida 19 procjepljivanjem građana i na ublažavanju koronaograničenja.<br />\r\n<br />\r\nU 2023. aktivnosti bi se trebale stabilizirati na 1,7 posto.<br />\r\n<br />\r\nGospodarstvo će dosegnuti pretpandemijsku razinu već u trećem tromjesečju, nagla&scaron;ava banka.<br />\r\n<br />\r\n&quot;Njemačko gospodarstvo izlazi iz pandemijske krize&quot;, zaključio je guverner Jens Weidmann.<br />\r\n<br />\r\nBundesbank je povisio i procjenu inflacije, izračunav&scaron;i da bi ove godine trebala dosegnuti 2,6 posto, najvi&scaron;u razinu od 2008.<br />\r\n<br />\r\nSkok cijena ne treba zabrinjavati, nagla&scaron;avaju, pripisujući ga poskupljenju energenata i vraćanju stope PDV-a na pretpandemijsku razinu.<br />\r\n<br />\r\nKada se isključe ta dva faktora, cijene će porasti jedan posto, kao i pro&scaron;le godine i osjetno slabije nego 2019., nagla&scaron;avaju u Bundesbanku.<br />\r\n<br />\r\nBudući da se ti faktori neće protegnuti i na cijelu iduću godinu, inflacija bi u 2022. trebala usporiti na 1,8 posto, te na 1,7 posto u 2023.<br />\r\n<br />\r\nUpozorili su ipak da bi nagli rast cijena i približavanje inflacije razini od četiri posto u drugoj polovini ove godine mogli utjecati na očekivanja u gospodarstvu nakon dugog razdoblja umjerenog rasta cijena.<br />\r\n<br />\r\n&quot;Iznimno visoke stope inflacije, po njemačkim standardima, projicirane za drugu polovinu 2021. godine, mogle bi na kraju utjecati na percepciju i očekivanja ekonomskih aktera&quot;, ističu u Bundesbanci.<br />\r\n<br />\r\n&quot;To bi moglo izazvati promjene u plaćama i politici određivanja cijena i dodatno pojačati inflatorne pritiske. Takav ishod valja očekivati ponajprije ako opća stopa inflacije u bliskoj budućnosti bude jo&scaron; i vi&scaron;a no &scaron;to smo ovdje procijenili&quot;.<br />\r\n<br />\r\nU svibnju potro&scaron;ačke cijene porasle su u Njemačkoj 2,4 posto, najvi&scaron;e u 10 godina, podsjeća Reuters.', '/projekt/uploads/images/48.jpg', 'EKONOMIJA', 0),
(49, '2021/06/11 22:44:49', 'Prosječna zagrebačka plaća', 'Prosječna neto plaća ', 'Prosječna neto plaća zaposlenih u pravnim osobama u gradu Zagrebu za ožujak ove godine iznosila je 8.352 kune, &scaron;to je nominalno 7,5 posto vi&scaron;e u odnosu na ožujak 2020., podaci su Odjela za statistiku Gradskog ureda za strategijsko planiranje i razvoj grada Zagreba.<br />\r\n<br />\r\nU odnosu na prosječnu mjesečnu plaću za ožujak na razini Hrvatske, koja je iznosila 7.138 kuna, prosječna zagrebačka neto plaća isplaćena za isti mjesec bila je vi&scaron;a za 1.214 kuna.<br />\r\n<br />\r\nPo podacima Odjela za statistiku Gradskog ureda za strategijsko planiranje i razvoj grada, najvi&scaron;a je prosječna mjesečna neto plaća u pravnim osobama u Zagrebu za ožujak isplaćena u djelatnosti telekomunikacija u iznosu od 14.670 kuna.<br />\r\n<br />\r\nNasuprot tomu, najniža je prosječna neto plaća za ožujak isplaćena u ostalim osobnim uslužnim djelatnostima, u iznosu od 4.541 kunu.<br />\r\n<br />\r\nProsječna mjesečna isplaćena bruto plaća u pravnim osobama u Gradu Zagrebu za ožujak ove godine iznosila je 11.615 kuna, &scaron;to je porast za pet posto u odnosu na ožujak 2020. godine.', '/projekt/uploads/images/49.jpg', 'EKONOMIJA', 0),
(50, '2021/06/11 22:45:34', 'Travanj i početak letenja', 'Hrvatske zračne luke su u travnju...', 'Hrvatske zračne luke su u travnju uslužile 77 tisuća putnika, &scaron;to je znatno vi&scaron;e od četiri tisuće koliko ih je bilo u &quot;zaključanom&quot; travnju 2020. godine, ali i gotovo 100 tisuća manje nego u travnju 2019., podaci su Državnog zavoda za statistiku (DZS).<br />\r\n<br />\r\nNajveći promet putnika u travnju ostvarila je zračna luka Zagreb, 53 tisuće, &scaron;to je također veliki porast u odnosu na travanj 2020., kada je na toj luci bilo samo četiri tisuće putnika.<br />\r\n<br />\r\nZračna luka Split imala je 14 tisuća putnika, dok ih u travnju 2020. uopće nije bilo, kao ni u zračnoj luci Dubrovnik, koja je u travnju 2021. s osam tisuća putnika na trećem mjestu među osma hrvatskih zračnih luka.<br />\r\n<br />\r\nMeđunarodni putnički promet ostvaren je najvi&scaron;e sa zračnim lukama Njemačke, odakle je dolazilo ili tamo putovalo oko 19 tisuća putnika sa hrvatskih zračnih luka, &scaron;to je porast od čak 441,3 posto u odnosu na isto razdoblje 2020., kada je prevezeno tri tisuće putnika.<br />\r\n<br />\r\nOperacija zrakoplova (slijetanja i slijetanja) u travnju je na svim zračnim lukama bilo 3.499 ili 733,1 posto vi&scaron;e nego u travnju 2020., jer ih je tada bilo svega 420. No, tih je operacija u travnju 2019. bilo gotovo 9.100, podsjećaju iz DZS-a.<br />\r\n<br />\r\nU travnju pak, za razliku od ranijih mjeseci ove i pro&scaron;le godine, porast broja putnika kao da je zamijenio dotada&scaron;nji porast prometa tereta u zračnim lukama, odnosno promet tereta u travnju od 636 tona za 20,2 posto je manji nego u travnju 2020.<br />\r\n<br />\r\nPrva četiri mjeseca sa 63,6 posto manje putnika<br />\r\n<br />\r\nPromet tereta u zračnim lukama na razini prva četiri mjeseca ipak je bio u ne&scaron;to manjem minusu u odnosu na 2020., od 13,1 posto, sa 2.510 tona tereta, no kod prometa putnika minus je veći, iako su ga rezultati travnja ublažili.<br />\r\n<br />\r\nNaime, putnika je u prva četiri mjeseca ove godine kroz zračne luke ukupno pro&scaron;lo 223 tisuće, &scaron;to je 63,6 posto manje nego u isto vrijeme 2020., pri čemu ne treba zaboraviti da su prva dva mjeseca pro&scaron;le godine bila bez pandemijskih ograničenja putovanja, pa i u zračnom prijevozu, nakon čega je u ožujku i travnju slijedilo globalno zaključavanja zemalja, granica i putovanja, a zračni je putnički promet u svijetu gotovo potpuno stao.<br />\r\n<br />\r\nUnatoč slabom prometu putnika, zračne luke su u prva četiri mjeseca ukupno zabilježile pad operacija zrakoplova od &prime;samo&prime; 16 posto u odnosu na iste mjesece 2020., i to sa 10.679 tih operacija, pokazuju podaci DZS-a.', '/projekt/uploads/images/50.jpg', 'EKONOMIJA', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
