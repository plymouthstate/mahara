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

$string['pluginname'] = 'Learning';
$string['mylearning'] = 'My Learning';

$string['learningsaved'] = 'Learning survey saved';
$string['learningsavefailed'] = 'Failed to update your learning survey';

$string['multipleintelligences'] = 'Multiple Intelligences';
$string['multipleintelligencesdesc'] = '
<p>The theory of multiple intelligences was developed in 1983 by Dr. Howard Gardner. It suggests that the traditional notion of intelligence, based on I.Q. testing, is far too limited. Instead, Dr. Gardner proposes seven different intelligences to account for a broader range of human potential in children and adults. An eighth intelligence was defined and put forth in the mid \'90s also by Gardner. These intelligences are:
<ul>
<li><b>Linguistic.</b> The ability to use spoken or written words.</li>
<li><b>Logical-Mathematical.</b> Inductive and deductive thinking and reasoning abilities, logic, as well as the use of numbers and abstract pattern recognition.</li>
<li><b>Visual-Spatial.</b> The ability to mentally visualize objects and spatial dimensions.</li>
<li><b>Body-Kinesthetic.</b> The wisdom of the body and the ability to control physical motion.</li>
<li><b>Musical-Rhythmic.</b> The ability to master music as well as rhythms, tones and beats.</li>
<li><b>Interpersonal.</b> The ability to communicate effectively with other people and to be able to develop relationships.</li>
<li><b>Intrapersonal.</b> The ability to understand one\'s own emotions, motivations, inner states of being, and self-reflection.</li>
<li><b>Naturalist-Environmental.</b> The ability to make distinctions in the natural world and the environment.</li>
</ul>
</p>
';
$string['learningstyles'] = 'Learning Styles';
$string['learningstylesdesc'] = '
<p>Learning styles are simply different approaches or ways of learning. They involve educating methods which are particular to an individual and that are presumed to allow that individual to learn best. One of the most common and widely-used categorizations of the various types of learning styles is Fleming\'s VARK model which expanded upon earlier Neuro-linguistic programming (VAK) models:
<ul>
<li><b>Visual learners.</b> They have a preference for seeing (think in pictures; visual aids such as overhead slides, diagrams, handouts, etc.).</li>
<li><b>Auditory learners.</b> They learn best through listening (lectures, discussions, tapes, etc.).</li>
<li><b>Reading/Writing-preference learners.</b> They learn best through reading and writing.</li>
<li><b>Kinesthetic learners</b> or <b>tactile learners.</b> They prefer to learn via experience - moving, touching, and doing (active exploration of the world; science projects; experiments, etc.).</li>
</ul>
</p>
';

$string['legend'] = 'Legend';
$string['dateadded'] = 'Added on: ';

// Multiple Intelligences
$string['intelligenceA'] = 'Verbal-Linguistic intelligence';
$string['intelligenceB'] = 'Logical-Mathematical intelligence';
$string['intelligenceC'] = 'Visual-Spatial intelligence';
$string['intelligenceD'] = 'Bodily-Kinesthetic intelligence';
$string['intelligenceE'] = 'Musical intelligence';
$string['intelligenceF'] = 'Interpersonal intelligence';
$string['intelligenceG'] = 'Intrapersonal intelligence';
$string['intelligenceH'] = 'Naturalistic intelligence';
$string['true'] = 'True';
$string['false'] = 'False';

// Multiple Intelligences: Verbal-Linguistic intelligence
$string['multipleintelligences.A1'] = 'It is easy for me to explain my ideas to others.';
$string['multipleintelligences.A2'] = 'I learn a lot form conversations, lectures and by listening to others.';
$string['multipleintelligences.A3'] = 'I enjoy public speaking and participating in debates.';
$string['multipleintelligences.A4'] = 'Taking notes helps me remember and understand.';
// Multiple Intelligences: Logical-Mathematical intelligence
$string['multipleintelligences.B1'] = 'Step-by-step directions are a big help.';
$string['multipleintelligences.B2'] = 'Problem solving and logical puzzles come easily to me.';
$string['multipleintelligences.B3'] = 'I can easily see the patterns and relationships between experiences or things.';
$string['multipleintelligences.B4'] = 'I can complete calculations quickly in my head.';
// Multiple Intelligences: Visual-Spatial intelligence
$string['multipleintelligences.C1'] = 'I am good at reading maps and blueprints.';
$string['multipleintelligences.C2'] = 'I remember better using charts, graphs and graphic organizers.';
$string['multipleintelligences.C3'] = 'I can visualize ideas in my mind.';
$string['multipleintelligences.C4'] = 'I can recall things or scenes as mental pictures.';
// Multiple Intelligences: Bodily-Kinesthetic intelligence
$string['multipleintelligences.D1'] = 'I enjoy making things with my hands.';
$string['multipleintelligences.D2'] = 'I learn best by doing something on my own.';
$string['multipleintelligences.D3'] = 'I have a good sense for balance and I like to move around.';
$string['multipleintelligences.D4'] = 'Inactivity can make me more tired than being very busy.';
// Multiple Intelligences: Musical intelligence
$string['multipleintelligences.E1'] = 'Remembering song lyrics and  melody is easy for me.';
$string['multipleintelligences.E2'] = 'I can cheer myself up with music when I\'m sad.';
$string['multipleintelligences.E3'] = 'I can distinguish individual musical instruments in complex musical works.';
$string['multipleintelligences.E4'] = 'I enjoy singing or playing a musical instrument.';
// Multiple Intelligences: Interpersonal intelligence
$string['multipleintelligences.F1'] = 'I often serve as a leader among peers and colleagues.';
$string['multipleintelligences.F2'] = 'I enjoy group events and social events.';
$string['multipleintelligences.F3'] = 'I am sensitive about moods and feelings of people around me.';
$string['multipleintelligences.F4'] = 'I am a \'team player\' and I learn best interacting with others.';
// Multiple Intelligences: Intrapersonal intelligence
$string['multipleintelligences.G1'] = 'I believe that I am responsible for my actions and who I am.';
$string['multipleintelligences.G2'] = 'I need to know why I should learn something before I agree to learn it.';
$string['multipleintelligences.G3'] = 'I enjoy being alone and thinking about my life and myself.';
$string['multipleintelligences.G4'] = 'Working alone can be just as productive as working in a group.';
// Multiple Intelligences: Naturalistic intelligence
$string['multipleintelligences.H1'] = 'Classification helps me make sense of new data.';
$string['multipleintelligences.H2'] = 'I enjoy caring for my house plants and my pets.';
$string['multipleintelligences.H3'] = 'I like to watch natural phenomena like the moon and the tides and hear explanations about them.';
$string['multipleintelligences.H4'] = 'I like learning about nature, especially about biology, botany and/or zoology.';


// Learning Styles
$string['learningtypeV'] = 'Visual type';
$string['learningtypeA'] = 'Auditory type';
$string['learningtypeK'] = 'Kinesthetic type';
$string['never'] = 'Never';
$string['rarely'] = 'Rarely';
$string['sometimes'] = 'Sometimes';
$string['often'] = 'Often';
$string['always'] = 'Always';

// Learning Styles: Visual type
$string['learningstyles.V01'] = 'In the classroom I maintain good eye contact with the teacher.';
$string['learningstyles.V02'] = 'I use color (pencils, crayons, etc.) when writing to notebook, or reading the teaching materials.';
$string['learningstyles.V03'] = 'I prefer drawn maps more than the description of the way, that I have to take.';
$string['learningstyles.V04'] = 'I can easily understand and read maps, charts, graphs, etc.';
$string['learningstyles.V05'] = 'The switched on radio bothers me, if I am doing something.';
$string['learningstyles.V06'] = 'I take lots of notes, when reading or listening to an explanation.';
$string['learningstyles.V07'] = 'When I take a test, I can easily picture page in the notebook or book, where I learned the answers.';
$string['learningstyles.V08'] = 'If I take notes, I remember better.';
$string['learningstyles.V09'] = 'If I want to remember something, for example somebody\'s phone number, than it helps me to create the image of it in my mind.';
$string['learningstyles.V10'] = 'I can imagine in my thoughts what I am reading or listening.';
$string['learningstyles.V11'] = 'I\'d rather read alone, instead of someone else reading to me.';
// Learning Styles: Auditory type
$string['learningstyles.A01'] = 'I understand  something more easily when I talk about it with other people.';
$string['learningstyles.A02'] = 'I prefer oral than written instructions.';
$string['learningstyles.A03'] = 'I prefer listening to the text on tape or Audio CD, rather than reading it myself.';
$string['learningstyles.A04'] = 'I perform worse at written tests than at oral questioning.';
$string['learningstyles.A05'] = 'It is difficult for me to imagine unfamiliar objects, events, facilities.';
$string['learningstyles.A06'] = 'I love telling jokes and I can easily remember them.';
$string['learningstyles.A07'] = 'I can follow an explanation well, although I don\'t maintain good eye contact with the teacher.';
$string['learningstyles.A08'] = 'I like talking as I write.';
$string['learningstyles.A09'] = 'When I read, I \'listen to\' the words in my mind.';
$string['learningstyles.A10'] = 'I don\'t remember well how people look, I remember their words better.';
$string['learningstyles.A11'] = 'If I learn aloud, then I remember material better.';
// Learning Styles: Kinesthetic type
$string['learningstyles.K01'] = 'I get good ideas when I am physically active.';
$string['learningstyles.K02'] = 'When I learn, I do not want to sit at the table, but prefer to choose different places (e.g. on the floor, in bed ...).';
$string['learningstyles.K03'] = 'I write notes, but they are somewhat disorganized.';
$string['learningstyles.K04'] = 'I cannot sit still for a long time.';
$string['learningstyles.K05'] = 'I like doing things with my hands.';
$string['learningstyles.K06'] = 'I need a lot of breaks, when I am learning.';
$string['learningstyles.K07'] = 'When I speak, I also use body language (e.g. gestures).';
$string['learningstyles.K08'] = 'Instead of listening to instructions on how to do a product, I prefer to immediately produce it.';
$string['learningstyles.K09'] = 'While listening to an explanation, I often write doodles on paper or bench.';
$string['learningstyles.K10'] = 'I like to create models from whatever I am learning.';
$string['learningstyles.K11'] = 'I prefer doing project work, instead of writing essays and summaries.';

?>
