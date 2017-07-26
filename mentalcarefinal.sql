-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2017 a las 18:05:21
-- Versión del servidor: 10.2.6-MariaDB
-- Versión de PHP: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mentalcarefinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admisiones`
--

CREATE TABLE `admisiones` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `facturado` tinyint(4) NOT NULL,
  `paciente_id` int(10) UNSIGNED DEFAULT NULL,
  `comprobante_id` int(10) UNSIGNED DEFAULT NULL,
  `tipopago` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alergias`
--

CREATE TABLE `alergias` (
  `paciente_id` int(10) UNSIGNED NOT NULL,
  `componente_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alergias`
--

INSERT INTO `alergias` (`paciente_id`, `componente_id`) VALUES
(1, 3),
(1, 5),
(1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_sintomas`
--

CREATE TABLE `categoria_sintomas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(10) UNSIGNED NOT NULL,
  `paciente_id` int(10) UNSIGNED NOT NULL,
  `horario_medico_id` int(10) UNSIGNED NOT NULL,
  `fecha_de_cita` datetime NOT NULL,
  `motivo_cita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes`
--

CREATE TABLE `componentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `componentes`
--

INSERT INTO `componentes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Isotretinoína', '2017-07-25 19:55:20', '2017-07-25 19:55:20'),
(3, 'Acetilcarnitina', '2017-07-25 20:00:36', '2017-07-25 20:00:36'),
(4, 'Albúmina Humana', '2017-07-25 20:03:31', '2017-07-25 20:03:31'),
(5, 'Minociclina', '2017-07-25 20:06:25', '2017-07-25 20:06:25'),
(6, 'Naratriptán', '2017-07-25 20:08:03', '2017-07-25 20:08:03'),
(7, 'Retinol', '2017-07-25 20:23:46', '2017-07-25 20:23:46'),
(8, 'Carvedilol', '2017-07-25 20:26:09', '2017-07-25 20:26:09'),
(9, 'Cafeína', '2017-07-25 20:28:18', '2017-07-25 20:28:18'),
(10, 'Dipirona', '2017-07-25 20:28:30', '2017-07-25 20:28:30'),
(11, 'Ergotamina', '2017-07-25 20:28:40', '2017-07-25 20:28:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componente_medicamento`
--

CREATE TABLE `componente_medicamento` (
  `id` int(10) UNSIGNED NOT NULL,
  `componente_id` int(10) UNSIGNED NOT NULL,
  `medicamento_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `componente_medicamento`
--

INSERT INTO `componente_medicamento` (`id`, `componente_id`, `medicamento_id`) VALUES
(1, 1, 1),
(2, 3, 2),
(3, 4, 3),
(4, 5, 4),
(5, 6, 5),
(6, 7, 6),
(7, 8, 7),
(8, 9, 8),
(9, 10, 8),
(10, 11, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobantes`
--

CREATE TABLE `comprobantes` (
  `id` int(10) UNSIGNED NOT NULL,
  `serie` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razonsocial` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipocomprobante_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `abreviatura` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `name`, `created_at`, `updated_at`, `abreviatura`) VALUES
(1, 'AREQUIPA', '2017-07-25 07:06:01', '2017-07-25 07:06:01', 'AQP'),
(2, 'LIMA', '2017-07-25 07:06:01', '2017-07-25 07:06:01', 'LIMA'),
(3, 'CUZCO', '2017-07-25 07:06:01', '2017-07-25 07:06:01', 'CUZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnosticos`
--

CREATE TABLE `diagnosticos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `paciente_id` int(10) UNSIGNED NOT NULL,
  `prescription_id` int(10) UNSIGNED NOT NULL,
  `retorno` date DEFAULT NULL,
  `recomendacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico_enfermedad`
--

CREATE TABLE `diagnostico_enfermedad` (
  `id` int(10) UNSIGNED NOT NULL,
  `enfermedad_id` int(10) UNSIGNED NOT NULL,
  `diagnostico_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico_sintoma`
--

CREATE TABLE `diagnostico_sintoma` (
  `id` int(10) UNSIGNED NOT NULL,
  `sintoma_id` int(10) UNSIGNED NOT NULL,
  `diagnostico_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `id` int(10) UNSIGNED NOT NULL,
  `dias` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos`
--

CREATE TABLE `egresos` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `comprobante_id` int(10) UNSIGNED DEFAULT NULL,
  `paciente_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad`
--

CREATE TABLE `enfermedad` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `especialidad_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad_sintoma`
--

CREATE TABLE `enfermedad_sintoma` (
  `id` int(10) UNSIGNED NOT NULL,
  `enfermedad_id` int(10) UNSIGNED NOT NULL,
  `sintoma_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id` int(10) UNSIGNED NOT NULL,
  `especialidad` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades_medicas`
--

CREATE TABLE `especialidades_medicas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_cita`
--

CREATE TABLE `estado_cita` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado_cita` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historials`
--

CREATE TABLE `historials` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_medico`
--

CREATE TABLE `horario_medico` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha_hora_inicio` datetime NOT NULL,
  `fecha_hora_fin` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_medicos`
--

CREATE TABLE `horario_medicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `medicos_id` int(10) UNSIGNED DEFAULT NULL,
  `dias_id` int(10) UNSIGNED DEFAULT NULL,
  `slots_id` int(10) UNSIGNED DEFAULT NULL,
  `estado` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `paciente_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `efecSecundarios` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adversos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id`, `nombre`, `descripcion`, `efecSecundarios`, `adversos`, `created_at`, `updated_at`) VALUES
(1, 'ACNOTIN', 'isotretinoína reduce el tamaño de la glándula sebácea e inhibe su actividad, disminuyendo de este modo la secreción sebácea. Asdemás se ha demostrado que isotretinoína tiene acciones anti-keratinizantes y anti-inflamatorias', 'Síntomas asociados a la hipervitaminosis A: sequedad de la piel y de las mucosas, epistaxis, conjuntivitis, opacidad córnea reversible e intolerancia a los lentes de contacto.', 'isotretinoína es altamente teratogénica.', '2017-07-25 20:00:05', '2017-07-25 20:00:05'),
(2, 'ACTIGERON', ': induce un aumento en la síntesis del receptor específico para el factor de crecimiento neuronal en neuronas colinérgicas envejecidas.', ': induce un aumento en la síntesis del receptor específico para el factor de crecimiento neuronal en neuronas colinérgicas envejecidas.', ': induce un aumento en la síntesis del receptor específico para el factor de crecimiento neuronal en neuronas colinérgicas envejecidas.', '2017-07-25 20:03:13', '2017-07-25 20:03:13'),
(3, 'ALBUNORM', 'La albúmina humana es cuantitativamente más de la mitad de la proteína total del plasma y representa cerca del 10% de la actividad de síntesis proteica del hígado.', 'La albúmina humana es cuantitativamente más de la mitad de la proteína total del plasma y representa cerca del 10% de la actividad de síntesis proteica del hígado.', 'La albúmina humana es cuantitativamente más de la mitad de la proteína total del plasma y representa cerca del 10% de la actividad de síntesis proteica del hígado.', '2017-07-25 20:06:04', '2017-07-25 20:06:04'),
(4, 'BAGOMICINA', 'Tratamiento de infecciones genitourinarias, del tracto respiratorio, de la piel, tejidos blandos, acné vulgaris y otras infecciones ocasionadas por gérmenes sensibles.', 'Tratamiento de infecciones genitourinarias, del tracto respiratorio, de la piel, tejidos blandos, acné vulgaris y otras infecciones ocasionadas por gérmenes sensibles.', 'Tratamiento de infecciones genitourinarias, del tracto respiratorio, de la piel, tejidos blandos, acné vulgaris y otras infecciones ocasionadas por gérmenes sensibles.', '2017-07-25 20:07:37', '2017-07-25 20:07:37'),
(5, 'BAGOMIGRAL', 'Es aconsejable administrar Bagomigral inmediatamente, después del comienzo de un ataque de migraña, pero es igualmente eficaz si se administra en una etapa más tardía.', 'Es aconsejable administrar Bagomigral inmediatamente, después del comienzo de un ataque de migraña, pero es igualmente eficaz si se administra en una etapa más tardía.', 'Es aconsejable administrar Bagomigral inmediatamente, después del comienzo de un ataque de migraña, pero es igualmente eficaz si se administra en una etapa más tardía.', '2017-07-25 20:08:50', '2017-07-25 20:08:50'),
(6, 'BAGOVIT-A', 'Nutriente e hidratante cutáneo', 'Nutriente e hidratante cutáneo', 'Nutriente e hidratante cutáneo', '2017-07-25 20:25:32', '2017-07-25 20:25:32'),
(7, 'BLOCAR', 'Carvedilol no se debe usar en: enfermedad pulmonar obstructiva crónica, asma, bloqueo AV de segundo y tercer grado.', 'Carvedilol no se debe usar en: enfermedad pulmonar obstructiva crónica, asma, bloqueo AV de segundo y tercer grado.', 'Carvedilol no se debe usar en: enfermedad pulmonar obstructiva crónica, asma, bloqueo AV de segundo y tercer grado.', '2017-07-25 20:27:42', '2017-07-25 20:27:42'),
(8, 'MIGRANOL', 'El uso de este medicamento está contraindicado en enfermedades coronarias, insuficiencia hepática, hipertensión arterial severa, enfermedades vasculares periféricas, sepsis, insuficiencia renal y úlcera péptica.', 'El uso de este medicamento está contraindicado en enfermedades coronarias, insuficiencia hepática, hipertensión arterial severa, enfermedades vasculares periféricas, sepsis, insuficiencia renal y úlcera péptica.', 'El uso de este medicamento está contraindicado en enfermedades coronarias, insuficiencia hepática, hipertensión arterial severa, enfermedades vasculares periféricas, sepsis, insuficiencia renal y úlcera péptica.', '2017-07-25 20:30:50', '2017-07-25 20:30:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicinas`
--

CREATE TABLE `medicinas` (
  `id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `presentacion_id` int(10) UNSIGNED NOT NULL,
  `medicamento_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medicinas`
--

INSERT INTO `medicinas` (`id`, `cantidad`, `presentacion_id`, `medicamento_id`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 1, '2017-07-25 20:00:05', '2017-07-25 20:00:05'),
(2, 500, 1, 2, '2017-07-25 20:03:13', '2017-07-25 20:03:13'),
(3, 50, 2, 3, '2017-07-25 20:06:05', '2017-07-25 20:06:05'),
(4, 50, 3, 4, '2017-07-25 20:07:37', '2017-07-25 20:07:37'),
(5, 50, 3, 5, '2017-07-25 20:08:50', '2017-07-25 20:08:50'),
(6, 100, 4, 6, '2017-07-25 20:25:33', '2017-07-25 20:25:33'),
(7, 25, 1, 7, '2017-07-25 20:27:42', '2017-07-25 20:27:42'),
(8, 5, 1, 8, '2017-07-25 20:30:50', '2017-07-25 20:30:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicina_prescription`
--

CREATE TABLE `medicina_prescription` (
  `medicina_id` int(10) UNSIGNED NOT NULL,
  `prescription_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medicina_prescription`
--

INSERT INTO `medicina_prescription` (`medicina_id`, `prescription_id`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `personas_id` int(10) UNSIGNED DEFAULT NULL,
  `especialidad_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_02_11_053532_crear_tabla_departamentos', 1),
(4, '2017_02_20_001140_create_personas_table', 1),
(5, '2017_03_01_045005_actualizar_usuario_010317', 1),
(6, '2017_03_01_050537_actualizar_usuario_nullable', 1),
(7, '2017_03_14_101621_create_estados_table', 1),
(8, '2017_03_16_001145_create_pacientes_estados_table', 1),
(9, '2017_04_16_001147_create_pacientes_table', 1),
(10, '2017_04_27_044508_actualizar_tabla_departamento', 1),
(11, '2017_04_28_033411_crear_especialidades', 1),
(12, '2017_04_28_035150_especialidad', 1),
(13, '2017_04_28_051253_sintomas', 1),
(14, '2017_04_28_052534_enfermedad', 1),
(15, '2017_05_02_075736_status', 1),
(16, '2017_05_02_082031_crear_tabla_enfermedad_sintoma', 1),
(17, '2017_05_08_013232_especialidad_enfermedad', 1),
(18, '2017_05_08_090351_turnos', 1),
(19, '2017_05_08_160658_doctores', 1),
(20, '2017_05_10_112648_create_prescriptions_table', 1),
(21, '2017_05_10_112648_diagnostico', 1),
(22, '2017_05_10_114820_diagnostico_foreing', 1),
(23, '2017_05_10_160932_enfermedades_diagnostico', 1),
(24, '2017_05_10_171055_diagnostico_sintomas', 1),
(25, '2017_05_20_202928_categoria_sintom', 1),
(26, '2017_05_20_222629_sintoma_categoria_foreing', 1),
(27, '2017_06_03_031153_create_especialidad_table', 1),
(28, '2017_06_03_212215_crear_iniciales', 1),
(29, '2017_06_04_030137_create_medicos_table', 1),
(30, '2017_06_13_023303_create_medicamentos_table', 1),
(31, '2017_06_13_023310_create_presentacions_table', 1),
(32, '2017_06_13_023312_create_medicinas_table', 1),
(33, '2017_06_13_023338_create_componentes_table', 1),
(34, '2017_06_16_001126_create_tiposcomprobantes_table', 1),
(35, '2017_06_16_001142_create_historials_table', 1),
(36, '2017_06_16_001304_create_comprobantes_table', 1),
(37, '2017_06_16_001437_create_ingresos_table', 1),
(38, '2017_06_16_001458_create_egresos_table', 1),
(39, '2017_06_16_041137_create_admisiones_table', 1),
(40, '2017_07_02_145036_create_componente_medicamento_table', 1),
(41, '2017_07_14_101622_create_horario_medico_table', 1),
(42, '2017_07_14_101623_create_citas_table', 1),
(43, '2017_07_14_103852_create_estado_cita_table', 1),
(44, '2017_07_14_104807_create_pago_table', 1),
(45, '2017_07_15_025843_create_dias_table', 1),
(46, '2017_07_15_025850_create_medicina_prescription_table', 1),
(47, '2017_07_15_025949_create_slots_table', 1),
(48, '2017_07_15_025950_create_horario_medicos_table', 1),
(49, '2017_07_15_101120_create_reporte_table', 1),
(50, '2017_07_15_171435_create_alergias_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `persona_id` int(10) UNSIGNED NOT NULL,
  `estado_id` int(10) UNSIGNED NOT NULL,
  `departamento_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `persona_id`, `estado_id`, `departamento_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_estados`
--

CREATE TABLE `pacientes_estados` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes_estados`
--

INSERT INTO `pacientes_estados` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Internado', '2017-07-25 20:47:35', '2017-07-25 20:47:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `codigo_pago` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_de_pago` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(10) UNSIGNED NOT NULL,
  `apellidopaterno` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidomaterno` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` int(10) UNSIGNED NOT NULL,
  `sexo` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechanacimiento` date NOT NULL,
  `direccion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `apellidopaterno`, `apellidomaterno`, `nombres`, `dni`, `sexo`, `fechanacimiento`, `direccion`, `telefono`, `email`, `created_at`, `updated_at`) VALUES
(1, 'VIsa', 'FLores', 'Alberto', 10000000, 'M', '1995-08-25', 'QUETI IIII', '999999999', 'admin@sistema.com', '2017-07-25 07:06:01', '2017-07-25 07:06:01'),
(2, 'Mendoza', 'Vasdas', 'Alexis', 12345678, 'M', '1997-06-02', 'QUETI I', '451166', 'tex@mail.com', '2017-07-25 07:06:01', '2017-07-25 07:06:01'),
(3, 'Apaza', 'Torres', 'Alexander', 77036017, 'M', '1997-06-02', 'QUETI III', '921344415', 'alrus2797@sistema.com', '2017-07-25 07:06:02', '2017-07-25 07:06:02'),
(4, 'Bernal', 'Chahuayo', 'Luis', 98765435, 'M', '1998-02-15', 'Av. Las torres', '019283', 'luis@mail.com', '2017-07-25 20:49:02', '2017-07-25 20:50:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `observacion` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instrucciones` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medico_id` int(10) UNSIGNED NOT NULL,
  `paciente_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `observacion`, `instrucciones`, `medico_id`, `paciente_id`, `created_at`, `updated_at`) VALUES
(1, 'Comportamiento extraño', 'tomar 5 veces al día la pastilla', 2, 1, '2017-07-25 20:52:38', '2017-07-25 20:52:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacions`
--

CREATE TABLE `presentacions` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `presentacions`
--

INSERT INTO `presentacions` (`id`, `descripcion`, `unidad`, `created_at`, `updated_at`) VALUES
(1, 'cápsula', 'mg', '2017-07-25 19:56:42', '2017-07-25 19:56:42'),
(2, 'Fasco', 'ml', '2017-07-25 20:04:04', '2017-07-25 20:04:04'),
(3, 'Comprimido', 'mg', '2017-07-25 20:06:50', '2017-07-25 20:06:50'),
(4, 'Crema', 'gr', '2017-07-25 20:24:23', '2017-07-25 20:24:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintomas`
--

CREATE TABLE `sintomas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categoria_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slots`
--

CREATE TABLE `slots` (
  `id` int(10) UNSIGNED NOT NULL,
  `start_time` datetime NOT NULL,
  `finish_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposcomprobantes`
--

CREATE TABLE `tiposcomprobantes` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `departamento_id` int(10) UNSIGNED DEFAULT NULL,
  `persona_id` int(10) UNSIGNED NOT NULL,
  `tipo_usuario` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `turno_id` int(10) UNSIGNED DEFAULT NULL,
  `especialidad_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `departamento_id`, `persona_id`, `tipo_usuario`, `turno_id`, `especialidad_id`) VALUES
(1, 'admin@sistema.com', '$2y$10$cvwCXRR.MS0o7vgAQ.716.IC30F5f4oo24eHquD2v53.ZbDV9yiue', NULL, '2017-07-25 07:06:01', '2017-07-25 07:06:01', NULL, 1, 'Administrador', NULL, NULL),
(2, 'tex@mail.com', '$2y$10$otfHkJH8mcbisjearE2Ss.7tYvGCmzxzEQ2.ck0NM17K/YO1nzrxa', NULL, '2017-07-25 07:06:02', '2017-07-25 07:06:02', NULL, 2, 'Medico', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admisiones`
--
ALTER TABLE `admisiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admisiones_paciente_id_foreign` (`paciente_id`),
  ADD KEY `admisiones_comprobante_id_foreign` (`comprobante_id`);

--
-- Indices de la tabla `alergias`
--
ALTER TABLE `alergias`
  ADD KEY `alergias_paciente_id_foreign` (`paciente_id`),
  ADD KEY `alergias_componente_id_foreign` (`componente_id`);

--
-- Indices de la tabla `categoria_sintomas`
--
ALTER TABLE `categoria_sintomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `citas_paciente_id_foreign` (`paciente_id`),
  ADD KEY `citas_horario_medico_id_foreign` (`horario_medico_id`),
  ADD KEY `citas_estado_id_foreign` (`estado_id`);

--
-- Indices de la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `componente_medicamento`
--
ALTER TABLE `componente_medicamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `componente_medicamento_componente_id_foreign` (`componente_id`),
  ADD KEY `componente_medicamento_medicamento_id_foreign` (`medicamento_id`);

--
-- Indices de la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comprobantes_tipocomprobante_id_foreign` (`tipocomprobante_id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnosticos_user_id_foreign` (`user_id`),
  ADD KEY `diagnosticos_paciente_id_foreign` (`paciente_id`),
  ADD KEY `diagnosticos_prescription_id_foreign` (`prescription_id`);

--
-- Indices de la tabla `diagnostico_enfermedad`
--
ALTER TABLE `diagnostico_enfermedad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnostico_enfermedad_enfermedad_id_foreign` (`enfermedad_id`),
  ADD KEY `diagnostico_enfermedad_diagnostico_id_foreign` (`diagnostico_id`);

--
-- Indices de la tabla `diagnostico_sintoma`
--
ALTER TABLE `diagnostico_sintoma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnostico_sintoma_sintoma_id_foreign` (`sintoma_id`),
  ADD KEY `diagnostico_sintoma_diagnostico_id_foreign` (`diagnostico_id`);

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `egresos_comprobante_id_foreign` (`comprobante_id`),
  ADD KEY `egresos_paciente_id_foreign` (`paciente_id`);

--
-- Indices de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enfermedad_especialidad_id_foreign` (`especialidad_id`);

--
-- Indices de la tabla `enfermedad_sintoma`
--
ALTER TABLE `enfermedad_sintoma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enfermedad_sintoma_enfermedad_id_foreign` (`enfermedad_id`),
  ADD KEY `enfermedad_sintoma_sintoma_id_foreign` (`sintoma_id`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidades_medicas`
--
ALTER TABLE `especialidades_medicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_cita`
--
ALTER TABLE `estado_cita`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historials`
--
ALTER TABLE `historials`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario_medico`
--
ALTER TABLE `horario_medico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario_medicos`
--
ALTER TABLE `horario_medicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `horario_medicos_medicos_id_foreign` (`medicos_id`),
  ADD KEY `horario_medicos_dias_id_foreign` (`dias_id`),
  ADD KEY `horario_medicos_slots_id_foreign` (`slots_id`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingresos_paciente_id_foreign` (`paciente_id`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicinas`
--
ALTER TABLE `medicinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicinas_presentacion_id_foreign` (`presentacion_id`),
  ADD KEY `medicinas_medicamento_id_foreign` (`medicamento_id`);

--
-- Indices de la tabla `medicina_prescription`
--
ALTER TABLE `medicina_prescription`
  ADD KEY `medicina_prescription_medicina_id_foreign` (`medicina_id`),
  ADD KEY `medicina_prescription_prescription_id_foreign` (`prescription_id`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicos_personas_id_foreign` (`personas_id`),
  ADD KEY `medicos_especialidad_id_foreign` (`especialidad_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pacientes_persona_id_foreign` (`persona_id`),
  ADD KEY `pacientes_estado_id_foreign` (`estado_id`),
  ADD KEY `pacientes_departamento_id_foreign` (`departamento_id`);

--
-- Indices de la tabla `pacientes_estados`
--
ALTER TABLE `pacientes_estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`codigo_pago`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescriptions_medico_id_foreign` (`medico_id`),
  ADD KEY `prescriptions_paciente_id_foreign` (`paciente_id`);

--
-- Indices de la tabla `presentacions`
--
ALTER TABLE `presentacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sintomas_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiposcomprobantes`
--
ALTER TABLE `tiposcomprobantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_departamento_id_foreign` (`departamento_id`),
  ADD KEY `users_persona_id_foreign` (`persona_id`),
  ADD KEY `users_turno_id_foreign` (`turno_id`),
  ADD KEY `users_especialidad_id_foreign` (`especialidad_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admisiones`
--
ALTER TABLE `admisiones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categoria_sintomas`
--
ALTER TABLE `categoria_sintomas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `componentes`
--
ALTER TABLE `componentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `componente_medicamento`
--
ALTER TABLE `componente_medicamento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `diagnostico_enfermedad`
--
ALTER TABLE `diagnostico_enfermedad`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `diagnostico_sintoma`
--
ALTER TABLE `diagnostico_sintoma`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `dias`
--
ALTER TABLE `dias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `egresos`
--
ALTER TABLE `egresos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `enfermedad_sintoma`
--
ALTER TABLE `enfermedad_sintoma`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `especialidades_medicas`
--
ALTER TABLE `especialidades_medicas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estado_cita`
--
ALTER TABLE `estado_cita`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `historials`
--
ALTER TABLE `historials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horario_medico`
--
ALTER TABLE `horario_medico`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horario_medicos`
--
ALTER TABLE `horario_medicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `medicinas`
--
ALTER TABLE `medicinas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pacientes_estados`
--
ALTER TABLE `pacientes_estados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `presentacions`
--
ALTER TABLE `presentacions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `slots`
--
ALTER TABLE `slots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tiposcomprobantes`
--
ALTER TABLE `tiposcomprobantes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admisiones`
--
ALTER TABLE `admisiones`
  ADD CONSTRAINT `admisiones_comprobante_id_foreign` FOREIGN KEY (`comprobante_id`) REFERENCES `comprobantes` (`id`),
  ADD CONSTRAINT `admisiones_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `alergias`
--
ALTER TABLE `alergias`
  ADD CONSTRAINT `alergias_componente_id_foreign` FOREIGN KEY (`componente_id`) REFERENCES `componentes` (`id`),
  ADD CONSTRAINT `alergias_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `citas_horario_medico_id_foreign` FOREIGN KEY (`horario_medico_id`) REFERENCES `horario_medico` (`id`),
  ADD CONSTRAINT `citas_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `componente_medicamento`
--
ALTER TABLE `componente_medicamento`
  ADD CONSTRAINT `componente_medicamento_componente_id_foreign` FOREIGN KEY (`componente_id`) REFERENCES `componentes` (`id`),
  ADD CONSTRAINT `componente_medicamento_medicamento_id_foreign` FOREIGN KEY (`medicamento_id`) REFERENCES `medicamentos` (`id`);

--
-- Filtros para la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  ADD CONSTRAINT `comprobantes_tipocomprobante_id_foreign` FOREIGN KEY (`tipocomprobante_id`) REFERENCES `tiposcomprobantes` (`id`);

--
-- Filtros para la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD CONSTRAINT `diagnosticos_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`),
  ADD CONSTRAINT `diagnosticos_prescription_id_foreign` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`id`),
  ADD CONSTRAINT `diagnosticos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `diagnostico_enfermedad`
--
ALTER TABLE `diagnostico_enfermedad`
  ADD CONSTRAINT `diagnostico_enfermedad_diagnostico_id_foreign` FOREIGN KEY (`diagnostico_id`) REFERENCES `diagnosticos` (`id`),
  ADD CONSTRAINT `diagnostico_enfermedad_enfermedad_id_foreign` FOREIGN KEY (`enfermedad_id`) REFERENCES `enfermedad` (`id`);

--
-- Filtros para la tabla `diagnostico_sintoma`
--
ALTER TABLE `diagnostico_sintoma`
  ADD CONSTRAINT `diagnostico_sintoma_diagnostico_id_foreign` FOREIGN KEY (`diagnostico_id`) REFERENCES `diagnosticos` (`id`),
  ADD CONSTRAINT `diagnostico_sintoma_sintoma_id_foreign` FOREIGN KEY (`sintoma_id`) REFERENCES `sintomas` (`id`);

--
-- Filtros para la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD CONSTRAINT `egresos_comprobante_id_foreign` FOREIGN KEY (`comprobante_id`) REFERENCES `comprobantes` (`id`),
  ADD CONSTRAINT `egresos_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  ADD CONSTRAINT `enfermedad_especialidad_id_foreign` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidades` (`id`);

--
-- Filtros para la tabla `enfermedad_sintoma`
--
ALTER TABLE `enfermedad_sintoma`
  ADD CONSTRAINT `enfermedad_sintoma_enfermedad_id_foreign` FOREIGN KEY (`enfermedad_id`) REFERENCES `enfermedad` (`id`),
  ADD CONSTRAINT `enfermedad_sintoma_sintoma_id_foreign` FOREIGN KEY (`sintoma_id`) REFERENCES `sintomas` (`id`);

--
-- Filtros para la tabla `horario_medicos`
--
ALTER TABLE `horario_medicos`
  ADD CONSTRAINT `horario_medicos_dias_id_foreign` FOREIGN KEY (`dias_id`) REFERENCES `dias` (`id`),
  ADD CONSTRAINT `horario_medicos_medicos_id_foreign` FOREIGN KEY (`medicos_id`) REFERENCES `personas` (`id`),
  ADD CONSTRAINT `horario_medicos_slots_id_foreign` FOREIGN KEY (`slots_id`) REFERENCES `slots` (`id`);

--
-- Filtros para la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD CONSTRAINT `ingresos_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `medicinas`
--
ALTER TABLE `medicinas`
  ADD CONSTRAINT `medicinas_medicamento_id_foreign` FOREIGN KEY (`medicamento_id`) REFERENCES `medicamentos` (`id`),
  ADD CONSTRAINT `medicinas_presentacion_id_foreign` FOREIGN KEY (`presentacion_id`) REFERENCES `presentacions` (`id`);

--
-- Filtros para la tabla `medicina_prescription`
--
ALTER TABLE `medicina_prescription`
  ADD CONSTRAINT `medicina_prescription_medicina_id_foreign` FOREIGN KEY (`medicina_id`) REFERENCES `medicinas` (`id`),
  ADD CONSTRAINT `medicina_prescription_prescription_id_foreign` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`id`);

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_especialidad_id_foreign` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidad` (`id`),
  ADD CONSTRAINT `medicos_personas_id_foreign` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`),
  ADD CONSTRAINT `pacientes_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `pacientes_estados` (`id`),
  ADD CONSTRAINT `pacientes_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`);

--
-- Filtros para la tabla `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_medico_id_foreign` FOREIGN KEY (`medico_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `prescriptions_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `sintomas`
--
ALTER TABLE `sintomas`
  ADD CONSTRAINT `sintomas_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categoria_sintomas` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`),
  ADD CONSTRAINT `users_especialidad_id_foreign` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidades` (`id`),
  ADD CONSTRAINT `users_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
  ADD CONSTRAINT `users_turno_id_foreign` FOREIGN KEY (`turno_id`) REFERENCES `turnos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
