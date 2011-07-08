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
 * @catalan translator Antonio Piedras Morente
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2009 Gregor Anzelj, gregor.anzelj@gmail.com
 *
 */

defined('INTERNAL') || die();

$string['pluginname'] = 'Learning';
$string['mylearning'] = 'El meu aprenentatge';

$string['learningsaved'] = 'Enquesta d\'estudis desada';
$string['learningsavefailed'] = 'No s\'ha pogut actualitzar la seva enquesta d\'estudis';

$string['multipleintelligences'] = 'Múltiples intel·ligències';
$string['multipleintelligencesdesc'] = '
<p>La teoria de les múltiples intel·ligències va ser desenvolupada l\'any 1983 pel Dr Howard Gardner. Que suggereix que la noció tradicional de la intel·ligència, basada en les proves de quocient intel·lectual, és massa limitada. En canvi, el Dr Gardner proposa set intel·ligències diferents per tenir en compte una gamma més àmplia del potencial humà tant en infants com en adults. A mitjans dels 90 Gardner va definir una vuitena intel·ligència. Aquestes intel·ligències són:
<ul>
<li><b>Lingüística.</b> Capacitat per parlar o escriure.</li>
<li><b>Lògica-Matemàtica.</b> Relacionada amb el pensament inductiu i deductiu i les habilitats per al raonament lògic, així com per l\'ús dels patrons de reconeixement numèric i abstracte.</li>
<li><b>Visual-Espacial.</b> Capacitat per visualitzar mentalment objectes i dimensions espacials.</li>
<li><b>Corporal-Kinésica.</b> Relacionada amb les sensacions corporals i la capacitat de controlar el moviment físic.</li>
<li><b>Musical-Rítmica.</b> Capacitat per dominar la música, així com els tons i els ritmes.</li>
<li><b>Interpersonal.</b> Capacitat per comunicar-se eficaçment amb altres persones i ser capaços de desenvolupar relacions.</li>
<li><b>Intrapersonal.</b> Capacitat per comprendre les pròpies emocions, les motivacions, els estats interns del propi ésser i l\'autoreflexió.</li>
<li><b>Naturalista.</b> Capacitat per fer distincions i comunicar-se amb el món natural i el medi ambient.</li>
</ul>
</p>
';
$string['learningstyles'] = 'Estils d\'aprentatge';
$string['learningstylesdesc'] = '
<p>Els estils d\'aprenentatge són els diferents enfocaments o modes d\'aprenentatge. Aquests impliquen mètodes educatius, per a un individu en particular, on se suposa que permeten que les persones aprenguin millor. Una de les categoritzacions més comunes i àmpliament utilitzades dels diferents tipus d\'estils d\'aprenentatge és el model de Fleming VARK (Visual Auditori Reading Kinesthetic) que es va ampliar a principis de la programació dels models neuro-lingüístics (VAK):
<ul>
<li><b>Estudiants Visuals.</b> Ells tenen preferència per veure (pensar en imatges, ajudes visuals com ara diapositives, diagrames, fulls informatius, etc).</li>
<li><b>Estudiants Auditius.</b> Ells aprenen millor escoltant (conferències, debats, àudio, etc).</li>
<li><b>Estudiants de Lectura/Escriptura.</b> Ells aprenen millor amb activitats de lectura i escriptura.</li>
<li><b>Estudiants Cinestètics</b> o <b>Tàctils.</b> Ells prefereixen aprendre a través de l\'experiència en moviment, tocar i fer (l\'exploració activa del món, els projectes de ciències, experiments, etc).</li>
</ul>
</p>
';

$string['legend'] = 'Llegenda';
$string['dateadded'] = 'Afegit el: ';

// Multiple Intelligences
$string['intelligenceA'] = 'Intel·ligència Verbal-Lingüística';
$string['intelligenceB'] = 'Intel·ligència Lògico-Matemàtica';
$string['intelligenceC'] = 'Intel·ligència Visual-Espacial';
$string['intelligenceD'] = 'Intel·ligència Corporal-Cinestètica';
$string['intelligenceE'] = 'Intel·ligència Musical';
$string['intelligenceF'] = 'Intel·ligència Interpersonal';
$string['intelligenceG'] = 'Intel·ligència Intrapersonal';
$string['intelligenceH'] = 'Intel·ligència Naturalista';
$string['true'] = 'Cert';
$string['false'] = 'Fals';

// Multiple Intelligences: Verbal-Linguistic intelligence
$string['multipleintelligences.A1'] = 'És fàcil per a mi explicar les meves idees als altres.';
$string['multipleintelligences.A2'] = 'Aprenc molt de les converses, de les lectures i escoltant altres.';
$string['multipleintelligences.A3'] = 'Gaudeixo parlant en públic i participant en debats.';
$string['multipleintelligences.A4'] = 'Prendre notes m\'ajuda a recordar i comprendre.';
// Multiple Intelligences: Logical-Mathematical intelligence
$string['multipleintelligences.B1'] = 'Les instruccions pas a pas són una gran ajuda.';
$string['multipleintelligences.B2'] = 'La resolució de problemes i els trencaclosques lògics són fàcils per a mi.';
$string['multipleintelligences.B3'] = 'Puc trobar fàcilment els patrons i relacions entre experiències o coses.';
$string['multipleintelligences.B4'] = 'Puc realitzar càlculs ràpidament de memòria.';
// Multiple Intelligences: Visual-Spatial intelligence
$string['multipleintelligences.C1'] = 'Sóc bo en la lectura de mapes i plànols.';
$string['multipleintelligences.C2'] = 'Recordo millor si utilitzo taules, gràfics i organitzadors gràfics.';
$string['multipleintelligences.C3'] = 'Puc visualitzar idees mentalment.';
$string['multipleintelligences.C4'] = 'Puc recordar coses o escenes com representacions mentals.';
// Multiple Intelligences: Bodily-Kinesthetic intelligence
$string['multipleintelligences.D1'] = 'Gaudeixo fent coses amb les meves mans.';
$string['multipleintelligences.D2'] = 'Aprenc millor fent les coses pel meu compte.';
$string['multipleintelligences.D3'] = 'Tinc un bon sentit de l\'equilibri i m\'agrada moure\'m.';
$string['multipleintelligences.D4'] = 'La inactivitat pot cansar-me més que estar ocupat.';
// Multiple Intelligences: Musical intelligence
$string['multipleintelligences.E1'] = 'Recordar les lletres de les cançons i els tons és fàcil per a mi.';
$string['multipleintelligences.E2'] = 'Puc animar-me amb la música quan estic trist.';
$string['multipleintelligences.E3'] = 'Puc distingir els diversos instruments musicals en complexes obres musicals.';
$string['multipleintelligences.E4'] = 'M\'agrada cantar o tocar un instrument musical.';
// Multiple Intelligences: Interpersonal intelligence
$string['multipleintelligences.F1'] = 'Sovint exerceixo de líder entre els meus companys i col·legues.';
$string['multipleintelligences.F2'] = 'M\'agraden les activitats de grup i els esdeveniments socials.';
$string['multipleintelligences.F3'] = 'Sóc sensible als estats d\'ànim i els sentiments de la gent al meu voltant.';
$string['multipleintelligences.F4'] = 'Sóc un \'jugador d\'equip\' i aprenc millor interactuant amb els altres.';
// Multiple Intelligences: Intrapersonal intelligence
$string['multipleintelligences.G1'] = 'Crec que sóc responsable dels meus actes i de qui sóc.';
$string['multipleintelligences.G2'] = 'Necessito saber per què he d\'aprendre alguna cosa abans d\'estar d\'acord en aprendre-ho.';
$string['multipleintelligences.G3'] = 'M\'agrada estar sol i pensar en la meva vida i mi mateix.';
$string['multipleintelligences.G4'] = 'Treballar sol pot ser tan productiu com treballar en equip.';
// Multiple Intelligences: Naturalistic intelligence
$string['multipleintelligences.H1'] = 'Classificar m\'ajuda a donar sentit a les noves dades.';
$string['multipleintelligences.H2'] = 'M\'agrada tenir cura de les plantes de casa meva i de les meves mascotes.';
$string['multipleintelligences.H3'] = 'M\'agrada veure els fenòmens naturals com la lluna i les marees i sentir les explicacions sobre ells.';
$string['multipleintelligences.H4'] = 'M\'agrada aprendre sobre la natura, especialment sobre la biologia, la botànica o la zoologia.';


// Learning Styles
$string['learningtypeV'] = 'Tipus Visual';
$string['learningtypeA'] = 'Tipus Auditiu';
$string['learningtypeK'] = 'Tipus Cinestètic';
$string['never'] = 'Mai';
$string['rarely'] = 'Rarament';
$string['sometimes'] = 'Algunes vegades';
$string['often'] = 'Sovint';
$string['always'] = 'Sempre';

// Learning Styles: Visual type
$string['learningstyles.V01'] = 'A l\'aula mantinc contacte visual amb el professor';
$string['learningstyles.V02'] = 'Utilitzo colors (llapisos, bolígrafs, etc.) tant en escriure en el quadern com en la lectura dels materials d\'aprenentatge.';
$string['learningstyles.V03'] = 'Prefereixo el dibuix d\'un mapa més que l\'explicació de la manera de com arribar-hi.';
$string['learningstyles.V04'] = 'Puc entendre i llegir fàcilment mapes, diagrames, gràfics, etc.';
$string['learningstyles.V05'] = 'La ràdio encesa em molesta, si estic fent alguna cosa.';
$string['learningstyles.V06'] = 'Prenc moltes notes, en llegir o escoltar una explicació.';
$string['learningstyles.V07'] = 'Quan faig un examen, puc dedicar-me fàcilment a dibuixar en el quadern o al llibre, quan ja he respost a les preguntes.';
$string['learningstyles.V08'] = 'Si prenc notes, recordo millor.';
$string['learningstyles.V09'] = 'Si vull recordar alguna cosa, per exemple, el número de telèfon d\'algú, m\'ajuda crear una imatge mental de la persona.';
$string['learningstyles.V10'] = 'Puc imaginar en els meus pensaments el que estic llegint o escoltant.';
$string['learningstyles.V11'] = 'Prefereixo llegir sol a que una altra persona llegeixi per a mi.';
// Learning Styles: Auditory type
$string['learningstyles.A01'] = 'Entenc millor una cosa quan parlo d\'això amb altres persones.';
$string['learningstyles.A02'] = 'Prefereixo les instruccions orals a les escrites.';
$string['learningstyles.A03'] = 'Prefereixo escoltar el text en un sistema d\'àudio, en lloc de llegir-ho jo mateix.';
$string['learningstyles.A04'] = 'Obtinc pitjors resultats en les proves escrites que en les orals.';
$string['learningstyles.A05'] = 'És difícil per a mi imaginar objectes no familiars, esdeveniments o instal·lacions.';
$string['learningstyles.A06'] = 'M\'agrada explicar acudits i no em costa recordar-els.';
$string['learningstyles.A07'] = 'Puc seguir una explicació bé, encara que no tingui contacte visual amb el professor.';
$string['learningstyles.A08'] = 'M\'agrada parlar, quan estic escrivint.';
$string['learningstyles.A09'] = 'Quan llegeixo, \'escolto\' les paraules en la meva ment.';
$string['learningstyles.A10'] = 'No recordo bé com és la gent, sinó que recordo millor les seves paraules.';
$string['learningstyles.A11'] = 'Si estudio en veu alta, recordo millor el material.';
// Learning Styles: Kinesthetic type
$string['learningstyles.K01'] = 'Tinc bones idees quan estic físicament actiu.';
$string['learningstyles.K02'] = 'Quan estudio, no em sento a la taula, prefereixo triar llocs diferents (per exemple, a terra, al llit ...).';
$string['learningstyles.K03'] = 'Escric notes, però de forma una mica desorganitzada.';
$string['learningstyles.K04'] = 'No puc quedar-me quiet durant molt de temps.';
$string['learningstyles.K05'] = 'M\'agrada fer coses amb les meves mans.';
$string['learningstyles.K06'] = 'Necessito moltes pauses quan estic estudiant.';
$string['learningstyles.K07'] = 'Quan parlo, també utilitzo el llenguatge corporal (per exemple, gestos).';
$string['learningstyles.K08'] = 'En comptes d\'escoltar les instruccions sobre com fer una cosa, prefereixo fer-la immediatament.';
$string['learningstyles.K09'] = 'Mentre escolto una explicació, sovint faig gargots en un paper o al banc.';
$string['learningstyles.K10'] = 'M\'agrada crear models sigui el que sigui el que estigui estudiant.';
$string['learningstyles.K11'] = 'Prefereixo fer el treball del projecte, en comptes d\'escriure assaigs i resums.';

?>
