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
 * @spanish translator Antonio Piedras Morente
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2009 Gregor Anzelj, gregor.anzelj@gmail.com
 *
 */

defined('INTERNAL') || die();

$string['pluginname'] = 'Learning';
$string['mylearning'] = 'Mi Aprendizaje';

$string['learningsaved'] = 'Encuesta de estudios guardada';
$string['learningsavefailed'] = 'No se pudo actualizar su encuesta de aprendizaje';

$string['multipleintelligences'] = 'Múltiples inteligencias';
$string['multipleintelligencesdesc'] = '
<p>La teoria de las múltiples inteligencias fué desarrollada en el año 1983 por el Dr. Howard Gardner. Que sugiere que la noción tradicional de la inteligencia, basada en las pruebas de cociente intelectual, es demasiado limitada. En cambio, el Dr. Gardner propone siete inteligencias diferentes para tener en cuenta una gama más amplia del potencial humano tanto en niños como en adultos. A mediados de los 90 Gardner definió una octava inteligencia. Estas inteligencias son:
<ul>
<li><b>Lingüística.</b> Capacidad para hablar o escribir.</li>
<li><b>Lógica-Matemática.</b> Tiene que ver con el pensamiento inductivo y deductivo y las habilidades para el razonamiento lógico, así como para el uso de los patrones de reconocimiento numérico y abstracto.</li>
<li><b>Visual-Espacial.</b> Capacidad para visualizar mentalmente objectos y dimensiones espaciales.</li>
<li><b>Corporal-Kinésica.</b> Relacionada con las sensaciones corporales y la capacidad de controlar el movimiento físico.</li>
<li><b>Musical-Rítmica.</b> Capacidad de dominar la música, así como los tonos y los ritmos.</li>
<li><b>Interpersonal.</b> Capacidad de comunicarse eficazmente con otras personas y ser capaces de desarrollar relaciones.</li>
<li><b>Intrapersonal.</b> Capacidad de comprender las propias emociones, las motivaciones, los estados internos del propio ser y la autoreflexión.</li>
<li><b>Naturalista.</b> Capacidad de hacer distinciones y comunicarse con el mundo natural y el medio ambiente.</li>
</ul>
</p>
';
$string['learningstyles'] = 'Estilos de aprendizaje';
$string['learningstylesdesc'] = '
<p>Los estilos de aprendizaje son los diferentes enfoques o modos de aprendizaje. Estos implican métodos educativos, para un individuo en particular, donde se supone que permiten que las personas aprendan mejor. Una de las categorizaciones más comunes y ampliamente utilizadas  de los distintos tipos de estilos de aprendizaje es el modelo de Fleming VARK (Visual Auditori Reading Kinesthetic) que se amplió a principios de la programación de los modelos neuro-lingüísticos (VAK):
<ul>
<li><b>Estudiantes Visuales.</b> Ellos tienen preferencia por ver (pensar en imágenes, ayudas visuales tales como diapositivas, diagramas, folletos, etc).</li>
<li><b>Estudiantes Auditivos.</b> Ellos aprenden mejor escuchando (conferencias, debates, audio, etc).</li>
<li><b>Estudiantes de Lectura/Escritura.</b> Ellos aprenden mejor con actividades de lectura y escritura.</li>
<li><b>Estudiantes Cinestéticos</b> o <b>Táctiles.</b> Ellos prefieren aprender a través de la experiencia en movimiento, tocar y hacer (la exploración activa del mundo, los proyectos de ciencias, experimentos, etc).</li>
</ul>
</p>
';

$string['legend'] = 'Leyenda';
$string['dateadded'] = 'Añadido el: ';

// Multiple Intelligences
$string['intelligenceA'] = 'Inteligencia Verbal-Lingüística';
$string['intelligenceB'] = 'Inteligencia Lógico-Matemática';
$string['intelligenceC'] = 'Inteligencia Visual-Espacial';
$string['intelligenceD'] = 'Inteligencia Corporal-Cinestética';
$string['intelligenceE'] = 'Inteligencia Musical';
$string['intelligenceF'] = 'Inteligencia Interpersonal';
$string['intelligenceG'] = 'Inteligencia Intrapersonal';
$string['intelligenceH'] = 'Inteligencia Naturalista';
$string['true'] = 'Cierto';
$string['false'] = 'Falso';

// Multiple Intelligences: Verbal-Linguistic intelligence
$string['multipleintelligences.A1'] = 'Es fácil para mi explicar mis ideas a los otros.';
$string['multipleintelligences.A2'] = 'Aprendo mucho de las conversaciones, de las lecturas y escuchando a otros.';
$string['multipleintelligences.A3'] = 'Disfruto hablando en público y participando en debates.';
$string['multipleintelligences.A4'] = 'Tomar notas me ayuda a recordar y comprender.';
// Multiple Intelligences: Logical-Mathematical intelligence
$string['multipleintelligences.B1'] = 'Las instrucciones paso a paso son una gran ayuda.';
$string['multipleintelligences.B2'] = 'La resolución de problemas y los rompecabezas lógicos son fáciles para mi.';
$string['multipleintelligences.B3'] = 'Puedo encontrar fácilmente los patrones y relaciones entre experiencias o cosas.';
$string['multipleintelligences.B4'] = 'Puedo realizar cálculos rápidamente de memoria.';
// Multiple Intelligences: Visual-Spatial intelligence
$string['multipleintelligences.C1'] = 'Soy bueno en la lectura de mapas y planos.';
$string['multipleintelligences.C2'] = 'Recuerdo mejor si utilizo tablas, gráficos y organizadores gráficos.';
$string['multipleintelligences.C3'] = 'Puedo visualizar ideas mentalmente.';
$string['multipleintelligences.C4'] = 'Puedo recordar cosas o escenas como representaciones mentales.';
// Multiple Intelligences: Bodily-Kinesthetic intelligence
$string['multipleintelligences.D1'] = 'Disfruto haciendo cosas con mis manos.';
$string['multipleintelligences.D2'] = 'Aprendo mejor haciendo las cosas por mi cuenta.';
$string['multipleintelligences.D3'] = 'Tengo un buen sentido del equilibrio y me gusta moverme.';
$string['multipleintelligences.D4'] = 'La inactividad puede cansarme más que estar ocupado.';
// Multiple Intelligences: Musical intelligence
$string['multipleintelligences.E1'] = 'Recordar las letras de las canciones y las melodias es fácil para mi.';
$string['multipleintelligences.E2'] = 'Puedo animarme con la música cuando estoy triste.';
$string['multipleintelligences.E3'] = 'Puedo distinguir los diversos instrumentos musicales en complejas obras musicales.';
$string['multipleintelligences.E4'] = 'Me gusta cantar o tocar un instrumento musical.';
// Multiple Intelligences: Interpersonal intelligence
$string['multipleintelligences.F1'] = 'A menudo ejerzo de líder entre mis compañeros y colegas.';
$string['multipleintelligences.F2'] = 'Me gustan las actividades de grupo y los eventos sociales.';
$string['multipleintelligences.F3'] = 'Soy sensible a los estados de ánimo y los sentimientos de la gente a mi alrededor.';
$string['multipleintelligences.F4'] = 'Soy un \'jugador de equipo\' y aprendo mejor interactuando con los demás.';
// Multiple Intelligences: Intrapersonal intelligence
$string['multipleintelligences.G1'] = 'Creo que soy responsable de mis actos y de quién soy.';
$string['multipleintelligences.G2'] = 'Necesito saber por qué tengo que aprender algo antes de estar de acuerdo en aprenderlo.';
$string['multipleintelligences.G3'] = 'Me gusta estar solo y pensar en mi vida y en mi mismo.';
$string['multipleintelligences.G4'] = 'Trabajar solo puede ser tan productivo como el trabajo en equipo.';
// Multiple Intelligences: Naturalistic intelligence
$string['multipleintelligences.H1'] = 'Clasificar me ayuda a dar sentido a los nuevos datos.';
$string['multipleintelligences.H2'] = 'Me gusta cuidar de las plantas de mi casa y de mis mascotas.';
$string['multipleintelligences.H3'] = 'Me gusta ver los fenómenos naturales como la luna y las mareas y oír las explicaciones sobre ellos.';
$string['multipleintelligences.H4'] = 'Me gusta aprender sobre la naturaleza, especialmente acerca de la biología, la botánica o la zoología.';


// Learning Styles
$string['learningtypeV'] = 'Tipo Visual';
$string['learningtypeA'] = 'Tipo Auditivo';
$string['learningtypeK'] = 'Tipo Cinestético';
$string['never'] = 'Nunca';
$string['rarely'] = 'Raramente';
$string['sometimes'] = 'Algunas veces';
$string['often'] = 'A menudo';
$string['always'] = 'Siempre';

// Learning Styles: Visual type
$string['learningstyles.V01'] = 'En el aula mantengo contacto visual con el profesor';
$string['learningstyles.V02'] = 'Utilizo colores (lápices, bolígrafos, etc.) tanto al escribir en el cuaderno como en la lectura de los materiales de enseñanza.';
$string['learningstyles.V03'] = 'Prefiero el dibujo de un mapa más que la explicación de la forma en la que llegar.';
$string['learningstyles.V04'] = 'Puedo entender y leer fácilmente mapas, diagramas, gráficos, etc.';
$string['learningstyles.V05'] = 'La radio encendida me molesta, si estoy haciendo algo.';
$string['learningstyles.V06'] = 'Tomo muchas notas, al leer o escuchar una explicación.';
$string['learningstyles.V07'] = 'Cuando hago un examen, puedo dedicarme fácilmente a dibujar en el cuaderno o en el libro, cuando ya he respondido a las preguntas.';
$string['learningstyles.V08'] = 'Si tomo notas, recuerdo mejor.';
$string['learningstyles.V09'] = 'Si quiero recordar algo, por ejemplo, el número de teléfono de alguien, me ayuda crear una imagen mental de la persona.';
$string['learningstyles.V10'] = 'Puedo imaginar en mis pensamientos lo que estoy leyendo o escuchando.';
$string['learningstyles.V11'] = 'Prefiero leer solo a que otra persona lea para mi.';
// Learning Styles: Auditory type
$string['learningstyles.A01'] = 'Entiendo mejor algo cuando hablo de ello con otras personas.';
$string['learningstyles.A02'] = 'Prefiero las instrucciones orales a las escritas.';
$string['learningstyles.A03'] = 'Prefiero escuchar el texto en un sistema de audio, en lugar de leer yo mismo.';
$string['learningstyles.A04'] = 'Obtengo peores resultados en las pruebas escritas que en las orales.';
$string['learningstyles.A05'] = 'Es difícil para mí imaginar objetos no familiares, eventos o instalaciones.';
$string['learningstyles.A06'] = 'Me gusta contar chistes y no me cuesta recordarlos.';
$string['learningstyles.A07'] = 'Puedo seguir una explicación bien, aunque no tenga contacto visual con el profesor.';
$string['learningstyles.A08'] = 'Me gusta hablar, cuando estoy escribiendo.';
$string['learningstyles.A09'] = 'Cuando leo, \'escucho\' las palabras en mi mente.';
$string['learningstyles.A10'] = 'No recuerdo bien cómo es la gente, sino que recuerdo mejor sus palabras.';
$string['learningstyles.A11'] = 'Si estudio en voz alta, recuerdo mejor el material.';
// Learning Styles: Kinesthetic type
$string['learningstyles.K01'] = 'Tengo buenas ideas cuando estoy físicamente activo.';
$string['learningstyles.K02'] = 'Cuando estudio, no me siento en la mesa, prefiero elegir lugares diferentes (por ejemplo, en el suelo, en la cama ...).';
$string['learningstyles.K03'] = 'Escribo notas, pero de forma un poco desorganizada.';
$string['learningstyles.K04'] = 'No puedo quedarme quieto durante mucho tiempo.';
$string['learningstyles.K05'] = 'Me gusta hacer cosas con mis manos.';
$string['learningstyles.K06'] = 'Necesito muchas pausas cuando estoy estudiando.';
$string['learningstyles.K07'] = 'Cuando hablo, también utilizo el lenguaje corporal (por ejemplo, gestos).';
$string['learningstyles.K08'] = 'En vez de escuchar las instrucciones sobre cómo hacer una cosa, prefiero hacerla inmediatamente.';
$string['learningstyles.K09'] = 'Mientras escucho una explicación, a menudo hago garabatos en un papel o en el banco.';
$string['learningstyles.K10'] = 'Me gusta crear modelos sea lo que sea que esté estudiando.';
$string['learningstyles.K11'] = 'Prefiero hacer el trabajo del proyecto, en vez de escribir ensayos y resúmenes.';

?>
