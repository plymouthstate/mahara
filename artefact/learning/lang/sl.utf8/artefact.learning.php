<?php
/**
 * Mahara: Electronic portfolio, weblog, resume builder and social networking
 * Copyright (C) 2006-2008 Catalyst IT Ltd (http://www.catalyst.net.nz)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    mahara
 * @subpackage artefact-learning
 * @author     Gregor Anzelj
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2009 Gregor Anzelj, gregor.anzelj@gmail.com
 *
 */

defined('INTERNAL') || die();

$string['pluginname'] = 'Učenje';
$string['mylearning'] = 'Moje učenje';

$string['learningsaved'] = 'Podatki o učenju uspešno shranjeni';
$string['learningsavefailed'] = 'Shranjevanje podatkov o učenju neuspešno';

$string['multipleintelligences'] = 'Večvrstne inteligence';
$string['multipleintelligencesdesc'] = '
<p>Teorijo večvrstnih inteligenc je leta 1983 razvil dr. Howard Gardner. Teorija poudarja, da je tradicionalen pogled na inteligenco, ki temelji na testiranjih I.Q., preveč omejen. Namesto tega je dr. Gardner predlagal sedem različnih inteligenc, na katere je potrebno računati, za širše razumevanje človeškega potenciala pri otrocih in odraslih. Gardner je sredi \'90ih  definiral in predstavil tudi osmo inteligenco. Te inteligence so:
<ul>
<li><b>Jezikovna.</b> Zmožnost uporabe govorjenih ali napisanih besed.</li>
<li><b>Logično-matematična.</b> Zmožnosti induktivnega in deduktivnega razmišljanja in sklepanja, logika, kot tudi uporaba števil ter prepoznavanje abstraktnih vzorcev.</li>
<li><b>Vizualno-prostorska.</b> Zmožnost umske predstavitve predmetov in prostorskih dimenzij.</li>
<li><b>Telesno-gibalna.</b> Modrost telesa in zmožnost nadzorovanja fizičnega gibanja.</li>
<li><b>Glasbeno-ritmična.</b> Zmožnost obvladovanja tako glasbe, kot ritmov, tonov in taktov.</li>
<li><b>Medosebna.</b> Zmožnost uspešnega komuniciranja z drugimi ljudmi ter zmožnost razvijanja medosebnih razmerij.</li>
<li><b>Osebna.</b> Zmožnost razumevanja lastnih občutkov, motivacij, notranjih stanj ter zmožnost samo-refleksije.</li>
<li><b>Naravoslovna-okoljska.</b> Zmožnost razlikovanja v naravi, svetu in okolju.</li>
</ul>
</p>
';
$string['learningstyles'] = 'Učni slogi';
$string['learningstylesdesc'] = '
<p>Učni slogi so preprosto različni pristopi ali poti učenja. Vključujejo izobraževalne metode, lastne posamezniku, za katere predpostavimo, da posamezniku omogočajo najučinkovitejše učenje. Ena izmed najbolj pogostih in uporabljanih razvstitev različnih tipov učnih slogov je Flemingov model VARK, ki je razširitev zgodnejših modelov neuro-lingvističnega programiranja (VAK):
<ul>
<li><b>Vizualni tip učečega.</b> Najbolje se učijo z gledanjem (razmišljajo v slikah, potrebujejo vizualne pripomočke, kot so prosojnice, diagrami, izročki, itd.).</li>
<li><b>Slušni tip učečega.</b> Najbolje se učijo s poslušanjem (predavanj, pogovorov in razgovorov, posnetkov, itd.).</li>
<li><b>Učeči s prednostno izbiro branja/pisanja.</b> Najbolje s učijo z branjem in pisanjem.</li>
<li><b>Telesno-gibalni tip učečega.</b> Najbolje se učijo preko izkušenj - premikanja, dotikanja in izdelave (aktivno raziskovanje sveta, znanstveni projekti, poizkusi, itd.).</li>
</ul>
</p>
';

$string['legend'] = 'Legenda';
$string['dateadded'] = 'Dodano: ';

// Multiple Intelligences
$string['intelligenceA'] = 'Jezikovna inteligenca';
$string['intelligenceB'] = 'Logično-matematična inteligenca';
$string['intelligenceC'] = 'Vizualno-prostorska inteligenca';
$string['intelligenceD'] = 'Telesno-gibalna inteligenca';
$string['intelligenceE'] = 'Glasbena inteligenca';
$string['intelligenceF'] = 'Medosebna inteligenca';
$string['intelligenceG'] = 'Osebna inteligenca';
$string['intelligenceH'] = 'Naravoslovna inteligenca';
$string['true'] = 'Drži';
$string['false'] = 'Ne drži';

// Multiple Intelligences: Verbal-Linguistic intelligence
$string['multipleintelligences.A1'] = 'Znam pojasniti zapletene teme na razumljiv način.';
$string['multipleintelligences.A2'] = 'Veliko se naučim iz pogovorov, predavanj in ob poslušanju drugih.';
$string['multipleintelligences.A3'] = 'Imam dobro razvit besednjak in ga tudi uporabljam.';
$string['multipleintelligences.A4'] = 'Rad si delam zapiske in mislim, da je to koristno.';
// Multiple Intelligences: Logical-Mathematical intelligence
$string['multipleintelligences.B1'] = 'Vedno zadeve rešujem korak za korakom.';
$string['multipleintelligences.B2'] = 'Rad rešujem uganke, križanke, logične probleme ...';
$string['multipleintelligences.B3'] = 'Lahko razločim vzorce in odnose med izkušnjami ali stvarmi.';
$string['multipleintelligences.B4'] = 'Rad računam in spretno rešujem matematične probleme.';
// Multiple Intelligences: Visual-Spatial intelligence
$string['multipleintelligences.C1'] = 'Imam dober smisel za načrte, zemljevide in orientacijo.';
$string['multipleintelligences.C2'] = 'Razpredelnice, diagrami in vizualni pripomočki imajo pomembno vlogo pri učenju.';
$string['multipleintelligences.C3'] = 'Zlahka si vizualno predstavljam prizore, ki sem si jih zapomnil oz. ustvaril.';
$string['multipleintelligences.C4'] = 'Znam opazovati in pogosto opazim stvari, ki jih drugi ne.';
// Multiple Intelligences: Bodily-Kinesthetic intelligence
$string['multipleintelligences.D1'] = 'Vešč sem dela s predmeti.';
$string['multipleintelligences.D2'] = 'Največ se naučim, kadar moram stvar opraviti sam.';
$string['multipleintelligences.D3'] = 'Imam dober občutek za ravnotežje in rad se gibljem.';
$string['multipleintelligences.D4'] = 'Hitro postanem nemiren.';
// Multiple Intelligences: Musical intelligence
$string['multipleintelligences.E1'] = 'Zlahka si zapomnim besedilo pesmi.';
$string['multipleintelligences.E2'] = 'Kadar poslušam glasbo, se moje razpoloženje spreminja.';
$string['multipleintelligences.E3'] = 'V zapletenih glasbenih delih lahko razločim posamezne inštrumente.';
$string['multipleintelligences.E4'] = 'Rad pojem ali igram na glasbeni inštrument.';
// Multiple Intelligences: Interpersonal intelligence
$string['multipleintelligences.F1'] = 'Imam naravno sposobnost reševanja sporov med prijatelji.';
$string['multipleintelligences.F2'] = 'Uživam v dogodkih skupnosti in družabnih dogodkih.';
$string['multipleintelligences.F3'] = 'Dovzeten sem za razpoloženje in čustva ljudi, ki me obdajajo.';
$string['multipleintelligences.F4'] = 'V skupinah rad sodelujem in upoštevam tudi zamisli drugih.';
// Multiple Intelligences: Intrapersonal intelligence
$string['multipleintelligences.G1'] = 'Dobro se poznam in vem, zakaj se vedem tako, kot se.';
$string['multipleintelligences.G2'] = 'Preden se želim nečesa učiti, mora to biti smiselno zame.';
$string['multipleintelligences.G3'] = 'Rad imam zasebnost, tišino pri delu in razmišljanja.';
$string['multipleintelligences.G4'] = 'Raje delam in se učim sam kot v skupini.';
// Multiple Intelligences: Naturalistic intelligence
$string['multipleintelligences.H1'] = 'Razvrščanje mi pomaga osmisliti nove podatke.';
$string['multipleintelligences.H2'] = 'Uživam, ko zalivam rože in skrbim za hišne ljubljenčke.';
$string['multipleintelligences.H3'] = 'Z veseljem opazujem naravne pojave, kot so luna in plima ter poslušam razlago teh pojavov.';
$string['multipleintelligences.H4'] = 'Všeč mi je učenje o naravi, še posebej o biologiji, botaniki in/ali zoologiji.';


// Learning Styles
$string['learningtypeV'] = 'Vizualni tip';
$string['learningtypeA'] = 'Slušni tip';
$string['learningtypeK'] = 'Telesno-gibalni tip';
$string['never'] = 'Nikoli';
$string['rarely'] = 'Redko';
$string['sometimes'] = 'Včasih';
$string['often'] = 'Pogosto';
$string['always'] = 'Vedno';

// Learning Styles: Visual type
$string['learningstyles.V01'] = 'Pri pouku precej pozorno opazujem učiteljev obraz.';
$string['learningstyles.V02'] = 'Pri zapisovanju v zvezek ali pri branju učne snovi uporabljam barve.'; // (npr. markerje, naglaševalce besedila, flomastre, barvice)
$string['learningstyles.V03'] = 'Bolj kot ustni opis poti, ki jo moram prehoditi, mi ustreza narisan zemljevid.';
$string['learningstyles.V04'] = 'Z lahkoto razumem in berem zemljevide, preglednice, grafe ipd.';
$string['learningstyles.V05'] = 'Če nekaj delam, me prižgan radio moti.';
$string['learningstyles.V06'] = 'Kadar berem ali poslušam razlago, si veliko zapisujem.';
$string['learningstyles.V07'] = 'Ko pišem test, si zlahka predstavljam stran v zvezku ali knjigi, kjer je snov, ki sem se je učil.';
$string['learningstyles.V08'] = 'Če si pišem, si bolje zapomnim.';
$string['learningstyles.V09'] = 'Če si želim nekaj zapomniti, npr. telefonsko številko nekoga, mi pomaga, če si o njej v mislih ustvarim podobo.';
$string['learningstyles.V10'] = 'V mislih si lahko predstavljam tisto, kar berem ali poslušam.';
$string['learningstyles.V11'] = 'Raje berem sam, kot pa da mi bere kdo drug.';
// Learning Styles: Auditory type
$string['learningstyles.A01'] = 'Nekaj lažje razumem, če se o tem pogovarjam z drugimi ljudmi.';
$string['learningstyles.A02'] = 'Raje imam ustna kot pisna navodila.';
$string['learningstyles.A03'] = 'Raje poslušam besedilo na kaseti ali CD-ju, kot pa da bi ga sam prebral.';
$string['learningstyles.A04'] = 'Slabše se odrežem pri pisnih testih kot pri ustnem spraševanju.';
$string['learningstyles.A05'] = 'Težko si predstavljam neznane stvari, pojave, naprave.';
$string['learningstyles.A06'] = 'Rad pripovedujem šale in si jih zlahka zapomnim.';
$string['learningstyles.A07'] = 'Četudi med ustno razlago ne gledam učitelja, lahko dobro sledim temu, kar govori.';
$string['learningstyles.A08'] = 'Kadar pišem, rad govorim.';
$string['learningstyles.A09'] = 'Ko berem, v mislih \'poslušam\' besede.';
$string['learningstyles.A10'] = 'Pri ljudeh si ne zapomnim dobro njihove zunanjosti, bolje si zapomnim njihove besede.';
$string['learningstyles.A11'] = 'Če se učim na glas, si snov bolje zapomnim.';
// Learning Styles: Kinesthetic type
$string['learningstyles.K01'] = 'Dobre zamisli se mi porajajo, kadar sem telesno dejaven.';
$string['learningstyles.K02'] = 'Ko se učim, ne sedim rad za mizo, ampak si raje izbiram različna mesta (npr. na tleh, na postelji ...).';
$string['learningstyles.K03'] = 'Delam si zapiske, vendar so le-ti nekoliko neurejeni.';
$string['learningstyles.K04'] = 'Ne morem dolgo sedeti pri miru.';
$string['learningstyles.K05'] = 'Rad delam stvari z rokami.';
$string['learningstyles.K06'] = 'Kadar se učim, imam rad veliko premorov.';
$string['learningstyles.K07'] = 'Kadar govorim, uporabljam tudi telesno govorico (npr. kretnje).';
$string['learningstyles.K08'] = 'Raje bi takoj začel izdelovati neki izdelek, kot pa da bi prej poslušal navodila o tem, kako ga narediti.';
$string['learningstyles.K09'] = 'Med poslušanjem razlage pogosto delam čačke po papirju oz. klopi.';
$string['learningstyles.K10'] = 'Rad ustvarjam modele iz tega, kar se učim.';
$string['learningstyles.K11'] = 'Raje delam projektne naloge, kot pa pišem spise, povzetke in obnove.';

?>
