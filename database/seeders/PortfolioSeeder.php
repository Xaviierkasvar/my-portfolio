<?php

namespace Database\Seeders;

use CoreConstants;
use App\Services\Contracts\AboutInterface;
use App\Services\Contracts\EducationInterface;
use App\Services\Contracts\ExperienceInterface;
use App\Services\Contracts\MessageInterface;
use App\Services\Contracts\PortfolioConfigInterface;
use App\Services\Contracts\ProjectInterface;
use App\Services\Contracts\ServiceInterface;
use App\Services\Contracts\SkillInterface;
use App\Services\Contracts\VisitorInterface;
use Config;
use Illuminate\Database\Seeder;
use Log;
use Str;
use Faker\Factory as Faker;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $faker = Faker::create();

            $portfolioConfig = resolve(PortfolioConfigInterface::class);
            $about = resolve(AboutInterface::class);
            $education = resolve(EducationInterface::class);
            $skill = resolve(SkillInterface::class);
            $experience = resolve(ExperienceInterface::class);
            $project = resolve(ProjectInterface::class);
            $service = resolve(ServiceInterface::class);
            $visitor = resolve(VisitorInterface::class);
            $message = resolve(MessageInterface::class);

            //portfolio config table seed
            //template
            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__TEMPLATE,
                'setting_value' => 'procyon',
                'default_value' => 'procyon',
            ];
            $portfolioConfig->insertOrUpdate($data);

            //accent color
            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__ACCENT_COLOR,
                'setting_value' => '#1890ff',
                'default_value' => '#1890ff',
            ];
            $portfolioConfig->insertOrUpdate($data);

            //visibility
            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_ABOUT,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_SKILL,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_EDUCATION,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_EXPERIENCE,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_PROJECT,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_SERVICE,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_CONTACT,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_FOOTER,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_CV,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__VISIBILITY_SKILL_PROFICIENCY,
                'setting_value' => CoreConstants::TRUE,
                'default_value' => CoreConstants::TRUE,
            ];
            $portfolioConfig->insertOrUpdate($data);

            //header script
            $data = [
                'setting_key' => CoreConstants::PORTFOLIO_CONFIG__SCRIPT_HEADER,
                'setting_value' => '',
                'default_value' => '',
            ];
            $portfolioConfig->insertOrUpdate($data);

            //about table seed
            try {
                $data = [
                    'name' => 'Francisco Javier Castillo Barrios',
                    'email' => 'javier_castillo_15@hotmail.com',
                    'avatar' => 'assets/common/img/avatar/default.png',
                    'cover' => 'assets/common/img/cover/default.png',
                    'phone' => '+57 300-433-0873',
                    'address' => 'Carrera 12D #72-18 Trr 56 Apto 1449 Portal de los manantiales Manzana 1 Soledad - Atlántico',
                    'description' => 'Ingeniero de Sistemas especializado en desarrollo de software y aplicaciones web, con sólida experiencia como programador Full Stack. En el desarrollo backend, cuento con conocimientos en PHP, Python, Java, Laravel, Spring Boot, Swagger y gestión de bases de datos como SQLServer, PostgreSQL y MySQL. En el desarrollo frontend, domino JavaScript ES6, Vue 3, React, Angular, HTML, CSS, Bootstrap e Ionic. Familiarizado con metodologías ágiles (Scrum) y herramientas modernas como Azure DevOps, Docker, Git y Postman. Profesional proactivo, ético y orientado al logro, comprometido con la implementación de soluciones innovadoras en el ámbito tecnológico.',
                    'taglines' => ["I am a Systems Engineer", "I am a Web Developer", "I am a Full Stack Developer"],
                    'social_links' => [
                        [
                            'title' => 'LinkedIn',
                            'iconClass' => 'fab fa-linkedin-in',
                            'link' => 'https://www.linkedin.com/in/francisco-javier-castillo-barrios'
                        ],
                        [
                            'title' => 'Github',
                            'iconClass' => 'fab fa-github',
                            'link' => 'https://github.com/your-github-profile'
                        ],
                        [
                            'title' => 'Mail',
                            'iconClass' => 'far fa-envelope',
                            'link' => 'mailto:javier_castillo_15@hotmail.com'
                        ],
                    ],
                    'seederCV' => 'assets/common/cv/Francisco_Javier_Castillo_Barrios_CV.pdf',
                ];
                $about->store($data);

                //education table seed
                try {
                    $data = [
                        'institution' => 'CUN Corporación Unificada Nacional de Educación Superior',
                        'period' => '2024',
                        'degree' => 'Ingeniería de Sistemas',
                        'cgpa' => null,
                        'department' => 'Bogotá, Colombia',
                        'thesis' => null
                    ];
                    $education->store($data);

                    $data = [
                        'institution' => 'Servicio Nacional de Aprendizaje (SENA)',
                        'period' => '2021',
                        'degree' => 'Tecnólogo Analista y Desarrollador de Sistemas',
                        'cgpa' => null,
                        'department' => 'Barranquilla, Colombia',
                        'thesis' => null
                    ];
                    $education->store($data);

                    $data = [
                        'institution' => 'Fundación Carlos Slim',
                        'period' => '2021',
                        'degree' => 'Técnico en informática (Ofimática)',
                        'cgpa' => null,
                        'department' => 'Bogotá, Colombia',
                        'thesis' => null
                    ];
                    $education->store($data);

                    $data = [
                        'institution' => 'Fundación Carlos Slim',
                        'period' => '2021',
                        'degree' => 'ADMINISTRADOR DE BASES DE DATOS',
                        'cgpa' => null,
                        'department' => 'Bogotá, Colombia',
                        'thesis' => null
                    ];
                    $education->store($data);

                    $data = [
                        'institution' => 'Fundación Carlos Slim',
                        'period' => '2021',
                        'degree' => 'ADMINISTRADOR DE SERVIDORES',
                        'cgpa' => null,
                        'department' => 'Bogotá, Colombia',
                        'thesis' => null
                    ];
                    $education->store($data);

                    $data = [
                        'institution' => 'Colegio Comunitario Distrital Pablo Neruda',
                        'period' => '2010',
                        'degree' => 'Bachiller Académico',
                        'cgpa' => null,
                        'department' => 'Barranquilla, Colombia',
                        'thesis' => null
                    ];
                    $education->store($data);
                } catch (\Throwable $th) {
                    Log::error($th->getMessage());
                }
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
            }

            //skill table seed
            try {
                $data = [
                    'name' => 'PHP',
                    'proficiency' => '100'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'Laravel',
                    'proficiency' => '100'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'JavaScript ES6',
                    'proficiency' => '95'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'Vue 3',
                    'proficiency' => '90'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'HTML',
                    'proficiency' => '100'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'CSS',
                    'proficiency' => '90'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'SQL Server',
                    'proficiency' => '90'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'PostgreSQL',
                    'proficiency' => '85'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'MySQL',
                    'proficiency' => '90'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'Azure DevOps',
                    'proficiency' => '85'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'Git',
                    'proficiency' => '95'
                ];
                $skill->store($data);

                $data = [
                    'name' => 'Docker',
                    'proficiency' => '80'
                ];
                $skill->store($data);
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
            }

            //experience table seed
            try {
                $data = [
                    'company' => 'Infomedia Service SAS',
                    'period' => 'Abr. 2022 – Jul. 2024',
                    'position' => 'Ingeniero de Investigación y Desarrollo',
                    'details' => 'Ingeniero de desarrollo en PHP 5.6 puro y framework Bootstrap, Laravel 9, bases de datos SQL Server y PostgreSQL. Programación en JavaScript ES6, control de versiones con Git y Azure DevOps, trabajo bajo metodologías ágiles Scrum.'
                ];
                $experience->store($data);

                $data = [
                    'company' => 'Fundación Social GESAREY',
                    'period' => 'Abr. 2018 – Ago. 2021',
                    'position' => 'Analista y Desarrollador de Sistemas',
                    'details' => 'Administrador de bases de datos, desarrollo en PHP, HTML5, CSS3, JavaScript. Soporte técnico y mantenimiento de equipos de cómputo, instalación de redes, montaje de CCTV, y soporte en sistemas operativos Windows, Linux y Android.'
                ];
                $experience->store($data);
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
            }

            //project table seed
            try {
                try {
                    //images
                    if (is_dir('public/assets/common/img/projects')) {
                        $dir = 'public/assets/common/img/projects';
                    } else {
                        $dir = 'assets/common/img/projects';
                    }
                    
                    $leave_files = array('.gitkeep');
                    
                    foreach (glob("$dir/*") as $file) {
                        if (!in_array(basename($file), $leave_files)) {
                            unlink($file);
                        }
                    }
                } catch (\Throwable $th) {
                    Log::error($th->getMessage());
                }

                $data = [
                    'title' => 'PCA Parque Caribe Aventura (Backoffice)',
                    'categories' => ['professional'],
                    'link' => 'https://caribeaventura.com/',
                    'details' => 'Desarrollé un robusto backoffice utilizando Laravel 10, optimizando la gestión interna de Caribe Aventura. Este sistema no solo mejora la eficiencia operativa, sino que también proporciona una interfaz amigable para los usuarios, facilitando la administración de datos y la generación de informes. La implementación se realizó siguiendo patrones de diseño y prácticas recomendadas para garantizar la escalabilidad y mantenibilidad del código.',
                    'seeder_thumbnail' => 'assets/common/img/projects/pca_login.png',
                    'seeder_images' => [
                        'assets/common/img/projects/abacox.png'
                    ]
                ];
                $project->store($data);

                $data = [
                    'title' => 'Abacox',
                    'categories' => ['professional'],
                    'link' => 'https://abacox.infomediaservice.com/abacox3/',
                    'details' => 'Proporcioné soporte y mantenimiento a un antiguo sistema de información desarrollado en PHP puro 5.4. Este sistema, crucial para la gestión de CDRs y tickets, fue actualizado para mejorar su rendimiento y seguridad. Apliqué buenas prácticas de programación y gestión de cambios para asegurar una transición fluida y eficiente.',
                    'seeder_thumbnail' => 'assets/common/img/projects/abacox_login.png',
                    'seeder_images' => [
                        'assets/common/img/projects/abacox_login.png'
                    ]
                ];
                $project->store($data);

                $data = [
                    'title' => 'CEI',
                    'categories' => ['internal'],
                    'link' => '#',
                    'details' => 'Desarrollé un proyecto interno para la reserva de salas de conferencias y reuniones, optimizando el uso de recursos dentro de la organización. La solución incluye una interfaz intuitiva y un sistema de notificaciones que asegura la gestión efectiva de las reservas.',
                    'seeder_thumbnail' => 'assets/common/img/projects/cei_login.png',
                    'seeder_images' => [
                        'assets/common/img/projects/cei_login.png'
                    ]
                ];
                $project->store($data);

                $data = [
                    'title' => 'SADIYS',
                    'categories' => ['internal'],
                    'link' => '#',
                    'details' => 'Implementé un sistema automatizado de control de accesos, mejorando significativamente la seguridad y la gestión de entradas y salidas en las instalaciones. La solución incluye un registro detallado de actividades, contribuyendo a la transparencia y seguridad del entorno laboral.',
                    'seeder_thumbnail' => 'assets/common/img/projects/sadiys.png',
                    'seeder_images' => [
                        'assets/common/img/projects/sadiys.png'
                    ]
                ];
                $project->store($data);

                $data = [
                    'title' => 'SAMS (Student Attendance Management System)',
                    'categories' => ['internal'],
                    'link' => 'http://200.234.228.189/',
                    'details' => 'Desarrollé un sistema integral para el control de asistencia de estudiantes, proporcionando una herramienta eficiente para la gestión académica. Implementé características como informes personalizados y un sistema de notificaciones que mejora la comunicación entre estudiantes y administradores.',
                    'seeder_thumbnail' => 'assets/common/img/projects/sams_login.png',
                    'seeder_images' => [
                        'assets/common/img/projects/sams.png'
                    ]
                ];
                $project->store($data);

                $data = [
                    'title' => 'Website Funsoges',
                    'categories' => ['professional'],
                    'link' => '#',
                    'details' => 'Diseñé y desarrollé el sitio web para la Fundación Social Gesarey, enfocándome en una presentación atractiva y funcional. La plataforma incluye secciones interactivas que permiten a los usuarios conocer los servicios ofrecidos, facilitando el acceso a información clave.',
                    'seeder_thumbnail' => 'assets/common/img/projects/funsoges.png',
                    'seeder_images' => [
                        'assets/common/img/projects/funsoges.png'
                    ]
                ];
                $project->store($data);

                $data = [
                    'title' => 'MGI Frontend',
                    'categories' => ['professional'],
                    'link' => 'https://github.com/Xaviierkasvar/mgi-font.git',
                    'details' => 'Realicé una prueba técnica desarrollando un módulo de gestión de inventarios. Este proyecto incluye una interfaz responsiva que permite a los usuarios gestionar eficientemente su inventario, implementando principios de usabilidad y accesibilidad.',
                    'seeder_thumbnail' => 'assets/common/img/projects/mgi_login.png',
                    'seeder_images' => [
                        'assets/common/img/projects/mgi.png'
                    ]
                ];
                $project->store($data);

                $data = [
                    'title' => 'MGI Backend',
                    'categories' => ['professional'],
                    'link' => 'https://github.com/Xaviierkasvar/mgi-back',
                    'details' => 'En este proyecto, desarrollé un módulo de gestión de inventarios utilizando Laravel. Implementé buenas prácticas de programación y una arquitectura limpia para asegurar la escalabilidad y mantenibilidad del código. Además, utilicé Swagger para documentar la API de forma exhaustiva, facilitando la comprensión y el uso por parte de otros desarrolladores. La documentación incluye descripciones claras de los endpoints, parámetros de entrada, y ejemplos de respuestas, lo que asegura que cualquier nuevo miembro del equipo pueda integrarse rápidamente y entender cómo interactuar con la API.',
                    'seeder_thumbnail' => 'assets/common/img/projects/mgi_back.png',
                    'seeder_images' => [
                        'assets/common/img/projects/mgi_swagger.png'   
                    ]
                ];
                $project->store($data);

                $data = [
                    'title' => '99envios',
                    'categories' => ['professional'],
                    'link' => 'https://99envios.app/',
                    'details' => 'Aporté mi experiencia en desarrollo backend utilizando Laravel y frontend con React y Material UI. Implementé soluciones eficientes y visualmente atractivas, asegurando que el sistema fuera no solo funcional, sino también fácil de usar para los clientes.',
                    'seeder_thumbnail' => 'assets/common/img/projects/99envios_login.png',
                    'seeder_images' => [
                        'assets/common/img/projects/99envios.png'   
                    ]
                ];
                $project->store($data);
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
            }

            //service table seed
            try {
                $data = [
                    'title' => 'Desarrollo Web',
                    'icon' => 'fas fa-code',
                    'details' => 'Desarrollo completo de aplicaciones web usando tecnologías modernas como PHP, Laravel, Vue.js, HTML, CSS y más.'
                ];
                $service->store($data);

                $data = [
                    'title' => 'Soporte y Mantenimiento de Sistemas de Información',
                    'icon' => 'fas fa-tools',
                    'details' => 'Servicios de soporte técnico, mantenimiento preventivo y correctivo de sistemas de información, incluyendo administración de bases de datos y servidores.'
                ];
                $service->store($data);

                // Servicios adicionales
                $data = [
                    'title' => 'Consultoría en TI',
                    'icon' => 'fas fa-lightbulb',
                    'details' => 'Asesoramiento sobre la implementación de tecnologías de la información, optimización de infraestructuras tecnológicas, y recomendaciones para mejorar la eficiencia y seguridad de sistemas.'
                ];
                $service->store($data);

                $data = [
                    'title' => 'Integración de APIs',
                    'icon' => 'fas fa-plug',
                    'details' => 'Desarrollo e implementación de APIs RESTful o GraphQL para conectar diferentes sistemas y servicios, permitiendo la interoperabilidad entre plataformas.'
                ];
                $service->store($data);

                $data = [
                    'title' => 'Seguridad Informática',
                    'icon' => 'fas fa-shield-alt',
                    'details' => 'Auditorías de seguridad, pruebas de penetración (pentesting), implementación de políticas de seguridad, cifrado de datos y protección contra amenazas cibernéticas.'
                ];
                $service->store($data);

                $data = [
                    'title' => 'Migración y Actualización de Sistemas',
                    'icon' => 'fas fa-sync-alt',
                    'details' => 'Migración de aplicaciones y datos a nuevas plataformas, actualización de software obsoleto, y modernización de sistemas heredados.'
                ];
                $service->store($data);

                $data = [
                    'title' => 'Automatización de Procesos',
                    'icon' => 'fas fa-robot',
                    'details' => 'Desarrollo de scripts y herramientas para automatizar tareas repetitivas, optimizando procesos internos y reduciendo errores manuales.'
                ];
                $service->store($data);

                $data = [
                    'title' => 'DevOps y CI/CD',
                    'icon' => 'fas fa-cogs',
                    'details' => 'Implementación de pipelines de integración y entrega continua (CI/CD), automatización de despliegues y configuraciones de infraestructura como código (IaC).'
                ];
                $service->store($data);

                $data = [
                    'title' => 'Desarrollo de Software a Medida',
                    'icon' => 'fas fa-laptop-code',
                    'details' => 'Creación de software personalizado según las necesidades específicas de clientes, desde sistemas de gestión empresarial hasta aplicaciones especializadas.'
                ];
                $service->store($data);

                $data = [
                    'title' => 'Soporte y Mantenimiento de Software',
                    'icon' => 'fas fa-tools',
                    'details' => 'Servicios de soporte técnico, mantenimiento de aplicaciones existentes, y resolución de problemas técnicos.'
                ];
                $service->store($data);

                $data = [
                    'title' => 'Desarrollo de Sistemas de Gestión Empresarial (ERP/CRM)',
                    'icon' => 'fas fa-business-time',
                    'details' => 'Implementación y personalización de soluciones ERP (Enterprise Resource Planning) y CRM (Customer Relationship Management) para mejorar la gestión empresarial.'
                ];
                $service->store($data);

                $data = [
                    'title' => 'Formación y Capacitación',
                    'icon' => 'fas fa-chalkboard-teacher',
                    'details' => 'Cursos y talleres para capacitar a equipos de trabajo en nuevas tecnologías, metodologías ágiles, desarrollo de software, y ciberseguridad.'
                ];
                $service->store($data);

                $data = [
                    'title' => 'Análisis de Datos y BI (Business Intelligence)',
                    'icon' => 'fas fa-chart-bar',
                    'details' => 'Implementación de sistemas de análisis de datos, creación de dashboards interactivos, y desarrollo de soluciones de BI para la toma de decisiones basada en datos.'
                ];
                $service->store($data);

                $data = [
                    'title' => 'Desarrollo de Sistemas de Comercio Electrónico',
                    'icon' => 'fas fa-shopping-cart',
                    'details' => 'Creación y personalización de plataformas de e-commerce, integraciones con pasarelas de pago, y optimización para SEO.'
                ];
                $service->store($data);

                $data = [
                    'title' => 'Desarrollo de Chatbots e IA',
                    'icon' => 'fas fa-brain',
                    'details' => 'Implementación de chatbots para atención al cliente, automatización de servicios, y desarrollo de soluciones basadas en inteligencia artificial.'
                ];
                $service->store($data);

            } catch (\Throwable $th) {
                Log::error($th->getMessage());
            }

            //visitor table seed (No changes needed)

            //message table seed (No changes needed)
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }
}
