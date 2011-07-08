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
 * @translator Dominique-Alain Jan djan@mac.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2009 Gregor Anzelj, gregor.anzelj@gmail.com
 *
 */

defined('INTERNAL') || die();

$string['pluginname'] = 'Apprentissages';
$string['mylearning'] = 'Styles d\'apprentissage';

$string['learningsaved'] = 'Le questionnaire sur vos styles d\'apprentissage a été sauvegardé';
$string['learningsavefailed'] = 'Echec lors de la mise à jour du questionnaire sur vos styles d\'apprentissage';

$string['multipleintelligences'] = 'Intelligences multiples';
$string['multipleintelligencesdesc'] = '
<p>La théorie des intelligences multiples a été développée en 1983 par le Dr. Howard Gardner. Elle part du principe que la notion d\'intelligence, basée sur les tests de Q.I. est trop limitée. Le Dr. Gardner propose d\'y substituer un système composé de sept types différents d\'intelligence, ce qui permet prendre en compte le large potentiel humain des enfants et des adultes. Un huitième type d\'intelligence a été défini plus tard, au milieu des années 90, toujours par Gardner. Ces différents types d\'intelligences sont les suivants&nbsp;:
<ul>
<li><b>Verbo-linguisitique,</b> ou la capacité à maîtriser la langue orale et écrite pour s\'exprimer.</li>
<li><b>Logico-mathématique,</b> ou la capacité à penser et raisonner de manière inductive et déductive; elle comprend la maîtrise de la logique, des nombres et des objets abstraits.</li>
<li><b>Spatiale,</b> ou la capacité à visualiser mentalement des objets dans l\'espace.</li>
<li><b>Corporelle-kinesthésique,</b> ou la maîtrise du corps et l\'habilité à contrôler les mouvements corporels.</li>
<li><b>Musical-Rhythmic.</b> ou l\'habilité à maîtriser la musique et de jouer en rythme, trouver le son juste et le bon tempo.</li>
<li><b>Interpersonnel,</b> ou l\'habilité à communiquer de manière efficiente avec les autres et de évelopper ses réseaux sociaux dans le monde concret ou virtuel.</li>
<li><b>Intrapersonnel,</b> ou la capacité à comprendre ses émotions, à (re)connaître ses motivations, sa position de vie, à utiliser la pratique réflexive.</li>
<li><b>Neuraliste,</b> ou la capacité à comprendre et appréhender les lois de la Nature et de l\'environnement.</li>
</ul>
</p>
';
$string['learningstyles'] = 'Styles d\'apprentissage';
$string['learningstylesdesc'] = '
<p>Les styles d\'apprentissage correspondent aux différentes manières d\'apprendre et d\'étudier. Ils font référence aux différents modes de pédagogie, particuliers à chaque individu, qui permettent la meilleure acquisition des connaissances. Une des taxonomies les plus largement utilisées est celle de Fleming : le modèle VARK, qui s\'est développé notamment à travers la Programmation Neuro Linguisitique (PNL) et le sous-modèle VAK (VAKO en français pour Visuel, Auditif, Kinesthésique et Olfactif). Le modèle de Flemming permet de caractériser différents types d\'étudiants&nbsp:<ul>
<li><b>(Visual learners) Les visuels.</b> Ils préfèrent voir les choses, les observer (ils pensent sous forme d\'images).</li>
<li><b>(Auditive learners) Les auditifs.</b> Ils apprennent mieux en écoutant (ils préfèrent écouter l\'enseignant qui donne son cours, les discussions, les enregistrements sonores, etc.).</li>
<li><b>(Reading/writing preference learners) Les iconographes.</b> Ils apprennent  mieux à travers l\'écriture et la lecture.</li>
<li><b>(Kinesthetic learners) Les kinesthésiques</b> ou <b>apprenants tactiles.</b> Ils préfèrent apprendre à travers des expériences concrètes - bouger, toucher, et faire (ils explorent le monde, aiment les expériences scientifiques, les travaux pratiques, etc.).</li>
</ul>
</p>
';

$string['legend'] = 'Légende';
$string['dateadded'] = 'Modifié le&nbsp;: ';

// Multiple Intelligences
$string['intelligenceA'] = 'Intelligence verbo-linguisitique';
$string['intelligenceB'] = 'Intelligence logico-mathématique';
$string['intelligenceC'] = 'Intelligence spaciale';
$string['intelligenceD'] = 'Intelligence corporelle-kinesthésique';
$string['intelligenceE'] = 'Intelligence musicale-rythmique';
$string['intelligenceF'] = 'Intelligence interpersonnelle';
$string['intelligenceG'] = 'Intelligence intrapersonnelle';
$string['intelligenceH'] = 'Intelligence neuraliste';
$string['true'] = 'Vrai';
$string['false'] = 'Faux';

// Multiple Intelligences: Verbal-Linguistic intelligence
$string['multipleintelligences.A1'] = 'Il est facile pour moi d\'expliquer mes idées aux autres.';
$string['multipleintelligences.A2'] = 'J\'apprends beaucoup à travers les conversations, en écoutant les cours des professeurs, ainsi que les autres autour de moi.';
$string['multipleintelligences.A3'] = 'J\'aime participer aux débats, de parler en public.';
$string['multipleintelligences.A4'] = 'Prendre des notes m\'aide à comprendre et à me rappeler.';
// Multiple Intelligences: Logical-Mathematical intelligence
$string['multipleintelligences.B1'] = 'Les explications données pas-à-pas m\'aident énormément.';
$string['multipleintelligences.B2'] = 'La résolution de problèmes, les exercices de logique sont faciles pour moi.';
$string['multipleintelligences.B3'] = 'J\'arrive facilement à faire des liens entre les expériences et la réalité, le monde concret.';
$string['multipleintelligences.B4'] = 'J\'arrive à calculer rapidement de tête.';
// Multiple Intelligences: Visual-Spatial intelligence
$string['multipleintelligences.C1'] = 'Je comprends facilement une carte de géographie, un plan, ou un schéma.';
$string['multipleintelligences.C2'] = 'J\'arrive mieux à me souvenir le contenu de graphiques, de schémas ou des dessins.';
$string['multipleintelligences.C3'] = 'Je peux facilement visualiser des idées dans ma tête.';
$string['multipleintelligences.C4'] = 'Je peux me souvenir d\évènements comme étant une scène de cinéma ou une image mentale.';
// Multiple Intelligences: Bodily-Kinesthetic intelligence
$string['multipleintelligences.D1'] = 'J\'aime faire des choses de mes mains.';
$string['multipleintelligences.D2'] = 'J\'apprends mieux quand je peux faire les choses concrètement et par moi-même.';
$string['multipleintelligences.D3'] = 'J\i le rythme dans la peau et j\'aime bouger avec mon corps.';
$string['multipleintelligences.D4'] = 'L\'inactivité m\'ennuie et me fatigue plus que lorsque je suis actif.';
// Multiple Intelligences: Musical intelligence
$string['multipleintelligences.E1'] = 'Se rappeler des paroles des chansons est facile pour moi.';
$string['multipleintelligences.E2'] = 'Je peux me consoler en écoutant de la musique quand je suis triste.';
$string['multipleintelligences.E3'] = 'Je peux reconnaître différents instruments dans une pièce musicale complexe.';
$string['multipleintelligences.E4'] = 'J\'aime chanter ou jouer d\'un instrument de musique.';
// Multiple Intelligences: Interpersonal intelligence
$string['multipleintelligences.F1'] = 'Je prends souvent le rôle de chef de groupe avec mes collègues ou mes paires.';
$string['multipleintelligences.F2'] = 'J\'aime les évènements de groupe et les moments de partage.';
$string['multipleintelligences.F3'] = 'Je suis sensible aux ambiances et aux sentiments des gens autour de moi.';
$string['multipleintelligences.F4'] = 'J\'aime les activités de groupes et j\'apprends mieux quand je suis en interaction avec les autres.';
// Multiple Intelligences: Intrapersonal intelligence
$string['multipleintelligences.G1'] = 'Je crois au fait que je suis responsable de mes actes et de qui je suis.';
$string['multipleintelligences.G2'] = 'J\'ai besoin de savoir pourquoi je dois apprendre quelque chose avant d\effectivement l\'apprendre.';
$string['multipleintelligences.G3'] = 'I enjoy being alone and thinking about my life and myself.';
$string['multipleintelligences.G4'] = 'Travailler seul ou en groupe n\'a pas d\'importance pour moi.';
// Multiple Intelligences: Naturalistic intelligence
$string['multipleintelligences.H1'] = 'Classer les informations m\'aide à leur donner du sens.';
$string['multipleintelligences.H2'] = 'J\'aime à m\'occuper de la maison, des plantes et des animaux domestiques.';
$string['multipleintelligences.H3'] = 'J\'aime observer les phénomènes naturels comme la Lune, la marée, et écouter les explications à leur sujet.';
$string['multipleintelligences.H4'] = 'J\'aime apprendre des choses au sujet de la nature, est plus précisément au sujet de la biologie, de la botanique et/ou de la zoologie.';


// Learning Styles
$string['learningtypeV'] = 'Type visuel';
$string['learningtypeA'] = 'Type auditif';
$string['learningtypeK'] = 'Type kynesthésique';
$string['never'] = 'Jamais';
$string['rarely'] = 'Rarement';
$string['sometimes'] = 'Parfois';
$string['often'] = 'Souvent';
$string['always'] = 'Toujours';

// Learning Styles: Visual type
$string['learningstyles.V01'] = 'Pendant les cours, je maintiens un bon contact visuel avec l\'enseignant.';
$string['learningstyles.V02'] = 'J\'utilise des couleurs (crayons, stylos, etc.) quand je prends des notes ou lis des supports de cours.';
$string['learningstyles.V03'] = 'Pour aller d\'un point à un autre, je préfère avoir un plan dessiné plutôt qu\'une explication sous forme de liste.';
$string['learningstyles.V04'] = 'Je lis et comprends bien les cartes de géographie, les graphiques, les plans, etc.';
$string['learningstyles.V05'] = 'Le son de la radio m\'empêche de faire correctement les choses';
$string['learningstyles.V06'] = 'Je prends beaucoup de notes quand je lis ou j\'écoute les explications pendant les cours.';
$string['learningstyles.V07'] = 'Quand je passe un examen, je me représente facilement le contenu de la page du support du cours où se trouve la réponse aux questions.';
$string['learningstyles.V08'] = 'Quand je prends des notes je me rappelle mieux.';
$string['learningstyles.V09'] = 'Quand je veux me rappler quelque chose, comme un numéro de téléphone, je me fais une image de l\'information dans ma tête.';
$string['learningstyles.V10'] = 'Je peux me représenter ou imaginer facilement ce que je suis en train de lire ou d\'entendre.';
$string['learningstyles.V11'] = 'Je préfère lire moi-même à ce que l\'on me fasse la lecture.';
// Learning Styles: Auditory type
$string['learningstyles.A01'] = 'Il m\'est plus facile d\'apprendre quelque chose quand j\'en parle avec d\'autres personnes.';
$string['learningstyles.A02'] = 'Je préfère des instructions données par oral à celles données par écrit.';
$string['learningstyles.A03'] = 'Je préfère écouter un texte lu depuis un CD ou une cassette, que de le lire moi-même.';
$string['learningstyles.A04'] = 'J\'ai de moins bons résultats aux tests écrits qu\'oraux.';
$string['learningstyles.A05'] = 'Il m\'est difficile d\'imaginer des objets, des évènements ou des outils non familiers';
$string['learningstyles.A06'] = 'J\'aime raconter des blagues et je me souviens facilement de celles qu\'on me raconte.';
$string['learningstyles.A07'] = 'J\'écoute les explications données, mais je ne garde pas de contact visuel avec l\'enseignant.';
$string['learningstyles.A08'] = 'J\'aime parler ou chanter quand je suis en train d\'écrire.';
$string['learningstyles.A09'] = 'Quand je lis, j\'entend les mots dans ma tête, je les lis à haute voix ou je remue les lèvres.';
$string['learningstyles.A10'] = 'Je me rappelle pas comment le physique des gens, mais plus les mots qu\'ils ont prononcés.';
$string['learningstyles.A11'] = 'Si j\'apprends à haute voix, je me rapelle mieux du contenu des cours.';
// Learning Styles: Kinesthetic type
$string['learningstyles.K01'] = 'Les bonnes idées me viennent quand je suis physiquement actif.';
$string['learningstyles.K02'] = 'Quand j\'apprends, je ne reste pas assis autour d\'une table, mais je préfère le faire à différentes places (par ex. sur le sol, dans le lit, ...).';
$string['learningstyles.K03'] = 'Je prends des notes, mais elles sont désorganisées et ont peu de sens pour moi.';
$string['learningstyles.K04'] = 'Je ne peux pas rester tranquille très longtemps.';
$string['learningstyles.K05'] = 'J\'aime faire des choses de mes propres mains.';
$string['learningstyles.K06'] = 'J\'ai besoin de faire de nombreuses pauses quand je suis en train de réviser mes cours.';
$string['learningstyles.K07'] = 'Quand je parle, j\'ai aussi besoin de m\'exprimer avec mon corps (par ex. faire des gestes).';
$string['learningstyles.K08'] = 'Au lieu d\'écouter les consignes pour réaliser une tâche, je préfère la réaliser immédiatement par moi-même.';
$string['learningstyles.K09'] = 'Quand je dois écouter une explication ou pendant les cours, je dessine des scriboullis sur la table ou sur un papier.';
$string['learningstyles.K10'] = 'J\'aime à réaliser des modèles ou des maquettes de ce que j\'apprends.';
$string['learningstyles.K11'] = 'Je préfère réaliser des projets concrets au lieu de devoir écrire des rapports ou des résumés.';

?>
