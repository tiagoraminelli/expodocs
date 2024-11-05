-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2024 a las 19:53:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disertante`
--

CREATE TABLE `disertante` (
  `id` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `biografia` text NOT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `persona_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `disertante`
--

INSERT INTO `disertante` (`id`, `url`, `biografia`, `twitter`, `linkedin`, `persona_id`) VALUES
(332, 'www.Sofía.faktu.ger', '', 'https://x/@SofíaVidalstatus/', 'https://www.linkedin.com/in/SofíaVidal.lik', NULL),
(333, 'www.Patricia.vikctum.ar', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique neque animi cum voluptate impedit voluptates doloribus illo totam, molestiae suscipit porro quo necessitatibus sapiente consectetur harum ullam? Tenetur, assumenda dignissimos', 'https://x/@PatriciaEstebanstatus/', 'https://www.linkedin.com/in/PatriciaEsteban.lik', 1),
(335, 'www.Lorena.adee.go', '', 'https://x/@LorenaMarínstatus/', 'https://www.linkedin.com/in/LorenaMarín.lik', 21),
(336, 'www.Lucía.portma.ar', '', 'https://x/@LucíaPascualstatus/', 'https://www.linkedin.com/in/LucíaPascual.lik', 17),
(337, 'www.Pablo.adee.ar', '', 'https://x/@PabloEstebanstatus/', 'https://www.linkedin.com/in/PabloEsteban.lik', 9),
(338, 'www.Txema.vikctum.ru', '', 'https://x/@TxemaCruzstatus/', 'https://www.linkedin.com/in/TxemaCruz.lik', NULL),
(339, 'www.Eider.adee.ar', '', 'https://x/@EiderMorastatus/', 'https://www.linkedin.com/in/EiderMora.lik', NULL),
(340, 'www.Iñaki.geadras.net', '', 'https://x/@IñakiMonterostatus/', 'https://www.linkedin.com/in/IñakiMontero.lik', NULL),
(341, 'www.María.geadras.com', '', 'https://x/@MaríaPastorstatus/', 'https://www.linkedin.com/in/MaríaPastor.lik', NULL),
(342, 'www.Pablo.aorta.com', '', 'https://x/@PabloBravostatus/', 'https://www.linkedin.com/in/PabloBravo.lik', NULL),
(343, 'www.Álvaro.portma.br', '', 'https://x/@ÁlvaroFerrerstatus/', 'https://www.linkedin.com/in/ÁlvaroFerrer.lik', NULL),
(344, 'www.Roberto.aorta.ger', '', 'https://x/@RobertoSantiagostatus/', 'https://www.linkedin.com/in/RobertoSantiago.lik', NULL),
(345, 'www.Inés.faktu.net', '', 'https://x/@InésGarcíastatus/', 'https://www.linkedin.com/in/InésGarcía.lik', NULL),
(346, 'www.Jesús.aorta.go', '', 'https://x/@JesúsMarcosstatus/', 'https://www.linkedin.com/in/JesúsMarcos.lik', NULL),
(347, 'www.Pablo.loaser.uk', '', 'https://x/@PabloGuerrerostatus/', 'https://www.linkedin.com/in/PabloGuerrero.lik', NULL),
(348, 'www.Tomás.aorta.com', '', 'https://x/@TomásLozanostatus/', 'https://www.linkedin.com/in/TomásLozano.lik', NULL),
(349, 'www.Cristina.aorta.net', '', 'https://x/@CristinaRuizstatus/', 'https://www.linkedin.com/in/CristinaRuiz.lik', NULL),
(350, 'www.Luis.loaser.ru', '', 'https://x/@LuisCastañostatus/', 'https://www.linkedin.com/in/LuisCastaño.lik', NULL),
(351, 'www.Lucas.dominar.uk', '', 'https://x/@LucasLozanostatus/', 'https://www.linkedin.com/in/LucasLozano.lik', NULL),
(352, 'www.Diego.geadras.ger', '', 'https://x/@DiegoOrtizstatus/', 'https://www.linkedin.com/in/DiegoOrtiz.lik', NULL),
(353, 'www.Juan.faktu.go', '', 'https://x/@JuanÁlvarezstatus/', 'https://www.linkedin.com/in/JuanÁlvarez.lik', NULL),
(354, 'www.Juan.geadras.go', '', 'https://x/@JuanCastañostatus/', 'https://www.linkedin.com/in/JuanCastaño.lik', NULL),
(355, 'www.Isabel.portma.ar', '', 'https://x/@IsabelGarridostatus/', 'https://www.linkedin.com/in/IsabelGarrido.lik', NULL),
(356, 'www.Sofía.vikctum.ru', '', 'https://x/@SofíaLeónstatus/', 'https://www.linkedin.com/in/SofíaLeón.lik', NULL),
(357, 'www.Marc.geadras.ru', '', 'https://x/@MarcMonterostatus/', 'https://www.linkedin.com/in/MarcMontero.lik', NULL),
(358, 'www.Marta.loaser.ru', '', 'https://x/@MartaCastrostatus/', 'https://www.linkedin.com/in/MartaCastro.lik', NULL),
(359, 'www.José.portma.br', '', 'https://x/@JoséÁlvarezstatus/', 'https://www.linkedin.com/in/JoséÁlvarez.lik', NULL),
(360, 'www.Guillermo.vikctum.com', '', 'https://x/@GuillermoRomerostatus/', 'https://www.linkedin.com/in/GuillermoRomero.lik', NULL),
(361, 'www.Alba.adee.ar', '', 'https://x/@AlbaCastrostatus/', 'https://www.linkedin.com/in/AlbaCastro.lik', NULL),
(362, 'www.Mariona.geadras.net', '', 'https://x/@MarionaCalvostatus/', 'https://www.linkedin.com/in/MarionaCalvo.lik', NULL),
(363, 'www.Txema.adee.ger', '', 'https://x/@TxemaRomerostatus/', 'https://www.linkedin.com/in/TxemaRomero.lik', NULL),
(364, 'www.Diego.loaser.ru', '', 'https://x/@DiegoCaballerostatus/', 'https://www.linkedin.com/in/DiegoCaballero.lik', NULL),
(365, 'www.Nerea.aorta.go', '', 'https://x/@NereaVicentestatus/', 'https://www.linkedin.com/in/NereaVicente.lik', NULL),
(366, 'www.Martina.vikctum.com', '', 'https://x/@MartinaCastrostatus/', 'https://www.linkedin.com/in/MartinaCastro.lik', NULL),
(367, 'www.Elena.aorta.br', '', 'https://x/@ElenaReyesstatus/', 'https://www.linkedin.com/in/ElenaReyes.lik', NULL),
(368, 'www.Santiago.adee.ar', '', 'https://x/@SantiagoCalvostatus/', 'https://www.linkedin.com/in/SantiagoCalvo.lik', NULL),
(369, 'www.Lucas.faktu.ger', '', 'https://x/@LucasMarcosstatus/', 'https://www.linkedin.com/in/LucasMarcos.lik', NULL),
(370, 'www.Natalia.portma.go', '', 'https://x/@NataliaFloresstatus/', 'https://www.linkedin.com/in/NataliaFlores.lik', NULL),
(371, 'www.Diego.aorta.ru', '', 'https://x/@DiegoVázquezstatus/', 'https://www.linkedin.com/in/DiegoVázquez.lik', NULL),
(372, 'www.Inés.portma.go', '', 'https://x/@InésSolísstatus/', 'https://www.linkedin.com/in/InésSolís.lik', NULL),
(373, 'www.María José.loaser.uk', '', 'https://x/@María JoséMorastatus/', 'https://www.linkedin.com/in/María JoséMora.lik', NULL),
(374, 'www.María José.faktu.ar', '', 'https://x/@María JoséAguilarstatus/', 'https://www.linkedin.com/in/María JoséAguilar.lik', NULL),
(375, 'www.Ángela.faktu.br', '', 'https://x/@ÁngelaCastrostatus/', 'https://www.linkedin.com/in/ÁngelaCastro.lik', NULL),
(376, 'www.Santiago.loaser.uk', '', 'https://x/@SantiagoReyesstatus/', 'https://www.linkedin.com/in/SantiagoReyes.lik', NULL),
(377, 'www.Celia.dominar.ger', '', 'https://x/@CeliaMartínstatus/', 'https://www.linkedin.com/in/CeliaMartín.lik', NULL),
(378, 'www.Clara.geadras.ger', '', 'https://x/@ClaraPrietostatus/', 'https://www.linkedin.com/in/ClaraPrieto.lik', NULL),
(379, 'www.Guillermo.adee.ru', '', 'https://x/@GuillermoBravostatus/', 'https://www.linkedin.com/in/GuillermoBravo.lik', NULL),
(380, 'www.Marina.geadras.ger', '', 'https://x/@MarinaSalgadostatus/', 'https://www.linkedin.com/in/MarinaSalgado.lik', NULL),
(381, 'www.María José.geadras.br', '', 'https://x/@María JoséCaballerostatus/', 'https://www.linkedin.com/in/María JoséCaballero.lik', NULL),
(382, 'www.Jesús.geadras.go', '', 'https://x/@JesúsMorastatus/', 'https://www.linkedin.com/in/JesúsMora.lik', NULL),
(383, 'www.Luis.portma.ger', '', 'https://x/@LuisMarínstatus/', 'https://www.linkedin.com/in/LuisMarín.lik', NULL),
(384, 'www.Fernando.adee.go', '', 'https://x/@FernandoVargasstatus/', 'https://www.linkedin.com/in/FernandoVargas.lik', NULL),
(385, 'www.Jorge.adee.uk', '', 'https://x/@JorgeSerranostatus/', 'https://www.linkedin.com/in/JorgeSerrano.lik', NULL),
(386, 'www.Alba.loaser.net', '', 'https://x/@AlbaParrastatus/', 'https://www.linkedin.com/in/AlbaParra.lik', NULL),
(387, 'www.Álvaro.portma.uk', '', 'https://x/@ÁlvaroFerrerstatus/', 'https://www.linkedin.com/in/ÁlvaroFerrer.lik', NULL),
(388, 'www.Adrià.loaser.go', '', 'https://x/@AdriàReyesstatus/', 'https://www.linkedin.com/in/AdriàReyes.lik', NULL),
(389, 'www.Beatriz.adee.com', '', 'https://x/@BeatrizCortésstatus/', 'https://www.linkedin.com/in/BeatrizCortés.lik', NULL),
(390, 'www.Lucía.dominar.net', '', 'https://x/@LucíaGilstatus/', 'https://www.linkedin.com/in/LucíaGil.lik', NULL),
(391, 'www.Esther.geadras.ru', '', 'https://x/@EstherHernándezstatus/', 'https://www.linkedin.com/in/EstherHernández.lik', NULL),
(392, 'www.Clara.portma.ru', '', 'https://x/@ClaraCabrerastatus/', 'https://www.linkedin.com/in/ClaraCabrera.lik', NULL),
(393, 'www.Leire.faktu.com', '', 'https://x/@LeireCastañostatus/', 'https://www.linkedin.com/in/LeireCastaño.lik', NULL),
(394, 'www.Rosa.dominar.go', '', 'https://x/@RosaVargasstatus/', 'https://www.linkedin.com/in/RosaVargas.lik', NULL),
(395, 'www.Diego.faktu.uk', '', 'https://x/@DiegoGuerrerostatus/', 'https://www.linkedin.com/in/DiegoGuerrero.lik', NULL),
(396, 'www.Óscar.aorta.go', '', 'https://x/@ÓscarBlancostatus/', 'https://www.linkedin.com/in/ÓscarBlanco.lik', NULL),
(397, 'www.Elena.portma.br', '', 'https://x/@ElenaRodríguezstatus/', 'https://www.linkedin.com/in/ElenaRodríguez.lik', NULL),
(398, 'www.Inés.portma.ru', '', 'https://x/@InésPardostatus/', 'https://www.linkedin.com/in/InésPardo.lik', NULL),
(399, 'www.Diego.dominar.go', '', 'https://x/@DiegoNúñezstatus/', 'https://www.linkedin.com/in/DiegoNúñez.lik', NULL),
(400, 'www.Antonio.geadras.go', '', 'https://x/@AntonioPérezstatus/', 'https://www.linkedin.com/in/AntonioPérez.lik', NULL),
(401, 'www.Oriol.geadras.ger', '', 'https://x/@OriolVallestatus/', 'https://www.linkedin.com/in/OriolValle.lik', NULL),
(402, 'www.Paula.dominar.com', '', 'https://x/@PaulaDíazstatus/', 'https://www.linkedin.com/in/PaulaDíaz.lik', NULL),
(403, 'www.Carlos.geadras.com', '', 'https://x/@CarlosSantosstatus/', 'https://www.linkedin.com/in/CarlosSantos.lik', NULL),
(404, 'www.Ane.dominar.ger', '', 'https://x/@AneRivasstatus/', 'https://www.linkedin.com/in/AneRivas.lik', NULL),
(405, 'www.Juan.aorta.com', '', 'https://x/@JuanAguirrestatus/', 'https://www.linkedin.com/in/JuanAguirre.lik', NULL),
(406, 'www.Ana.portma.ru', '', 'https://x/@AnaVargasstatus/', 'https://www.linkedin.com/in/AnaVargas.lik', NULL),
(407, 'www.Guillermo.loaser.ar', '', 'https://x/@GuillermoDíazstatus/', 'https://www.linkedin.com/in/GuillermoDíaz.lik', NULL),
(408, 'www.Noelia.portma.ru', '', 'https://x/@NoeliaMorastatus/', 'https://www.linkedin.com/in/NoeliaMora.lik', NULL),
(409, 'www.Alicia.vikctum.ger', '', 'https://x/@AliciaBravostatus/', 'https://www.linkedin.com/in/AliciaBravo.lik', NULL),
(410, 'www.Miguel.faktu.go', '', 'https://x/@MiguelMarcosstatus/', 'https://www.linkedin.com/in/MiguelMarcos.lik', NULL),
(411, 'www.Elena.geadras.go', '', 'https://x/@ElenaSánchezstatus/', 'https://www.linkedin.com/in/ElenaSánchez.lik', NULL),
(412, 'www.Marta.loaser.br', '', 'https://x/@MartaPérezstatus/', 'https://www.linkedin.com/in/MartaPérez.lik', NULL),
(413, 'www.José.vikctum.uk', '', 'https://x/@JoséVidalstatus/', 'https://www.linkedin.com/in/JoséVidal.lik', NULL),
(414, 'www.Alejandro.portma.com', '', 'https://x/@AlejandroHerrerastatus/', 'https://www.linkedin.com/in/AlejandroHerrera.lik', NULL),
(415, 'www.Noelia.adee.com', '', 'https://x/@NoeliaRivasstatus/', 'https://www.linkedin.com/in/NoeliaRivas.lik', NULL),
(416, 'www.Leire.adee.net', '', 'https://x/@LeireGarcíastatus/', 'https://www.linkedin.com/in/LeireGarcía.lik', NULL),
(417, 'www.Beatriz.adee.br', '', 'https://x/@BeatrizVidalstatus/', 'https://www.linkedin.com/in/BeatrizVidal.lik', NULL),
(418, 'www.Fernando.faktu.ger', '', 'https://x/@FernandoGilstatus/', 'https://www.linkedin.com/in/FernandoGil.lik', NULL),
(419, 'www.Fernando.loaser.com', '', 'https://x/@FernandoBlancostatus/', 'https://www.linkedin.com/in/FernandoBlanco.lik', NULL),
(420, 'www.Alberto.aorta.br', '', 'https://x/@AlbertoPachecostatus/', 'https://www.linkedin.com/in/AlbertoPacheco.lik', NULL),
(421, 'www.Natalia.adee.br', '', 'https://x/@NataliaCastrostatus/', 'https://www.linkedin.com/in/NataliaCastro.lik', NULL),
(422, 'www.Juan.portma.ger', '', 'https://x/@JuanRamírezstatus/', 'https://www.linkedin.com/in/JuanRamírez.lik', NULL),
(423, 'www.Ana.portma.br', '', 'https://x/@AnaHerrerostatus/', 'https://www.linkedin.com/in/AnaHerrero.lik', NULL),
(424, 'www.Fernando.dominar.uk', '', 'https://x/@FernandoOrtegastatus/', 'https://www.linkedin.com/in/FernandoOrtega.lik', NULL),
(425, 'www.Jesús.vikctum.uk', '', 'https://x/@JesúsOlivaresstatus/', 'https://www.linkedin.com/in/JesúsOlivares.lik', NULL),
(426, 'www.Marta.vikctum.uk', '', 'https://x/@MartaRojasstatus/', 'https://www.linkedin.com/in/MartaRojas.lik', NULL),
(427, 'www.Óscar.dominar.go', '', 'https://x/@ÓscarVegastatus/', 'https://www.linkedin.com/in/ÓscarVega.lik', NULL),
(428, 'www.Clara.loaser.com', '', 'https://x/@ClaraSuárezstatus/', 'https://www.linkedin.com/in/ClaraSuárez.lik', NULL),
(429, 'www.Oriol.vikctum.br', '', 'https://x/@OriolSerranostatus/', 'https://www.linkedin.com/in/OriolSerrano.lik', NULL),
(430, 'www.Txema.geadras.ar', '', 'https://x/@TxemaTéllezstatus/', 'https://www.linkedin.com/in/TxemaTéllez.lik', NULL),
(431, 'www.Inés.vikctum.com', '', 'https://x/@InésCruzstatus/', 'https://www.linkedin.com/in/InésCruz.lik', NULL),
(432, 'www.Óscar.loaser.net', '', 'https://x/@ÓscarCruzstatus/', 'https://www.linkedin.com/in/ÓscarCruz.lik', NULL),
(433, 'www.Enrique.loaser.ger', '', 'https://x/@EnriqueSuárezstatus/', 'https://www.linkedin.com/in/EnriqueSuárez.lik', NULL),
(434, 'JUANPEREZ.COM', '', 'x.com/juanperez', 'linkedin.com/juanperez', NULL),
(435, 'LEOPERALTAMATERCLASS.COM', '', 'x.com/XLEO97', 'linkedin.com/XLEO97', NULL),
(436, 'LEOPERALTAMATERCLASS.COM', '', 'x.com/XLEO97', 'linkedin.com/XLEO97', NULL),
(437, 'LEOPERALTAMATERCLASS.COM', '', 'x.com/XLEO97', 'linkedin.com/XLEO97', NULL),
(438, 'LEOPERALTAMATERCLASS.COM', '', 'x.com/XLEO97', 'linkedin.com/XLEO97', NULL),
(439, 'LEOPERALTAMATERCLASS.COM', '', 'x.com/XLEO97', 'linkedin.com/XLEO97', NULL),
(440, 'LEOPERALTAMATERCLASS.COM', '', 'x.com/XLEO97', 'linkedin.com/XLEO97', NULL),
(441, 'LEOPERALTAMATERCLASS.COM', '', 'x.com/XLEO97', 'linkedin.com/XLEO97', NULL),
(442, 'LEOPERALTAMATERCLASS.COM', '', 'x.com/XLEO97', 'linkedin.com/XLEO97', NULL),
(443, 'LEOPERALTAMATERCLASS.COM', '', 'x.com/XLEO97', 'linkedin.com/XLEO97', NULL),
(444, 'LEOPERALTAMATERCLASS.COM', '', 'x.com/XLEO97', 'linkedin.com/XLEO97', NULL),
(445, 'LEOPERALTAMATERCLASS.COM', '', 'x.com/XLEO97', 'linkedin.com/XLEO97', NULL),
(446, 'LEOPERALTAMATERCLASS.COM', '', 'x.com/XLEO97', 'linkedin.com/XLEO97', NULL),
(447, 'LEOPERALTAMATERCLASS.COM', '', 'x.com/XLEO97', 'linkedin.com/XLEO97', NULL),
(448, 'LEOPERALTAMATERCLASS.COM', '', 'x.com/XLEO97', 'linkedin.com/XLEO97', NULL),
(449, 'LEOPERALTAMATERCLASS.COM', '', 'x.com/XLEO97', 'linkedin.com/XLEO97', NULL),
(450, 'LEOPERALTAMATERCLASS.COM', '', 'x.com/XLEO97', 'linkedin.com/XLEO97', NULL),
(451, NULL, '', NULL, NULL, NULL),
(452, NULL, '', NULL, NULL, NULL),
(453, NULL, '', NULL, NULL, NULL),
(454, NULL, '', NULL, NULL, NULL),
(455, NULL, '', NULL, NULL, NULL),
(456, NULL, '', NULL, NULL, NULL),
(457, NULL, '', NULL, NULL, NULL),
(458, NULL, '', NULL, NULL, NULL),
(459, NULL, '', NULL, NULL, NULL),
(460, NULL, '', NULL, NULL, NULL),
(461, NULL, '', NULL, NULL, NULL),
(462, NULL, '', NULL, NULL, NULL),
(463, NULL, '', NULL, NULL, NULL),
(464, NULL, '', NULL, NULL, NULL),
(465, NULL, '', NULL, NULL, NULL),
(466, NULL, '', NULL, NULL, NULL),
(467, NULL, '', NULL, NULL, NULL),
(468, NULL, '', NULL, NULL, NULL),
(469, NULL, '', NULL, NULL, NULL),
(470, NULL, '', NULL, NULL, NULL),
(471, NULL, '', NULL, NULL, NULL),
(472, NULL, '', NULL, NULL, NULL),
(473, NULL, '', NULL, NULL, NULL),
(474, NULL, '', NULL, NULL, NULL),
(475, NULL, '', NULL, NULL, NULL),
(476, NULL, '', NULL, NULL, NULL),
(477, NULL, '', NULL, NULL, NULL),
(478, NULL, '', NULL, NULL, NULL),
(479, NULL, '', NULL, NULL, NULL),
(480, NULL, '', NULL, NULL, NULL),
(481, NULL, '', NULL, NULL, NULL),
(482, NULL, '', NULL, NULL, NULL),
(483, NULL, '', NULL, NULL, NULL),
(484, NULL, '', NULL, NULL, NULL),
(485, NULL, '', NULL, NULL, NULL),
(486, NULL, '', NULL, NULL, NULL),
(487, NULL, '', NULL, NULL, NULL),
(488, '', '', '', '', NULL),
(489, NULL, '', NULL, NULL, NULL),
(490, NULL, '', NULL, NULL, NULL),
(491, NULL, '', NULL, NULL, NULL),
(492, NULL, '', NULL, NULL, NULL),
(493, '', '', '', '', NULL),
(494, '', '', '', '', NULL),
(495, '', '', '', '', NULL),
(496, '', '', '', '', NULL),
(497, '', '', '', '', NULL),
(498, '', '', '', '', NULL),
(499, '', '', '', '', NULL),
(500, '', '', '', '', NULL),
(501, '', '', '', '', NULL),
(502, '', '', '', '', NULL),
(503, '', '', '', '', NULL),
(504, '', '', '', '', NULL),
(505, '', '', '', '', NULL),
(506, '', '', '', '', NULL),
(507, '', '', '', '', NULL),
(508, '', '', '', '', NULL),
(509, '', '', '', '', NULL),
(510, '', '', '', '', NULL),
(511, '', '', '', '', NULL),
(512, '', '', '', '', NULL),
(513, '', '', '', '', NULL),
(514, '', '', '', '', NULL),
(515, '', '', '', '', NULL),
(516, '', '', '', '', NULL),
(517, 'www.vale.asda.com', '', '', '', NULL),
(518, 'www.vale.asda.com', '', '', '', NULL),
(519, 'www.vale.asda.com', '', '', '', NULL),
(520, 'www.vale.asda.com', '', '', '', NULL),
(521, 'www.vale.asda.com', '', '', '', NULL),
(522, 'www.vale.asda.com', '', '', '', NULL),
(523, 'www.vale.asda.com', '', '', '', NULL),
(524, 'www.vale.asda.com', '', '', '', NULL),
(525, 'www.vale.asda.com', '', '', '', NULL),
(526, 'www.vale.asda.com', '', '', '', NULL),
(527, 'www.vale.asda.com', '', '', '', NULL),
(528, 'www.vale.asda.com', '', '', '', NULL),
(529, 'www.vale.asda.com', '', '', '', NULL),
(530, 'www.vale.asda.com', '', '', '', NULL),
(531, 'www.vale.asda.com', '', '', '', NULL),
(532, 'www.vale.asda.com', '', '', '', NULL),
(533, 'www.vale.asda.com', '', 'x@valentinaa45', 'x@valentinaa45', NULL),
(534, 'www.vale.asda.com', '', 'x@valentinaa45', 'x@valentinaa45', NULL),
(535, 'www.vale.asda.com', '', 'x@valentinaa45', 'x@valentinaa45', NULL),
(536, 'www.vale.asda.com', '', 'x@valentinaa45', 'x@valentinaa45', NULL),
(537, 'www.asdjkasdkjasd.com', '', 'asklkmas', 'dasklasdklda', NULL),
(538, 'www.asdjkasdkjasd.com', '', 'asklkmas', 'dasklasdklda', NULL),
(539, '@jkdfjksdfj', '', 'askdsjkaasdn', 'dasjkdsajk', NULL),
(540, '@jkdfjksdfj', '', 'askdsjkaasdn', 'dasjkdsajk', NULL),
(541, '', '', '', '', NULL),
(542, '', '', '', '', NULL),
(543, '', '', '', '', NULL),
(544, '', '', '', '', NULL),
(545, 'www.messi.com', '', '@tabiño', '@tabiñomin', NULL),
(546, 'www.messi.com', '', '@tabiño', '@tabiñomin', NULL),
(547, 'www.portafolioianral.com', '', NULL, NULL, NULL),
(548, 'www.portafolioianral.com', '', NULL, NULL, NULL),
(549, 'www.Clara.faktu.ger', '', 'httpsx@ClaraFloresstatus', 'httpswww.linkedin.cominClaraFlores.lik', NULL),
(550, 'www.Clara.faktu.ger', '', 'httpsx@ClaraFloresstatus', 'httpswww.linkedin.cominClaraFlores.lik', NULL),
(551, 'www.In?s.dominar.net', '', 'httpsx@In?sPastorstatus', 'httpswww.linkedin.cominIn?sPastor.lik', NULL),
(552, 'www.In?s.dominar.net', '', 'httpsx@In?sPastorstatus', 'httpswww.linkedin.cominIn?sPastor.lik', NULL),
(553, 'www.tiaguiñomalvadiño.com', '', '@tiagoramondino', '@tiaguiño', NULL),
(554, 'www.tiaguiñomalvadiño.com', '', '@tiagoramondino', '@tiaguiño', NULL),
(555, 'www.asdaskdak.com', '', '@fajkfskj', '@fasjkafjaf', NULL),
(556, 'www.asdaskdak.com', '', '@fajkfskj', '@fasjkafjaf', NULL),
(557, 'www.tiaguiñomalvadiño.com', '', '@fajkfskj', '@tiaguiño', NULL),
(558, 'www.tiaguiñomalvadiño.com', '', '@fajkfskj', '@tiaguiño', NULL),
(559, NULL, '', NULL, NULL, NULL),
(560, NULL, '', NULL, NULL, NULL),
(561, NULL, '', NULL, NULL, NULL),
(562, NULL, '', NULL, NULL, NULL),
(563, NULL, '', NULL, NULL, NULL),
(564, NULL, '', NULL, NULL, NULL),
(565, NULL, '', NULL, NULL, NULL),
(566, NULL, '', NULL, NULL, NULL),
(567, NULL, '', NULL, NULL, NULL),
(568, NULL, '', NULL, NULL, NULL),
(569, NULL, '', NULL, NULL, NULL),
(570, NULL, '', NULL, NULL, NULL),
(571, NULL, '', NULL, NULL, NULL),
(572, NULL, '', NULL, NULL, NULL),
(573, NULL, '', NULL, NULL, NULL),
(574, NULL, '', NULL, NULL, NULL),
(575, NULL, '', NULL, NULL, NULL),
(576, NULL, '', NULL, NULL, NULL),
(577, NULL, '', NULL, NULL, NULL),
(578, NULL, '', NULL, NULL, NULL),
(579, NULL, '', NULL, NULL, NULL),
(580, NULL, '', NULL, NULL, NULL),
(581, NULL, '', NULL, NULL, NULL),
(582, NULL, '', NULL, NULL, NULL),
(583, 'https://getbootstrap.com/docs/5.3/examples/', '', NULL, NULL, NULL),
(584, 'https://getbootstrap.com/docs/5.3/examples/', '', NULL, NULL, NULL),
(585, 'https://getbootstrap.com/docs/5.3/examples/', '', NULL, NULL, NULL),
(586, 'https://getbootstrap.com/docs/5.3/examples/', '', NULL, NULL, NULL),
(587, 'https://getbootstrap.com/docs/5.3/examples/', '', NULL, NULL, NULL),
(588, 'https://getbootstrap.com/docs/5.3/examples/', '', NULL, NULL, NULL),
(589, 'https://getbootstrap.com/docs/5.3/examples/', '', NULL, NULL, NULL),
(590, 'https://getbootstrap.com/docs/5.3/examples/', '', NULL, NULL, NULL),
(591, 'https://getbootstrap.com/docs/5.3/examples/', '', NULL, NULL, NULL),
(592, 'https://getbootstrap.com/docs/5.3/examples/', '', NULL, NULL, NULL),
(593, 'https://getbootstrap.com/docs/5.3/examples/', '', NULL, NULL, NULL),
(594, 'https://getbootstrap.com/docs/5.3/examples/', '', NULL, NULL, NULL),
(595, NULL, '', NULL, NULL, NULL),
(596, NULL, '', NULL, NULL, NULL),
(597, NULL, '', NULL, NULL, NULL),
(598, NULL, '', NULL, NULL, NULL),
(599, NULL, '', NULL, NULL, NULL),
(600, NULL, '', NULL, NULL, NULL),
(601, NULL, '', NULL, NULL, NULL),
(602, NULL, '', NULL, NULL, NULL),
(603, NULL, '', NULL, NULL, NULL),
(604, NULL, '', NULL, NULL, NULL),
(605, NULL, '', NULL, NULL, NULL),
(606, NULL, '', NULL, NULL, NULL),
(607, NULL, '', NULL, NULL, NULL),
(608, NULL, '', NULL, NULL, NULL),
(609, NULL, '', NULL, NULL, NULL),
(610, NULL, '', NULL, NULL, NULL),
(611, NULL, '', NULL, NULL, NULL),
(612, NULL, '', NULL, NULL, NULL),
(613, NULL, '', NULL, NULL, NULL),
(614, NULL, '', NULL, NULL, NULL),
(615, NULL, '', NULL, NULL, NULL),
(616, NULL, '', NULL, NULL, NULL),
(617, NULL, '', NULL, NULL, NULL),
(618, NULL, '', NULL, NULL, NULL),
(619, NULL, '', NULL, NULL, NULL),
(620, NULL, '', NULL, NULL, NULL),
(621, NULL, '', NULL, NULL, NULL),
(622, NULL, '', NULL, NULL, NULL),
(623, NULL, '', NULL, NULL, NULL),
(624, NULL, '', NULL, NULL, NULL),
(625, 'https://example.com/juan', '', 'https://twitter.com/juan_perez', 'https://linkedin.com/in/juanperez', 1),
(626, 'https://example.com/maria', '', 'https://twitter.com/maria_gomez', 'https://linkedin.com/in/mariagomez', 2),
(627, 'https://example.com/carlos', '', 'https://twitter.com/carlos_sanchez', 'https://linkedin.com/in/carlossanchez', 3),
(628, 'https://example.com/ana', '', 'https://twitter.com/ana_martinez', 'https://linkedin.com/in/anamartinez', 4),
(629, 'https://example.com/luis', '', 'https://twitter.com/luis_lopez', 'https://linkedin.com/in/luislopez', 5),
(630, 'https://example.com/laura', '', 'https://twitter.com/laura_hernandez', 'https://linkedin.com/in/laurahernandez', 6),
(631, 'https://example.com/pedro', '', 'https://twitter.com/pedro_ramirez', 'https://linkedin.com/in/pedroramirez', 7),
(632, 'https://example.com/sofia', '', 'https://twitter.com/sofia_cruz', 'https://linkedin.com/in/sofiacruz', 8),
(633, 'https://example.com/diego', '', 'https://twitter.com/diego_torres', 'https://linkedin.com/in/diegotorres', 9),
(634, 'https://example.com/valentina', '', 'https://twitter.com/valentina_morales', 'https://linkedin.com/in/valentinamorales', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL,
  `idioma` varchar(255) DEFAULT NULL,
  `disertante_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id`, `titulo`, `descripcion`, `fecha`, `hora`, `duracion`, `idioma`, `disertante_id`) VALUES
(1, 'desarrollo de Sotfware Gestion de Eventos 1', 'Es una catedra donde estudiamos las formas en las que creamos Sotfware ', '2024-06-12', '17:00:00', 6, 'Ingles', 333),
(10, 'Seguridad', '\r\n    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo impedit, quisquam necessitatibus minus atque corporis qui magni eveniet aliquam fugit voluptatum, similique quae numquam. Necessitatibus atque dolor laborum ad inventore. ', '2024-06-05', '12:00:00', 10, 'Español', 333),
(11, 'Seguridad en la BlockChain', '\r\n    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo impedit, quisquam necessitatibus minus atque corporis qui magni eveniet aliquam fugit voluptatum, similique quae numquam. Necessitatibus atque dolor laborum ad inventore. ', '2024-06-05', '12:00:00', 10, 'Español', 333),
(12, 'BlockChain', '\r\n    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo impedit, quisquam necessitatibus minus atque corporis qui magni eveniet aliquam fugit voluptatum, similique quae numquam. Necessitatibus atque dolor laborum ad inventore. ', '2024-06-05', '12:00:00', 10, 'Español', 333),
(13, 'Desarrollo de Python', '\r\n    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo impedit, quisquam necessitatibus minus atque corporis qui magni eveniet aliquam fugit voluptatum, similique quae numquam. Necessitatibus atque dolor laborum ad inventore. ', '2024-06-05', '12:00:00', 10, 'Español', 333),
(14, 'Desarrollo de Java', '\r\n    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo impedit, quisquam necessitatibus minus atque corporis qui magni eveniet aliquam fugit voluptatum, similique quae numquam. Necessitatibus atque dolor laborum ad inventore. ', '2024-06-05', '12:00:00', 10, 'Español', 333),
(15, 'Introduccion a Laravel', '\r\n    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo impedit, quisquam necessitatibus minus atque corporis qui magni eveniet aliquam fugit voluptatum, similique quae numquam. Necessitatibus atque dolor laborum ad inventore. ', '2024-06-05', '12:00:00', 10, 'Español', 333),
(16, 'Laravel Fase 1', '\r\n    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo impedit, quisquam necessitatibus minus atque corporis qui magni eveniet aliquam fugit voluptatum, similique quae numquam. Necessitatibus atque dolor laborum ad inventore. ', '2024-06-05', '12:00:00', 10, 'Ingles', 336),
(17, 'Laravel Fase 2', '\r\n    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo impedit, quisquam necessitatibus minus atque corporis qui magni eveniet aliquam fugit voluptatum, similique quae numquam. Necessitatibus atque dolor laborum ad inventore. ', '2024-06-05', '12:00:00', 10, 'Ingles', 336),
(18, 'Salidas laborales en Argentina', '\r\n    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo impedit, quisquam necessitatibus minus atque corporis qui magni eveniet aliquam fugit voluptatum, similique quae numquam. Necessitatibus atque dolor laborum ad inventore. ', '2024-06-05', '12:00:00', 10, 'Ingles', 335),
(19, 'Entrevistas laborales', '\r\n    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo impedit, quisquam necessitatibus minus atque corporis qui magni eveniet aliquam fugit voluptatum, similique quae numquam. Necessitatibus atque dolor laborum ad inventore. ', '2024-06-05', '12:00:00', 10, 'Ingles', 336),
(20, 'Experiencia Laboral', '\r\n    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo impedit, quisquam necessitatibus minus atque corporis qui magni eveniet aliquam fugit voluptatum, similique quae numquam. Necessitatibus atque dolor laborum ad inventore. ', '2024-06-05', '12:00:00', 10, 'Ingles', 337);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscriptos`
--

CREATE TABLE `inscriptos` (
  `id` int(11) NOT NULL,
  `evento_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_carga` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscriptos`
--

INSERT INTO `inscriptos` (`id`, `evento_id`, `usuario_id`, `fecha_carga`) VALUES
(12, 12, 2, '2024-10-02'),
(13, 13, 3, '2024-10-03'),
(14, 14, 4, '2024-10-04'),
(15, 15, 5, '2024-10-05'),
(16, 11, 6, '2024-10-06'),
(17, 12, 7, '2024-10-07'),
(18, 13, 8, '2024-10-08'),
(19, 14, 9, '2024-10-09'),
(20, 15, 10, '2024-10-10'),
(22, 12, 11, '2024-11-05'),
(23, 14, 11, '2024-11-08'),
(24, 1, 11, '2024-11-05'),
(25, 10, 11, '2024-11-05'),
(26, 11, 11, '2024-11-05'),
(27, 13, 11, '2024-11-05'),
(28, 15, 11, '2024-11-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `apellidos`, `telefono`, `email`) VALUES
(1, 'Juanes', 'P?rez', '12345678', 'juan.perez@example.com'),
(2, 'María', 'Gómez', '23456789', 'maria.gomez@example.com'),
(3, 'Carlos', 'Sánchez', '34567890', 'carlos.sanchez@example.com'),
(4, 'Ana', 'Martínez', '45678901', 'ana.martinez@example.com'),
(5, 'Luis', 'López', '56789012', 'luis.lopez@example.com'),
(6, 'Laura', 'Hernández', '67890123', 'laura.hernandez@example.com'),
(7, 'Pedro', 'Ramírez', '78901234', 'pedro.ramirez@example.com'),
(8, 'Sofía', 'Cruz', '89012345', 'sofia.cruz@example.com'),
(9, 'Diego', 'Torres', '90123456', 'diego.torres@example.com'),
(10, 'Valentina', 'Morales', '01234567', 'valentina.morales@example.com'),
(15, 'valea', 'boll', '3121286800', 'valetniai@gmail.com'),
(17, 'tiago', 'brustanmol', '6019521325', 'test@example.us'),
(18, 'tiago', 'brustanmol', '6019521325', 'test@example.us'),
(19, 'Jo?o', 'caresa', '6019521325', 'test@example.us'),
(20, 'Jon', 'SouzaSilva', '030303986300', 'tiagoraminelli@gmail.com'),
(21, 'Jonas', 'Doe', '5553428400', 'ejemplo@ejemplo.mx'),
(22, 'tiago', 'SouzaSilva', '3121286800', 'juan.perez@example.com'),
(23, 'tiago', 'SouzaSilva', '3121286800', 'juan.perez@example.com'),
(24, 'test', 'test', '11291111', 'teste@exemplo.us'),
(25, 'test', 'test', '11291111', 'teste@exemplo.us'),
(27, 'LEO', 'PERALTA', '112312312331', 'LEOOOO@gmail.com'),
(30, 'root', 'root', '3121286800', 'testnuevo@example.us');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `password` varchar(45) NOT NULL,
  `persona_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `dni`, `direccion`, `password`, `persona_id`) VALUES
(2, '23456789', 'Calle 2, Ciudad', 'password2', 2),
(3, '34567890', 'Calle 3, Ciudad', 'password3', 3),
(4, '45678901', 'Calle 4, Ciudad', 'password4', 4),
(5, '56789012', 'Calle 5, Ciudad', 'password5', 5),
(6, '67890123', 'Calle 6, Ciudad', 'password6', 6),
(7, '78901234', 'Calle 7, Ciudad', 'password7', 7),
(8, '89012345', 'Calle 8, Ciudad', 'password8', 8),
(9, '90123456', 'Calle 9, Ciudad', 'password9', 9),
(10, '01234567', 'Calle 10, Ciudad', 'password10', 10),
(11, '12121212', 'root', '1234', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `disertante`
--
ALTER TABLE `disertante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_persona` (`persona_id`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Evento_disertante1_idx` (`disertante_id`);

--
-- Indices de la tabla `inscriptos`
--
ALTER TABLE `inscriptos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evento_id` (`evento_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_persona` (`persona_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `disertante`
--
ALTER TABLE `disertante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=635;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `inscriptos`
--
ALTER TABLE `inscriptos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `disertante`
--
ALTER TABLE `disertante`
  ADD CONSTRAINT `fk_persona` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_Evento_disertante1` FOREIGN KEY (`disertante_id`) REFERENCES `disertante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inscriptos`
--
ALTER TABLE `inscriptos`
  ADD CONSTRAINT `inscriptos_ibfk_1` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`id`),
  ADD CONSTRAINT `inscriptos_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_persona` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
